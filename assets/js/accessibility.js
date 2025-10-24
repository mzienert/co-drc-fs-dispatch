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
	const FONT_SIZES = ['normal', 'large', 'xlarge'];

	/**
	 * Initialize accessibility menu
	 */
	function init() {
		// Load saved preferences on page load
		loadPreferences();

		// Setup dropdown toggle
		const toggle = document.querySelector('.accessibility-toggle');
		const dropdown = document.querySelector('.accessibility-dropdown');

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

		// Setup option buttons
		const fontSizeBtn = document.querySelector('[data-toggle="font-size"]');
		const dyslexicFontBtn = document.querySelector('[data-toggle="dyslexic-font"]');
		const highContrastBtn = document.querySelector('[data-toggle="high-contrast"]');

		if (fontSizeBtn) {
			fontSizeBtn.addEventListener('click', toggleFontSize);
		}

		if (dyslexicFontBtn) {
			dyslexicFontBtn.addEventListener('click', toggleDyslexicFont);
		}

		if (highContrastBtn) {
			highContrastBtn.addEventListener('click', toggleHighContrast);
		}
	}

	/**
	 * Toggle font size (cycles through normal -> large -> xlarge -> normal)
	 */
	function toggleFontSize() {
		const html = document.documentElement;
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
		}

		// Save to localStorage
		localStorage.setItem(STORAGE_KEYS.fontSize, nextSize);
	}

	/**
	 * Toggle dyslexic font
	 */
	function toggleDyslexicFont() {
		const html = document.documentElement;
		const isEnabled = html.classList.contains('dyslexic-font');

		if (isEnabled) {
			html.classList.remove('dyslexic-font');
			localStorage.setItem(STORAGE_KEYS.dyslexicFont, 'false');
		} else {
			html.classList.add('dyslexic-font');
			localStorage.setItem(STORAGE_KEYS.dyslexicFont, 'true');
		}
	}

	/**
	 * Toggle high contrast mode
	 */
	function toggleHighContrast() {
		const html = document.documentElement;
		const isEnabled = html.classList.contains('high-contrast');

		if (isEnabled) {
			html.classList.remove('high-contrast');
			localStorage.setItem(STORAGE_KEYS.highContrast, 'false');
		} else {
			html.classList.add('high-contrast');
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
		if (fontSize && fontSize !== 'normal') {
			html.classList.add('font-size-' + fontSize);
		}

		// Load dyslexic font
		const dyslexicFont = localStorage.getItem(STORAGE_KEYS.dyslexicFont);
		if (dyslexicFont === 'true') {
			html.classList.add('dyslexic-font');
		}

		// Load high contrast
		const highContrast = localStorage.getItem(STORAGE_KEYS.highContrast);
		if (highContrast === 'true') {
			html.classList.add('high-contrast');
		}
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
