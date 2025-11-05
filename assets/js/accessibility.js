/**
 * Accessibility Menu JavaScript
 * Handles font size, dyslexic font, and high contrast toggles
 */

(function() {
	'use strict';

	// localStorage keys
	const STORAGE_KEYS = {
		fontSize: 'accessibility-font-size',
		dyslexicFont: 'accessibility-dyslexic-font',
		highContrast: 'accessibility-high-contrast'
	};

	// Font size cycle order
	const FONT_SIZES = ['normal', 'large'];

	/**
	 * Initialize accessibility menu
	 */
	function init() {
		// Load saved preferences on page load
		loadPreferences();

		// Setup dropdown toggle for all instances (desktop and mobile)
		const menus = document.querySelectorAll('.accessibility-menu');

		menus.forEach(function(menu) {
			const toggle = menu.querySelector('.accessibility-toggle');
			const dropdown = menu.querySelector('.accessibility-dropdown');

			if (toggle && dropdown) {
				toggle.addEventListener('click', function(e) {
					e.stopPropagation();
					const isHidden = dropdown.hasAttribute('hidden');

					if (isHidden) {
						dropdown.removeAttribute('hidden');
						toggle.setAttribute('aria-expanded', 'true');
					} else {
						dropdown.setAttribute('hidden', '');
						toggle.setAttribute('aria-expanded', 'false');
					}
				});

				// Close dropdown when clicking outside
				document.addEventListener('click', function(e) {
					if (!dropdown.hasAttribute('hidden') &&
					    !dropdown.contains(e.target) &&
					    e.target !== toggle) {
						dropdown.setAttribute('hidden', '');
						toggle.setAttribute('aria-expanded', 'false');
					}
				});

				// Prevent clicks inside dropdown from closing it
				dropdown.addEventListener('click', function(e) {
					e.stopPropagation();
				});
			}
		});

		// Setup option buttons for all instances (desktop and mobile)
		const fontSizeBtns = document.querySelectorAll('[data-toggle="font-size"]');
		const dyslexicFontBtns = document.querySelectorAll('[data-toggle="dyslexic-font"]');
		const highContrastBtns = document.querySelectorAll('[data-toggle="high-contrast"]');

		fontSizeBtns.forEach(function(btn) {
			btn.addEventListener('click', toggleFontSize);
		});

		dyslexicFontBtns.forEach(function(btn) {
			btn.addEventListener('click', toggleDyslexicFont);
		});

		highContrastBtns.forEach(function(btn) {
			btn.addEventListener('click', toggleHighContrast);
		});
	}

	/**
	 * Toggle font size (cycles through normal -> large)
	 */
	function toggleFontSize() {
		const html = document.documentElement;
		const btns = document.querySelectorAll('[data-toggle="font-size"]');
		let currentSize = localStorage.getItem(STORAGE_KEYS.fontSize) || 'normal';

		// Get current index and cycle to next
		const currentIndex = FONT_SIZES.indexOf(currentSize);
		const nextIndex = (currentIndex + 1) % FONT_SIZES.length;
		const nextSize = FONT_SIZES[nextIndex];

		// Remove all font size classes
		FONT_SIZES.forEach(size => {
			html.classList.remove('font-size-' + size);
		});

		// Add new class (unless normal)
		if (nextSize !== 'normal') {
			html.classList.add('font-size-' + nextSize);
			btns.forEach(btn => btn.classList.add('active'));
		} else {
			btns.forEach(btn => btn.classList.remove('active'));
		}

		// Save to localStorage
		localStorage.setItem(STORAGE_KEYS.fontSize, nextSize);
	}

	/**
	 * Toggle dyslexic font
	 */
	function toggleDyslexicFont() {
		const html = document.documentElement;
		const btns = document.querySelectorAll('[data-toggle="dyslexic-font"]');
		const isEnabled = html.classList.contains('dyslexic-font');

		if (isEnabled) {
			html.classList.remove('dyslexic-font');
			btns.forEach(btn => btn.classList.remove('active'));
			localStorage.setItem(STORAGE_KEYS.dyslexicFont, 'false');
		} else {
			html.classList.add('dyslexic-font');
			btns.forEach(btn => btn.classList.add('active'));
			localStorage.setItem(STORAGE_KEYS.dyslexicFont, 'true');
		}
	}

	/**
	 * Toggle high contrast mode
	 */
	function toggleHighContrast() {
		const html = document.documentElement;
		const btns = document.querySelectorAll('[data-toggle="high-contrast"]');
		const isEnabled = html.classList.contains('high-contrast');

		if (isEnabled) {
			html.classList.remove('high-contrast');
			btns.forEach(btn => btn.classList.remove('active'));
			localStorage.setItem(STORAGE_KEYS.highContrast, 'false');
		} else {
			html.classList.add('high-contrast');
			btns.forEach(btn => btn.classList.add('active'));
			localStorage.setItem(STORAGE_KEYS.highContrast, 'true');
		}
	}

	/**
	 * Load saved preferences from localStorage
	 */
	function loadPreferences() {
		const html = document.documentElement;

		// Load font size
		const fontSize = localStorage.getItem(STORAGE_KEYS.fontSize);
		const fontSizeBtns = document.querySelectorAll('[data-toggle="font-size"]');
		if (fontSize && fontSize !== 'normal') {
			html.classList.add('font-size-' + fontSize);
			fontSizeBtns.forEach(btn => btn.classList.add('active'));
		}

		// Load dyslexic font
		const dyslexicFont = localStorage.getItem(STORAGE_KEYS.dyslexicFont);
		const dyslexicFontBtns = document.querySelectorAll('[data-toggle="dyslexic-font"]');
		if (dyslexicFont === 'true') {
			html.classList.add('dyslexic-font');
			dyslexicFontBtns.forEach(btn => btn.classList.add('active'));
		}

		// Load high contrast
		const highContrast = localStorage.getItem(STORAGE_KEYS.highContrast);
		const highContrastBtns = document.querySelectorAll('[data-toggle="high-contrast"]');
		if (highContrast === 'true') {
			html.classList.add('high-contrast');
			highContrastBtns.forEach(btn => btn.classList.add('active'));
		}
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
