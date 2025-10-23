<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VirtualPro
 */

?>

<header id="masthead" class="bg-white shadow-sm sticky top-0 z-50">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex justify-between items-center py-4 md:py-6">
			
			<!-- Logo and Site Title -->
			<div class="flex items-center space-x-3">
				<?php if ( has_custom_logo() ) : ?>
					<div class="flex-shrink-0">
						<?php the_custom_logo(); ?>
					</div>
				<?php endif; ?>
				
				<div class="flex flex-col">
					<?php if ( is_front_page() ) : ?>
						<h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">
							<?php bloginfo( 'name' ); ?>
						</h1>
					<?php else : ?>
						<p class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="hover:text-blue-600 transition-colors">
								<?php bloginfo( 'name' ); ?>
							</a>
						</p>
					<?php endif; ?>
					
					<?php
					$virtualpro_description = get_bloginfo( 'description', 'display' );
					if ( $virtualpro_description || is_customize_preview() ) :
						?>
						<p class="text-sm text-gray-600 mt-1">
							<?php echo $virtualpro_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</p>
					<?php endif; ?>
				</div>
			</div>

			<!-- Desktop Navigation -->
			<nav id="site-navigation" class="hidden lg:flex items-center space-x-8" aria-label="<?php esc_attr_e( 'Main Navigation', 'virtualpro' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'flex space-x-8',
						'container'      => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'fallback_cb'    => false,
					)
				);
				?>
				
				<!-- CTA Button -->
				<a href="#contact" class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
					<?php esc_html_e( 'Get Started', 'virtualpro' ); ?>
				</a>
			</nav>

			<!-- Mobile Menu Button -->
			<button 
				id="mobile-menu-button"
				type="button" 
				class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
				aria-controls="mobile-menu" 
				aria-expanded="false"
			>
				<span class="sr-only"><?php esc_html_e( 'Open main menu', 'virtualpro' ); ?></span>
				<!-- Hamburger Icon -->
				<svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
				</svg>
				<!-- Close Icon (hidden by default) -->
				<svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
		</div>

		<!-- Mobile Menu -->
		<div id="mobile-menu" class="hidden lg:hidden pb-4">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'mobile-primary-menu',
					'menu_class'     => 'space-y-1',
					'container'      => 'nav',
					'container_class' => 'space-y-2',
					'fallback_cb'    => false,
				)
			);
			?>
			<div class="mt-4 pt-4 border-t border-gray-200">
				<a href="#contact" class="block w-full text-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
					<?php esc_html_e( 'Get Started', 'virtualpro' ); ?>
				</a>
			</div>
		</div>
	</div>
</header><!-- #masthead -->
