/**
 * Main JavaScript
 * General site functionality
 */

(function() {
	'use strict';

	/**
	 * Initialize all functionality
	 */
	function init() {
		// Mobile sidebar toggle
		const sidebar = document.getElementById('mobile-sidebar');
		const menuToggle = document.getElementById('menu-toggle');

		if (menuToggle && sidebar) {
			menuToggle.addEventListener('click', function(e) {
				e.stopPropagation();
				sidebar.classList.toggle('active');
			});

			// Close sidebar when clicking outside
			document.addEventListener('click', function(e) {
				if (sidebar.classList.contains('active') && !sidebar.contains(e.target) && e.target !== menuToggle) {
					sidebar.classList.remove('active');
				}
			});

			// Prevent clicks inside sidebar from closing it
			sidebar.addEventListener('click', function(e) {
				e.stopPropagation();
			});
		}

		// Mobile dropdown toggle
		document.querySelectorAll('.nav-item.has-dropdown > .nav-link').forEach(link => {
			link.addEventListener('click', function(e) {
				// Only prevent default and toggle on mobile (< 981px)
				if (window.innerWidth <= 980) {
					e.preventDefault();
					const parentItem = this.parentElement;
					parentItem.classList.toggle('expanded');
				}
			});
		});

		// Preparedness level expand/collapse
		document.querySelectorAll('[data-expandable]').forEach(item => {
			const header = item.querySelector('.pl-header');
			if (header) {
				header.addEventListener('click', function() {
					// Close other items
					document.querySelectorAll('[data-expandable].expanded').forEach(other => {
						if (other !== item) {
							other.classList.remove('expanded');
						}
					});
					// Toggle current item
					item.classList.toggle('expanded');
				});
			}
		});
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
