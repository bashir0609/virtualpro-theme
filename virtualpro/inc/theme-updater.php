<?php
/**
 * GitHub Theme Updater
 *
 * Enables automatic theme updates from GitHub releases
 *
 * @package VirtualPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class VirtualPro_Theme_Updater {

	/**
	 * GitHub username
	 *
	 * @var string
	 */
	private $username;

	/**
	 * GitHub repository name
	 *
	 * @var string
	 */
	private $repository;

	/**
	 * Theme slug
	 *
	 * @var string
	 */
	private $theme_slug;

	/**
	 * GitHub access token (optional, for private repos)
	 *
	 * @var string
	 */
	private $access_token;

	/**
	 * Constructor
	 *
	 * @param string $username GitHub username.
	 * @param string $repository GitHub repository name.
	 * @param string $theme_slug WordPress theme slug.
	 * @param string $access_token GitHub access token (optional).
	 */
	public function __construct( $username, $repository, $theme_slug, $access_token = '' ) {
		$this->username     = $username;
		$this->repository   = $repository;
		$this->theme_slug   = $theme_slug;
		$this->access_token = $access_token;

		add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_for_update' ) );
		add_filter( 'upgrader_source_selection', array( $this, 'fix_source_directory' ), 10, 4 );
	}

	/**
	 * Check for theme updates
	 *
	 * @param object $transient Update transient.
	 * @return object
	 */
	public function check_for_update( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		// Get the latest release from GitHub
		$remote_version = $this->get_remote_version();

		if ( ! $remote_version ) {
			return $transient;
		}

		// Get current theme version
		$theme          = wp_get_theme( $this->theme_slug );
		$current_version = $theme->get( 'Version' );

		// Compare versions
		if ( version_compare( $current_version, $remote_version['version'], '<' ) ) {
			$transient->response[ $this->theme_slug ] = array(
				'theme'       => $this->theme_slug,
				'new_version' => $remote_version['version'],
				'url'         => $remote_version['html_url'],
				'package'     => $remote_version['download_url'],
			);
		}

		return $transient;
	}

	/**
	 * Get remote version from GitHub
	 *
	 * @return array|false
	 */
	private function get_remote_version() {
		$transient_key = 'virtualpro_github_release';
		$cached_data   = get_transient( $transient_key );

		if ( false !== $cached_data ) {
			return $cached_data;
		}

		$api_url = sprintf(
			'https://api.github.com/repos/%s/%s/releases/latest',
			$this->username,
			$this->repository
		);

		$args = array(
			'headers' => array(
				'Accept' => 'application/vnd.github.v3+json',
			),
		);

		if ( ! empty( $this->access_token ) ) {
			$args['headers']['Authorization'] = 'token ' . $this->access_token;
		}

		$response = wp_remote_get( $api_url, $args );

		if ( is_wp_error( $response ) ) {
			return false;
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );

		if ( empty( $data['tag_name'] ) ) {
			return false;
		}

		// Remove 'v' prefix from version if present
		$version = ltrim( $data['tag_name'], 'v' );

		$release_data = array(
			'version'      => $version,
			'html_url'     => $data['html_url'],
			'download_url' => $data['zipball_url'],
		);

		// Cache for 12 hours
		set_transient( $transient_key, $release_data, 12 * HOUR_IN_SECONDS );

		return $release_data;
	}

	/**
	 * Fix the source directory name after update
	 *
	 * GitHub zips have a different directory structure, this fixes it
	 *
	 * @param string $source Source directory.
	 * @param string $remote_source Remote source directory.
	 * @param object $upgrader WP_Upgrader instance.
	 * @param array  $hook_extra Extra arguments.
	 * @return string|WP_Error
	 */
	public function fix_source_directory( $source, $remote_source, $upgrader, $hook_extra ) {
		global $wp_filesystem;

		// Check if this is a theme update and if it's our theme
		if ( ! isset( $hook_extra['theme'] ) || $hook_extra['theme'] !== $this->theme_slug ) {
			return $source;
		}

		// Get the expected directory name
		$corrected_source = trailingslashit( $remote_source ) . $this->theme_slug . '/';

		// Rename the directory
		if ( $wp_filesystem->move( $source, $corrected_source, true ) ) {
			return $corrected_source;
		}

		return new WP_Error( 'rename_failed', __( 'Unable to rename the theme directory.', 'virtualpro' ) );
	}

	/**
	 * Clear update cache
	 */
	public static function clear_cache() {
		delete_transient( 'virtualpro_github_release' );
	}
}
