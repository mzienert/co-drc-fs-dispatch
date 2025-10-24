# Accessibility Menu Implementation Plan

## Overview
Add an accessibility menu to the header navigation that allows users to toggle font size, dyslexic-friendly fonts, and high-contrast color schemes. Based on the NIFC.gov implementation.

## Reference Implementation
- **Source:** https://www.nifc.gov/
- **Element:** Accessibility toggle menu in header
- **Features:** Font size, OpenDyslexic font, dyslexia-friendly color scheme

## Icons Required

### Font Awesome SVG Icons to Download
All icons are available free from Font Awesome under CC BY 4.0 license.

1. **Wheelchair Icon** (`fa-wheelchair`)
   - Purpose: Main accessibility button icon
   - Download from: https://fontawesome.com/icons/wheelchair
   - File: `wheelchair.svg`
   - Location: `/assets/svg/wheelchair.svg`

2. **Text Height Icon** (`fa-text-height`)
   - Purpose: Font size toggle button
   - Download from: https://fontawesome.com/v4/icon/text-height
   - Icon code: \f034
   - File: `text-height.svg`
   - Location: `/assets/svg/text-height.svg`

3. **Font Icon** (`fa-font`)
   - Purpose: Dyslexic font toggle button
   - Download from: https://fontawesome.com/icons/font
   - File: `font.svg`
   - Location: `/assets/svg/font.svg`

4. **Palette/Adjust Icon** (`fa-palette` or `fa-adjust`)
   - Purpose: High contrast mode toggle
   - Download from: https://fontawesome.com/icons/palette or https://fontawesome.com/icons/adjust
   - File: `palette.svg` or `adjust.svg`
   - Location: `/assets/svg/palette.svg`

### Current SVG Icons
- `menu.svg` - Hamburger menu (Font Awesome bars icon)
- `plus.svg` - Plus icon for expandable elements

## Features to Implement

### 1. Font Size Toggle
- **Levels:** Normal → Large → Extra Large
- **Implementation:** Add class to `<html>` element
- **CSS Classes:**
  - `font-size-normal` (default)
  - `font-size-large`
  - `font-size-xlarge`
- **Behavior:** Cycles through sizes on each click
- **Persistence:** Save preference to localStorage

### 2. OpenDyslexic Font Toggle
- **States:** Off (default) → On
- **Implementation:** Add class to `<html>` element
- **CSS Class:** `dyslexic-font`
- **Font:** OpenDyslexic (need to download and add to project)
- **Behavior:** Toggle on/off on each click
- **Persistence:** Save preference to localStorage

### 3. High Contrast Mode Toggle
- **States:** Off (default) → On
- **Implementation:** Add class to `<html>` element
- **CSS Class:** `high-contrast`
- **Behavior:** Toggle on/off on each click
- **Color Scheme:** Black text on cream background (dyslexia-friendly)
- **Persistence:** Save preference to localStorage

## File Structure

```
/components/accessibility-menu/
  index.php                 # Main component file

/assets/svg/
  wheelchair.svg            # Main accessibility icon (NEW)
  text-height.svg          # Font size icon (NEW)
  font.svg                 # Dyslexic font icon (NEW)
  palette.svg              # High contrast icon (NEW)
  menu.svg                 # Existing hamburger menu
  plus.svg                 # Existing plus icon

/assets/fonts/
  OpenDyslexic/            # Font files (NEW)
    OpenDyslexic-Regular.woff2
    OpenDyslexic-Bold.woff2
    OpenDyslexic-Italic.woff2
    (other formats as needed)

/assets/css/
  custom.css               # Add accessibility styles

/assets/js/
  accessibility.js         # JavaScript for toggles (NEW)
```

## Component Location
- **Desktop:** End of header navigation (right side)
- **Mobile:** Include in mobile sidebar menu

## Technical Implementation Details

### HTML Structure (Component)
```php
<!-- Accessibility Menu Component -->
<div class="accessibility-menu">
  <button class="accessibility-toggle" aria-label="Accessibility Options">
    <img src="/assets/svg/wheelchair.svg" alt="Accessibility" class="accessibility-icon" />
  </button>

  <div class="accessibility-dropdown" hidden>
    <button class="accessibility-option" data-toggle="font-size">
      <img src="/assets/svg/text-height.svg" alt="" />
      <span>Font Size</span>
    </button>

    <button class="accessibility-option" data-toggle="dyslexic-font">
      <img src="/assets/svg/font.svg" alt="" />
      <span>Dyslexic Font</span>
    </button>

    <button class="accessibility-option" data-toggle="high-contrast">
      <img src="/assets/svg/palette.svg" alt="" />
      <span>High Contrast</span>
    </button>
  </div>
</div>
```

