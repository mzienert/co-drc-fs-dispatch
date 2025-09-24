# CSS Framework Expectations

## Overview

The `/rmcc/assets/css/main.css` file contains the shared CSS framework that powers all dispatch center websites. Understanding its structure helps you work within the system's constraints and leverage its capabilities.

## Expected Framework: U.S. Web Design System (USWDS)

### Base Framework
The CSS is built on the **U.S. Web Design System**, which is the federal government's official design framework:

- **Version**: Likely USWDS 3.x with Forest Service customizations
- **Architecture**: Sass-compiled CSS with utility classes
- **Methodology**: BEM (Block Element Modifier) naming convention
- **Grid System**: 12-column responsive grid system

### Typography System
```css
/* Expected font stack */
font-family: "Source Sans Pro", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;

/* Heading hierarchy */
h1 { font-size: 2.5rem; }  /* 40px */
h2 { font-size: 2rem; }    /* 32px */
h3 { font-size: 1.5rem; }  /* 24px */
```

### Color Palette
**USWDS Base Colors:**
- `--color-blue-60`: Primary actions and links
- `--color-red-50`: Error states and alerts
- `--color-green-50`: Success states
- `--color-gray-90`: Primary text

**USFS Customizations (Expected):**
- `--usfs-green`: #006847 (Forest Service primary)
- `--fire-red`: #d63384 (Emergency alerts)
- `--earth-brown`: #8B4513 (Secondary branding)

## Layout Structure

### Main Layout Classes
Based on your template, these classes likely exist:
```css
#wrapper {
  /* Main page container */
  max-width: 1200px;
  margin: 0 auto;
}

#main {
  /* Content area wrapper */
  display: flex;
  flex-wrap: wrap;
}

.inner {
  /* Inner content padding */
  padding: 2rem 1rem;
}
```

### Component Classes
**Alert/Notification Boxes:**
```css
.box {
  /* Your headlines container */
  padding: 1rem;
  border: 3px solid;
  border-radius: 0.25rem;
  background-color: wheat;
}
```

## Responsive Design Framework

### Breakpoints (USWDS Standard)
- **Mobile**: < 640px (`mobile-lg`)
- **Tablet**: 640px - 1023px (`tablet`)
- **Desktop**: 1024px+ (`desktop`)

### Grid Classes
```css
.grid-container { max-width: 1200px; }
.grid-row { display: flex; }
.grid-col-12 { width: 100%; }
.grid-col-6 { width: 50%; }
```

## Accessibility Features

### Section 508 Compliance Built-in
- **Focus States**: `:focus` styles with 3px outline
- **Color Contrast**: WCAG AA compliant ratios
- **Skip Links**: Hidden navigation aids
- **Screen Reader**: Proper semantic styling

### High Contrast Support
```css
@media (prefers-contrast: high) {
  /* Enhanced contrast styles */
}
```

## Emergency Management Specific Styling

### Alert Hierarchy
**Critical Alerts:**
```css
.usa-alert--emergency {
  background-color: #d63384;
  border-color: #b02a5b;
}
```

**Status Indicators:**
- Green: Operational/Normal
- Yellow: Elevated/Watch
- Red: High/Warning
- Orange: Critical/Emergency

### Print Optimization
```css
@media print {
  /* Emergency documentation styling */
  .no-print { display: none; }
  * { color: black !important; }
}
```

## What You Cannot Override

### Protected Elements
- **Core USWDS Components**: Buttons, forms, navigation
- **Accessibility Implementations**: Focus styles, contrast ratios
- **Federal Branding**: Official color usage, typography hierarchy
- **Grid System**: Breakpoints and container widths

### Security Restrictions
- No `position: absolute` for content layout
- No pseudo-elements for meaningful content
- No removal of focus indicators
- No contrast ratio violations

## What You Can Customize

### Safe Customizations
- **Local Variables**: Override Sass variables if supported
- **Content Styling**: Colors within compliance guidelines
- **Spacing**: Margins and padding for your content
- **Typography**: Size adjustments within hierarchy

### Recommended Approach
```css
/* In your local styles */
.custom-content {
  /* Use utility classes when possible */
  padding: var(--spacing-4);
  color: var(--color-primary);
}
```

## Working with the Framework

### Best Practices
1. **Use Utility Classes**: Leverage USWDS utilities instead of custom CSS
2. **Follow BEM Naming**: If adding custom classes, use BEM methodology
3. **Test Accessibility**: Ensure any customizations maintain compliance
4. **Mobile First**: Design for mobile, enhance for desktop

### Debugging Tips
```css
/* Check for USWDS version */
html::before {
  content: "USWDS Version: " attr(data-uswds-version);
}
```

## Framework Dependencies

### JavaScript Components
The CSS likely includes styles for:
- **Modal Dialogs**: Overlay styles
- **Dropdown Menus**: Interactive navigation
- **Form Validation**: Error state styling
- **Carousel/Slider**: If used for content rotation

### Icon System
- **Font Icons**: USWDS icon font
- **SVG Icons**: Scalable vector graphics
- **Status Icons**: Emergency/alert indicators

## Performance Considerations

### File Size
- **Minified**: Production version is compressed
- **Tree Shaking**: Only used components included
- **Critical Path**: Above-fold styles prioritized

### Loading Strategy
```html
<!-- Likely implementation -->
<link rel="preload" href="/rmcc/assets/css/main.css" as="style">
<link rel="stylesheet" href="/rmcc/assets/css/main.css">
```

## References and Sources

### Official Documentation
- [U.S. Web Design System](https://designsystem.digital.gov/) - Primary design framework
- [USWDS GitHub Repository](https://github.com/uswds/uswds) - Source code and documentation
- [Forest Service USWDS Fork](https://github.com/18F/fs-fork-uswds) - USFS customizations

### Federal Standards
- [Section 508 Design Standards](https://www.section508.gov/develop/guide-accessible-web-design-development/)
- [WCAG 2.0 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/) - Web accessibility standards
- [Federal Source Code Policy](https://www.whitehouse.gov/sites/whitehouse.gov/files/omb/memoranda/2016/m_16_21.pdf)

### USFS Specific
- [USFS Branding Standards](https://www.fs.usda.gov/sites/default/files/fs_media/fs_document/Branding-Standards.pdf) - Official branding guidelines
- [Interagency Standards for Fire Operations](https://www.nifc.gov/sites/default/files/redbook-files/RedBook_Final.pdf) - Emergency management standards

### Technical Implementation
- [Sass Documentation](https://sass-lang.com/documentation) - CSS preprocessing
- [BEM Methodology](https://en.bem.info/methodology/) - CSS naming convention
- [CSS Grid Layout](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout) - Modern layout system

## Version History and Updates

### Staying Current
- **USWDS Updates**: Framework is actively maintained
- **Security Patches**: Regular updates for vulnerabilities
- **Accessibility Updates**: Compliance with evolving standards
- **Browser Support**: Updated for current browser standards

### Change Management
- Changes to shared CSS require coordination with IT
- Local overrides should be documented and tested
- Accessibility regression testing after any updates
- Cross-browser validation for all customizations