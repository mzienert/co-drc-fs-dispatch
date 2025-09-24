# RMCC CSS Framework Documentation

## Overview

The RMCC (Rocky Mountain Area Coordination Center) CSS framework is a custom, responsive CSS framework built on flexbox architecture. This framework powers the dispatch center websites and provides a comprehensive set of layout tools, components, and utilities.

**Framework Location**: `/rmcc/assets/css/main.css`

## Architecture

### Base Framework
- **Type**: Custom flexbox-based framework
- **Build System**: SCSS-compiled CSS
- **Methodology**: Component-based with utility classes
- **Grid System**: 12-column responsive flexbox grid
- **Browser Support**: Modern browsers with flexbox support

## Typography System

### Font Stack
```css
/* Primary Font (Body Text) */
font-family: "Open Sans", sans-serif;

/* Heading Font */
font-family: "Roboto Slab", serif;
```

### Font Weights
- **Regular**: 400 (body text)
- **Semi-bold**: 600 (emphasis)
- **Bold**: 700 (headings, strong emphasis)

### Base Typography
- **Base Size**: 13pt (responsive scaling)
- **Mobile Base**: 9pt (on small screens)
- **Line Height**: 1.75 (body text)

### Heading Hierarchy
```css
h1 { font-size: 4em; }      /* ~64px */
h2 { font-size: 3.5em; }    /* ~56px */
h3 { font-size: 1.75em; }   /* ~28px */
h4 { font-size: 1.25em; }   /* ~20px */
h5 { font-size: 1em; }      /* ~16px */
h6 { font-size: 0.7em; }    /* ~11px */
```

## Color Palette

### Primary Colors
- **Primary Accent**: `#f56a6a` (Coral red - primary brand color)
- **Primary Text**: `#3d4449` (Dark charcoal)
- **Secondary Text**: `#7f888f` (Medium gray)
- **Muted Text**: `#9fa3a6` (Light gray)

### Background Colors
- **White**: `#ffffff` (Main background)
- **Light Background**: `#f5f6f7` (Section backgrounds)
- **Accent Background**: `#eff1f2` (Subtle contrast areas)

### Border Colors
- **Light Border**: `rgba(210, 215, 217, 0.75)`
- **Medium Border**: `rgba(210, 215, 217, 1)`

## Grid System

### Core Grid Structure
The framework uses a 12-column flexbox grid system:

```html
<div class="row">
    <div class="col-4">Column 1</div>
    <div class="col-4">Column 2</div>
    <div class="col-4">Column 3</div>
</div>
```

### Column Classes
- **Full Width**: `.col-12` (100%)
- **Half Width**: `.col-6` (50%)
- **Third Width**: `.col-4` (33.33%)
- **Quarter Width**: `.col-3` (25%)
- **Available**: `.col-1` through `.col-12`

### Row Container
```css
.row {
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    align-items: stretch;
}
```

### Responsive Grid Classes
Format: `.col-{breakpoint}-{width}`

**Breakpoints:**
- `xlarge` - 1681px and up
- `large` - 1281px - 1680px
- `medium` - 981px - 1280px
- `small` - 737px - 980px
- `xsmall` - 481px - 736px
- Default (no prefix) - 480px and down

**Example Usage:**
```html
<div class="row">
    <div class="col-12 col-medium-6 col-large-4">
        Responsive column
    </div>
</div>
```

## Responsive Breakpoints

### Media Query Breakpoints
```scss
$breakpoints: (
    xlarge: 1680px,
    large: 1280px,
    medium: 980px,
    small: 736px,
    xsmall: 480px
);
```

### Breakpoint Usage
- **Desktop Large**: 1681px+ (4+ columns layouts)
- **Desktop**: 1281px-1680px (3-4 column layouts)
- **Tablet**: 981px-1280px (2-3 column layouts)
- **Mobile Large**: 737px-980px (1-2 column layouts)
- **Mobile**: 481px-736px (single column)
- **Mobile Small**: 480px and below (compact single column)

## Utility Classes

### Gutters (Column Spacing)
Control spacing between grid columns:
- `.gtr-0` - No gutters
- `.gtr-25` - 25% default gutters
- `.gtr-50` - 50% default gutters (default)
- `.gtr-150` - 150% gutters
- `.gtr-200` - 200% gutters

### Alignment Classes
**Horizontal Alignment:**
- `.aln-left` - Left align content
- `.aln-center` - Center align content
- `.aln-right` - Right align content

**Text Alignment:**
- `.align-left` - Left align text
- `.align-center` - Center align text
- `.align-right` - Right align text

### Responsive Alignment
Format: `.aln-{breakpoint}-{alignment}`
```html
<div class="row aln-center aln-medium-left">
    <!-- Centered on mobile, left-aligned on medium+ screens -->
</div>
```

## Component Styles

### Buttons
```css
/* Primary Button */
.button {
    background-color: transparent;
    border: 3px solid #f56a6a;
    color: #f56a6a;
    padding: 0 2.25em;
    line-height: 2.75em;
    border-radius: 4px;
}

.button:hover {
    background-color: rgba(245, 106, 106, 0.05);
}

.button.primary {
    background-color: #f56a6a;
    color: #ffffff;
}
```

