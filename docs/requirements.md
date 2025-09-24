# Development Requirements & Compliance

## Accessibility Requirements (Section 508/WCAG 2.0 Level AA)

**MANDATORY COMPLIANCE** - All federal websites must meet Section 508 standards:

### Color and Visual Design
- **Color Contrast**: Minimum 4.5:1 for normal text, 3:1 for large text (18pt+ or 14pt bold)
- **No Color-Only Information**: Never rely solely on color to convey meaning
- **Visible Focus Indicators**: All interactive elements must have clear focus states

### Keyboard Navigation
- **Full Keyboard Access**: All functionality must be operable via keyboard only
- **Logical Tab Order**: Focus should move in a meaningful sequence
- **No Keyboard Traps**: Users must be able to navigate away from any element
- **Skip Links**: Provide way to bypass repetitive navigation

### Screen Reader Compatibility
- **Semantic HTML**: Use proper heading structure (H1-H6), lists, tables
- **ARIA Labels**: Provide accessible names for complex UI elements
- **Alt Text**: Meaningful descriptions for all images
- **Form Labels**: Every input must have an associated label

### Content Structure
- **Meaningful Headings**: Logical hierarchy without skipping levels
- **Descriptive Links**: Link text must make sense out of context
- **Proper List Markup**: Use `<ul>`, `<ol>`, and `<li>` correctly
- **Table Headers**: Associate data cells with header cells

## CSS/JavaScript Modification Restrictions

### What You CAN Modify
- Template-specific styles within your assigned directory
- Local CSS files and inline styles
- Custom Sass variables via `_variables.scss`
- Content styling (colors, fonts, spacing within guidelines)

### What You CANNOT Modify
- Core `/rmcc/assets/css/main.css` file
- Shared JavaScript libraries and frameworks
- Server-side configuration files
- Security-related headers or scripts

### Prohibited CSS Practices
- **`position: absolute`** for content layout (disrupts reading order)
- **CSS pseudo-elements** (`::before`, `::after`) for meaningful content
- **Fixed positioning** that covers interactive elements
- **Styles that remove focus indicators**

### JavaScript Limitations
- **No Auto-Playing Content** without pause/stop controls
- **No Focus Event Changes** that trigger navigation
- **No Context Changes** on focus or hover
- **Keyboard Event Handling** must not create traps

## USFS-Specific Standards

### Forest Service Design System (fs-fork-uswds)
- Must follow USWDS (U.S. Web Design System) guidelines
- Can override design tokens in custom `_variables.scss`
- Core accessibility patterns must remain intact
- Maintain consistent navigation and branding

### Emergency Management Requirements
- **Offline Capability**: Consider limited connectivity scenarios
- **Mission-Critical Content**: Priority information must be accessible
- **Mobile Responsive**: Support field personnel on mobile devices
- **Interagency Standards**: Follow NIFC coordination protocols

## Content Requirements

### Professional Standards
- All content must be professionally appropriate for government sites
- Use plain language principles for public-facing content
- Maintain consistent tone and terminology

### Contact Information
- Emergency contact numbers must be current and prominently displayed
- Include 24-hour dispatch number, office phone, fax, and email
- Physical address must be complete and accurate

### Dynamic Content
- Headlines should be mission-critical announcements only
- Personnel lists must be current and properly formatted
- All rotating content must be pausable for accessibility

## Technical Validation Requirements

### HTML Validation
- Code must validate against HTML5 standards
- Use semantic elements appropriately
- Ensure proper nesting of elements

### Performance Standards
- Optimize images for web delivery
- Minimize custom JavaScript
- Use efficient CSS selectors
- Test on government-standard browsers

### Browser Compatibility
- Support current versions of Chrome, Firefox, Safari, Edge
- Ensure graceful degradation for older browsers
- Test on mobile browsers used by field personnel

## Testing Checklist

### Accessibility Testing
- [ ] Screen reader testing (NVDA, JAWS, VoiceOver)
- [ ] Keyboard-only navigation
- [ ] Color contrast validation
- [ ] Focus indicator visibility
- [ ] HTML validation

### Functionality Testing
- [ ] Mobile device testing
- [ ] Offline scenario testing (where applicable)
- [ ] Cross-browser compatibility
- [ ] Form validation and error handling
- [ ] Dynamic content accessibility

### Content Review
- [ ] Contact information accuracy
- [ ] Professional tone and language
- [ ] Mission-appropriate content
- [ ] Proper grammar and spelling
- [ ] Compliance with USFS branding standards