### CSS Classes to Add
```css
/* Font Size Classes */
html.font-size-large {
  font-size: 115%;
}

html.font-size-xlarge {
  font-size: 130%;
}

/* Dyslexic Font Class */
html.dyslexic-font,
html.dyslexic-font body,
html.dyslexic-font input,
html.dyslexic-font select,
html.dyslexic-font textarea {
  font-family: 'OpenDyslexic', sans-serif !important;
}

/* High Contrast Class */
html.high-contrast {
  background-color: #FFFEF0; /* Cream */
  color: #000000;
}

html.high-contrast body {
  background-color: #FFFEF0;
  color: #000000;
}
```

### JavaScript Functionality
```javascript
// Pseudo-code structure

// 1. Toggle dropdown visibility
document.querySelector('.accessibility-toggle').addEventListener('click', () => {
  // Show/hide dropdown
});

// 2. Font size toggle
fontSizeButton.addEventListener('click', () => {
  // Cycle through: normal → large → xlarge → normal
  // Remove all font-size classes
  // Add new class
  // Save to localStorage
});

// 3. Dyslexic font toggle
dyslexicFontButton.addEventListener('click', () => {
  // Toggle dyslexic-font class
  // Save to localStorage
});

// 4. High contrast toggle
highContrastButton.addEventListener('click', () => {
  // Toggle high-contrast class
  // Save to localStorage
});

// 5. Load preferences on page load
document.addEventListener('DOMContentLoaded', () => {
  // Read from localStorage
  // Apply saved classes
});
```

### localStorage Keys
- `accessibility-font-size` - Values: "normal", "large", "xlarge"
- `accessibility-dyslexic-font` - Values: "true", "false"
- `accessibility-high-contrast` - Values: "true", "false"

## OpenDyslexic Font

### About
- **License:** Free to use (SIL Open Font License)
- **Website:** https://opendyslexic.org/
- **Features:**
  - Bottom-heavy letters that anchor to the line
  - Unique shapes for commonly confused letters (b/d, p/q)
  - Increased spacing between letters and words

### Download
- Download from: https://opendyslexic.org/
- Formats needed: WOFF2, WOFF, TTF
- Weights: Regular, Bold, Italic

### Font-Face Declaration
```css
@font-face {
  font-family: 'OpenDyslexic';
  src: url('/assets/fonts/OpenDyslexic/OpenDyslexic-Regular.woff2') format('woff2'),
       url('/assets/fonts/OpenDyslexic/OpenDyslexic-Regular.woff') format('woff');
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: 'OpenDyslexic';
  src: url('/assets/fonts/OpenDyslexic/OpenDyslexic-Bold.woff2') format('woff2'),
       url('/assets/fonts/OpenDyslexic/OpenDyslexic-Bold.woff') format('woff');
  font-weight: 700;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: 'OpenDyslexic';
  src: url('/assets/fonts/OpenDyslexic/OpenDyslexic-Italic.woff2') format('woff2'),
       url('/assets/fonts/OpenDyslexic/OpenDyslexic-Italic.woff') format('woff');
  font-weight: 400;
  font-style: italic;
  font-display: swap;
}
```

## Integration Points

### Header Component
- Add accessibility menu component to header
- Position at end of desktop navigation
- Add to mobile sidebar menu

### Layout
- Include JavaScript file in `layouts/default.php` after other scripts
- Ensure accessibility preferences load before page render (prevent flash of unstyled content)

## Accessibility Considerations

### Keyboard Navigation
- All buttons must be keyboard accessible
- Use proper ARIA labels
- Dropdown should be keyboard navigable (Tab, Enter, Escape)

### Screen Readers
- Icons should have `aria-hidden="true"`
- Text labels should be visible or use `aria-label`
- Current state should be announced (e.g., "Font size: Large")

### Focus Management
- Clear focus indicators on all interactive elements
- Dropdown should trap focus when open
- Escape key should close dropdown

## Best Practices from Research

### Font Size
- Use relative units (%, em, rem) not absolute (px)
- Increase base font size on `<html>` element
- Ensure all text scales proportionally

### Dyslexic Fonts
- OpenDyslexic recommended spacing:
  - Inter-letter spacing: ~35% of average letter width
  - Inter-word spacing: At least 3.5x the inter-letter spacing
- Research shows spacing is more important than typeface

### High Contrast
- British Dyslexia Association recommendations:
  - Dark text on light background (not pure white)
  - Cream/off-white backgrounds reduce glare
  - Avoid patterns and busy backgrounds

## Testing Checklist

- [ ] Icons display correctly in all browsers
- [ ] Font size toggle cycles through all levels
- [ ] OpenDyslexic font applies to all text elements
- [ ] High contrast mode changes all backgrounds and text
- [ ] Preferences persist across page reloads
- [ ] Preferences persist across browser sessions
- [ ] Keyboard navigation works correctly
- [ ] Screen reader announces state changes
- [ ] Mobile menu includes accessibility options
- [ ] No layout breaks at any font size level
- [ ] Works in Chrome, Firefox, Safari, Edge

## Step-by-Step Implementation Order

1. **Download Assets**
   - Download 4 Font Awesome SVG icons
   - Download OpenDyslexic font files
   - Place in correct directories

