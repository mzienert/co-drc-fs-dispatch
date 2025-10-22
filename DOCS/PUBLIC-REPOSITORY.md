# Public Repository Guidelines

## Federal Policy for Open Source Code

### Legal Framework
This template can and should be stored in a public git repository per federal policy:

- **Federal Source Code Policy (M-16-21)** - Issued by OMB in August 2016, requires federal agencies to make custom-developed source code available for sharing and reuse
- **Code.gov Initiative** - Federal platform promoting code sharing across agencies
- **Creative Commons Zero (CC0)** - Standard license for federal government projects

### Policy Requirements
Federal agencies must:
- Create and maintain public source code inventories
- Share custom-developed code across agencies
- Release appropriate code on platforms like GitHub
- Document repositories thoroughly for public use

## What Can Be Published Safely

### ✅ Safe to Include
- Template files and PHP code structure
- Documentation and deployment guides
- CSS/JavaScript without sensitive logic
- Configuration examples with placeholder data
- Development workflows and best practices

### ⚠️ Requires Sanitization
- Contact information (use example data)
- Phone numbers and email addresses
- Server paths and network information
- Any operational security details

## Pre-Publication Security Review

### Data Sanitization Checklist
- [ ] Replace real contact info with placeholders
- [ ] Remove specific server paths
- [ ] Clear any internal network references
- [ ] Verify no sensitive operational data
- [ ] Review for security vulnerabilities

### Example Sanitized Configuration
```php
// EXAMPLE - Replace with your center's information
$dispatch_center_name = "Example Local Dispatch Center";
$dispatch_center_id = "ELDC";
$dispatch_center_24_hour_phone = "800-XXX-XXXX";
$dispatch_center_office_phone = "XXX-XXX-XXXX";
$dispatch_center_email = "example@firenet.gov";
```

## Repository Best Practices

### Documentation Requirements
- Clear README with setup instructions
- Compliance requirements (Section 508/WCAG)
- Security disclaimers about sensitive data
- Contributing guidelines for other agencies

### Code Quality Standards
- HTML5 validation compliance
- Section 508 accessibility testing
- Cross-browser compatibility
- Mobile responsiveness verification

### Community Engagement
- Issue tracking for bug reports
- Pull request guidelines
- Version tagging for releases
- Change log maintenance

## Licensing and Legal

### Standard License
Federal government code typically uses:
- **Creative Commons Zero (CC0 1.0)** - "No Rights Reserved"
- Allows unrestricted use, modification, and distribution
- Standard for federal government open source projects

### Legal Disclaimers
Include standard federal disclaimers:
- No warranty or guarantee of fitness
- Security responsibility lies with implementer
- Compliance with local regulations required

## Benefits of Public Repository

### For USFS
- Code reuse across dispatch centers
- Community contributions and improvements
- Transparency in government operations
- Reduced development costs through sharing

### For Other Agencies
- Proven template for emergency management sites
- Section 508 compliant starting point
- Best practices documentation
- Interagency collaboration opportunities

## References and Sources

### Federal Policies
- [Federal Source Code Policy (M-16-21)](https://www.whitehouse.gov/sites/whitehouse.gov/files/omb/memoranda/2016/m_16_21.pdf)
- [Code.gov Open Source Toolkit](https://github.com/GSA/code-gov-open-source-toolkit)
- [Digital.gov Federal Source Code Policy](https://digital.gov/resources/requirements-for-achieving-efficiency-transparency-and-innovation-through-reusable-and-open-source-software/)

### Government GitHub Examples
- [U.S. Web Design System](https://github.com/uswds/uswds)
- [Federal Website Index](https://github.com/GSA/federal-website-index)
- [Government Open Source Policies](https://github.com/github/government-open-source-policies)

### Accessibility Standards
- [Section 508 Guidelines](https://www.section508.gov/)
- [Web Content Accessibility Guidelines (WCAG 2.0)](https://www.w3.org/WAI/WCAG21/quickref/)

## Security Considerations

### Before Publishing
1. **Code Review** - Ensure no sensitive information in code
2. **Security Scan** - Run automated security analysis
3. **Documentation Review** - Verify all sensitive references removed
4. **Legal Review** - Confirm compliance with agency policies

### Ongoing Maintenance
- Monitor for security vulnerabilities in dependencies
- Update documentation as policies change
- Respond to community security reports
- Maintain current contact information for security issues

## Contributing Guidelines

### For Government Users
- Follow agency approval processes
- Test accessibility compliance
- Document changes thoroughly
- Coordinate with other dispatch centers

### For Community Contributors
- Respect federal compliance requirements
- Focus on accessibility and usability improvements
- Provide clear documentation for changes
- Understand this is government infrastructure code
