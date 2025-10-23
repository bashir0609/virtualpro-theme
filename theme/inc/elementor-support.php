<?php
/**
 * Elementor Support for Custom Header & Footer
 *
 * Allows header and footer to be built with Elementor
 *
 * @package VirtualPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Elementor locations for header and footer
 */
function virtualpro_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_location( 'header' );
	$elementor_theme_manager->register_location( 'footer' );
}
add_action( 'elementor/theme/register_locations', 'virtualpro_register_elementor_locations' );

/**
 * Check if Elementor header is active
 *
 * @return bool
 */
function virtualpro_has_elementor_header() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return false;
	}

	return elementor_theme_do_location( 'header' );
}

/**
 * Check if Elementor footer is active
 *
 * @return bool
 */
function virtualpro_has_elementor_footer() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return false;
	}

	return elementor_theme_do_location( 'footer' );
}

/**
 * Add Elementor support
 */
function virtualpro_add_elementor_support() {
	// Add theme support for Elementor
	add_theme_support( 'elementor' );
	
	// Add support for Elementor Pro features
	add_theme_support( 'elementor-pro' );
}
add_action( 'after_setup_theme', 'virtualpro_add_elementor_support' );

/**
 * Register custom post type for header/footer templates
 */
function virtualpro_register_header_footer_cpt() {
	$labels = array(
		'name'               => __( 'Header & Footer', 'virtualpro' ),
		'singular_name'      => __( 'Template', 'virtualpro' ),
		'menu_name'          => __( 'Header & Footer', 'virtualpro' ),
		'add_new'            => __( 'Add New Template', 'virtualpro' ),
		'add_new_item'       => __( 'Add New Template', 'virtualpro' ),
		'edit_item'          => __( 'Edit Template', 'virtualpro' ),
		'new_item'           => __( 'New Template', 'virtualpro' ),
		'view_item'          => __( 'View Template', 'virtualpro' ),
		'search_items'       => __( 'Search Templates', 'virtualpro' ),
		'not_found'          => __( 'No templates found', 'virtualpro' ),
		'not_found_in_trash' => __( 'No templates found in trash', 'virtualpro' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-editor-kitchensink',
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'elementor' ),
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_in_nav_menus'   => false,
	);

	register_post_type( 'virtualpro_hf', $args );
}
add_action( 'init', 'virtualpro_register_header_footer_cpt' );

/**
 * Add meta box to select template type (header or footer)
 */
function virtualpro_add_template_type_meta_box() {
	add_meta_box(
		'virtualpro_template_type',
		__( 'Template Type', 'virtualpro' ),
		'virtualpro_template_type_meta_box_callback',
		'virtualpro_hf',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'virtualpro_add_template_type_meta_box' );

/**
 * Meta box callback
 */
function virtualpro_template_type_meta_box_callback( $post ) {
	wp_nonce_field( 'virtualpro_template_type_nonce', 'virtualpro_template_type_nonce' );
	$template_type = get_post_meta( $post->ID, '_virtualpro_template_type', true );
	?>
	<p>
		<label>
			<input type="radio" name="virtualpro_template_type" value="header" <?php checked( $template_type, 'header' ); ?>>
			<?php esc_html_e( 'Header', 'virtualpro' ); ?>
		</label>
	</p>
	<p>
		<label>
			<input type="radio" name="virtualpro_template_type" value="footer" <?php checked( $template_type, 'footer' ); ?>>
			<?php esc_html_e( 'Footer', 'virtualpro' ); ?>
		</label>
	</p>
	<p class="description">
		<?php esc_html_e( 'Select whether this template is for the header or footer.', 'virtualpro' ); ?>
	</p>
	<?php
}

/**
 * Save template type meta
 */
function virtualpro_save_template_type_meta( $post_id ) {
	if ( ! isset( $_POST['virtualpro_template_type_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['virtualpro_template_type_nonce'], 'virtualpro_template_type_nonce' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['virtualpro_template_type'] ) ) {
		update_post_meta( $post_id, '_virtualpro_template_type', sanitize_text_field( $_POST['virtualpro_template_type'] ) );
	}
}
add_action( 'save_post_virtualpro_hf', 'virtualpro_save_template_type_meta' );

/**
 * Get active header template
 */
function virtualpro_get_header_template() {
	$args = array(
		'post_type'      => 'virtualpro_hf',
		'posts_per_page' => 1,
		'meta_query'     => array(
			array(
				'key'   => '_virtualpro_template_type',
				'value' => 'header',
			),
		),
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		return $query->posts[0];
	}

	return false;
}

/**
 * Get active footer template
 */
function virtualpro_get_footer_template() {
	$args = array(
		'post_type'      => 'virtualpro_hf',
		'posts_per_page' => 1,
		'meta_query'     => array(
			array(
				'key'   => '_virtualpro_template_type',
				'value' => 'footer',
			),
		),
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		return $query->posts[0];
	}

	return false;
}

/**
 * Render Elementor header
 */
function virtualpro_render_elementor_header() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return false;
	}

	// Check if there's an Elementor location
	if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'header' ) ) {
		return true;
	}

	// Check for custom header template
	$header_template = virtualpro_get_header_template();
	
	if ( $header_template ) {
		echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_template->ID );
		return true;
	}

	return false;
}

/**
 * Render Elementor footer
 */
function virtualpro_render_elementor_footer() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return false;
	}

	// Check if there's an Elementor location
	if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) {
		return true;
	}

	// Check for custom footer template
	$footer_template = virtualpro_get_footer_template();
	
	if ( $footer_template ) {
		echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_template->ID );
		return true;
	}

	return false;
}

/**
 * Add admin notice for Elementor setup
 */
function virtualpro_elementor_admin_notice() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( $screen->post_type !== 'virtualpro_hf' ) {
		return;
	}

	?>
	<div class="notice notice-info">
		<p>
			<strong><?php esc_html_e( 'VirtualPro Header & Footer Builder', 'virtualpro' ); ?></strong><br>
			<?php esc_html_e( 'Create your custom header or footer using Elementor. Select the template type (Header or Footer) in the sidebar, then click "Edit with Elementor" to start designing.', 'virtualpro' ); ?>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'virtualpro_elementor_admin_notice' );
