/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
	const mobileMenuButton = document.getElementById('mobile-menu-button');
	const mobileMenu = document.getElementById('mobile-menu');
	
	if (mobileMenuButton && mobileMenu) {
		mobileMenuButton.addEventListener('click', function() {
			const isExpanded = this.getAttribute('aria-expanded') === 'true';
			
			// Toggle aria-expanded
			this.setAttribute('aria-expanded', !isExpanded);
			
			// Toggle menu visibility
			mobileMenu.classList.toggle('hidden');
			
			// Toggle icons
			const hamburgerIcon = this.querySelector('svg:first-of-type');
			const closeIcon = this.querySelector('svg:last-of-type');
			
			if (hamburgerIcon && closeIcon) {
				hamburgerIcon.classList.toggle('hidden');
				hamburgerIcon.classList.toggle('block');
				closeIcon.classList.toggle('hidden');
				closeIcon.classList.toggle('block');
			}
		});
	}
	
	// Smooth scroll for anchor links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			const href = this.getAttribute('href');
			if (href !== '#' && href !== '#0') {
				const target = document.querySelector(href);
				if (target) {
					e.preventDefault();
					target.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
					
					// Close mobile menu if open
					if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
						mobileMenuButton.click();
					}
				}
			}
		});
	});
});