### Form Elements
**Input Fields:**
```css
input[type="text"],
input[type="email"],
textarea {
    background: #ffffff;
    border: solid 2px rgba(210, 215, 217, 0.75);
    border-radius: 4px;
    padding: 0 1em;
}

input:focus {
    border-color: #f56a6a;
    box-shadow: 0 0 0 1px #f56a6a;
}
```

**Checkboxes and Radio Buttons:**
Custom styled with consistent branding colors.

### Tables
```css
table {
    width: 100%;
    border-collapse: collapse;
}

table.alt {
    border-collapse: separate;
    border-spacing: 0;
    border: solid 2px rgba(210, 215, 217, 0.75);
}
```

### Navigation
**Sidebar Navigation:**
- Fixed positioning available
- Collapsible on mobile
- Smooth transitions
- Brand color accents

## Animations and Transitions

### Default Transition
```css
transition: all 0.2s ease-in-out;
```

### Hover Effects
- **Links**: Color transition to primary color
- **Buttons**: Background color fade
- **Images**: Subtle scale transforms
- **Navigation**: Smooth expand/collapse

### Transform Effects
```css
/* Image hover effects */
.image img {
    transition: transform 0.2s ease-in-out;
}

.image img:hover {
    transform: scale(1.05);
}
```

## Layout Patterns

### Common Layout Classes
```css
/* Main wrapper */
#wrapper {
    width: 100%;
    max-width: none;
}

/* Content container */
#main {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
}

/* Inner content padding */
.inner {
    padding: 3em 3em 1em 3em;
}
```

### Sidebar Layout
```css
/* Sidebar container */
#sidebar {
    background-color: #f5f6f7;
    border-right: solid 2px rgba(210, 215, 217, 0.75);
    width: 26em;
}
```

## Best Practices

### Grid Usage
1. **Always use `.row` containers** for grid layouts
2. **Columns should sum to 12** within a row
3. **Use responsive classes** for different screen sizes
4. **Apply gutters appropriately** with `.gtr-*` classes

### Responsive Design
1. **Mobile-first approach** - design for small screens first
2. **Progressive enhancement** - add complexity for larger screens
3. **Test at all breakpoints** - ensure layouts work across devices
4. **Use appropriate column counts** per screen size

### Typography
1. **Use heading hierarchy** properly (h1 → h6)
2. **Maintain consistent line height** for readability
3. **Apply appropriate font weights** for emphasis
4. **Consider responsive scaling** for mobile devices

### Colors
1. **Use primary color sparingly** for emphasis and branding
2. **Maintain sufficient contrast** for accessibility
3. **Use muted colors** for secondary information
4. **Test color combinations** for readability

## Performance Considerations

### File Size
- **Minified CSS**: Production version is compressed
- **Responsive optimization**: Media queries organized efficiently
- **Component bundling**: Related styles grouped together

### Loading Strategy
```html
<!-- Recommended implementation -->
<link rel="preload" href="/rmcc/assets/css/main.css" as="style">
<link rel="stylesheet" href="/rmcc/assets/css/main.css">
```

## Browser Compatibility

### Supported Browsers
- **Chrome**: 29+ (flexbox support)
- **Firefox**: 28+ (flexbox support)
- **Safari**: 9+ (flexbox support)
- **Edge**: All versions
- **Internet Explorer**: 11+ (with flexbox polyfills if needed)

### Fallbacks
- **Flexbox fallbacks**: Float-based layouts where needed
- **Border-radius degradation**: Graceful fallback to square corners
- **Box-shadow fallbacks**: Standard borders where shadows not supported

## Migration and Integration

### From Other Frameworks
When migrating from USWDS or other frameworks:
1. **Replace grid classes**: `.grid-row` → `.row`, `.grid-col-*` → `.col-*`
2. **Update color variables** to use RMCC palette
3. **Adjust typography** to use Open Sans/Roboto Slab
4. **Review component styles** and update as needed

### Custom Extensions
To extend the framework:
1. **Follow naming conventions** (BEM-style where applicable)
2. **Use existing color palette** for consistency
3. **Maintain responsive patterns** established in the framework
4. **Test across all breakpoints**

## Troubleshooting

### Common Issues
1. **Grid columns overflowing**: Ensure column widths sum to 12 or less
2. **Alignment not working**: Check that parent has proper display property
3. **Responsive issues**: Verify correct breakpoint class usage
4. **Typography inconsistency**: Ensure proper font loading

### Debug Classes
Add temporary debug styling to visualize grid:
```css
.debug .row {
    outline: 1px solid red;
}
.debug [class*="col-"] {
    outline: 1px solid blue;
}
```

## Resources and References

### Framework Dependencies
- **Open Sans Font**: [Google Fonts](https://fonts.google.com/specimen/Open+Sans)
- **Roboto Slab Font**: [Google Fonts](https://fonts.google.com/specimen/Roboto+Slab)

### Documentation Standards
- **Flexbox Guide**: [CSS-Tricks Flexbox Guide](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)
- **Responsive Design**: [Mozilla Responsive Design Guide](https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Responsive_Design)
- **Accessibility**: [WebAIM CSS Accessibility](https://webaim.org/articles/css/)

### Version Information
- **Framework Version**: Custom RMCC v1.0
- **Last Updated**: Based on current deployment
- **Maintenance**: Managed by RMCC IT team