2. **Create Component**
   - Create `/components/accessibility-menu/index.php`
   - Follow existing component pattern (like partner-logos, fire-activity-map)

3. **Add CSS**
   - Add accessibility menu styles to `custom.css` (mobile-first!)
   - Add font-face declarations for OpenDyslexic
   - Add utility classes (font-size-*, dyslexic-font, high-contrast)

4. **Create JavaScript**
   - Create `/assets/js/accessibility.js`
   - Implement toggle logic
   - Implement localStorage persistence
   - Load preferences on page load

5. **Integrate into Header**
   - Add component to header navigation
   - Add to mobile sidebar menu
   - Test positioning and responsiveness

6. **Test & Refine**
   - Test all features
   - Fix any layout issues
   - Ensure keyboard accessibility
   - Test across browsers

## Nav Component Modification

### Dropdown Behavior Prop
The nav component needs to be modified to support different dropdown behaviors for different menu items.

#### Current Behavior
- Desktop: Dropdowns show on hover
- Mobile: Dropdowns expand on click

#### New Requirement
Add a prop to nav items to specify dropdown behavior:
- **Default:** `'hover'` - Dropdown shows on hover (current behavior for nav items)
- **Override:** `'click'` - Dropdown expands on click (needed for accessibility menu)

#### Implementation Details

**Nav Data Structure (data/nav.php):**
```php
[
    'label' => 'Accessibility',
    'url' => '#',
    'dropdown' => [
        // dropdown items...
    ],
    'dropdownBehavior' => 'click' // NEW PROP (optional, defaults to 'hover')
]
```

**Nav Component Logic:**
```php
// In nav component
$dropdownBehavior = $item['dropdownBehavior'] ?? 'hover'; // Default to 'hover'

// Add data attribute to nav item
<li class="nav-item has-dropdown" data-dropdown-behavior="<?= $dropdownBehavior ?>">
```

**CSS Updates:**
```css
/* Desktop hover behavior (default) */
@media screen and (min-width: 981px) {
    .nav-item.has-dropdown[data-dropdown-behavior="hover"]:hover .nav-dropdown {
        display: block;
    }
}

/* Desktop click behavior (accessibility menu) */
@media screen and (min-width: 981px) {
    .nav-item.has-dropdown[data-dropdown-behavior="click"].expanded .nav-dropdown {
        display: block;
    }
}
```

**JavaScript Updates (layouts/default.php):**
```javascript
// Update desktop dropdown logic
document.querySelectorAll('.nav-item.has-dropdown > .nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        const parentItem = this.parentElement;
        const behavior = parentItem.getAttribute('data-dropdown-behavior');

        // On desktop
        if (window.innerWidth > 980) {
            // Only handle click behavior on desktop
            if (behavior === 'click') {
                e.preventDefault();
                parentItem.classList.toggle('expanded');

                // Close other click-based dropdowns
                document.querySelectorAll('.nav-item.has-dropdown[data-dropdown-behavior="click"].expanded').forEach(other => {
                    if (other !== parentItem) {
                        other.classList.remove('expanded');
                    }
                });
            }
            // Hover behavior handles itself via CSS
        } else {
            // On mobile, all dropdowns use click behavior
            e.preventDefault();
            parentItem.classList.toggle('expanded');
        }
    });
});

// Close click-based dropdowns when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.nav-item.has-dropdown')) {
        document.querySelectorAll('.nav-item.has-dropdown[data-dropdown-behavior="click"].expanded').forEach(item => {
            item.classList.remove('expanded');
        });
    }
});
```

#### Usage Examples

**Regular Nav Item (hover on desktop):**
```php
[
    'label' => 'Resources',
    'url' => '#',
    'dropdown' => [...]
    // No dropdownBehavior specified = defaults to 'hover'
]
```

**Accessibility Nav Item (click on desktop):**
```php
[
    'label' => 'Accessibility',
    'url' => '#',
    'dropdown' => [...],
    'dropdownBehavior' => 'click' // Explicit click behavior
]
```

#### Why This Matters
- **Regular nav items:** Hover is intuitive for navigation menus
- **Accessibility menu:** Click is better for toggles/actions to prevent accidental activation
- **Mobile:** All items use click regardless (current behavior preserved)
- **Flexibility:** Future menu items can choose their preferred behavior

## Notes
- Follow mobile-first CSS pattern used in rest of project
- Use existing component pattern (props, Helpers, sanitize)
- Match styling with existing header/nav components
- Ensure no conflicts with RMCC base CSS (use !important if needed)
- Consider adding visual indicator when accessibility features are active
- The nav component dropdown behavior modification should be implemented BEFORE integrating the accessibility menu

## Resources
- Font Awesome Icons: https://fontawesome.com/
- OpenDyslexic Font: https://opendyslexic.org/
- NIFC.gov Reference: https://www.nifc.gov/
- Web Accessibility Guidelines: https://www.w3.org/WAI/WCAG21/quickref/
