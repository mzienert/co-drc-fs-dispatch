# USFS Dispatch Center Website Template

This repository contains a website template for USFS (U.S. Forest Service) dispatch centers.

## Quick Start

1. Edit `dispatch_config.php` with your dispatch center's information
2. Customize the homepage content in `index.php`
3. Add your headlines to `headlines.txt` (one per line)
4. Upload center-specific images to the `images/` folder
5. Deploy via SFTP to your assigned directory

## Template Structure

The `DispatchCenterTemplate` folder contains:

- **`dispatch_config.php`** - Configuration file for center-specific details
- **`index.php`** - Main homepage template
- **Template components**: `header.php`, `sidebar.php`, `scripts.php`
- **Content files**: `headlines.txt`, `pl.txt`, `images/` folder
- **Page templates**: `list_template.php`, `image_tile_template.php`

## Deployment Architecture

- **Shared hosting environment** with centralized CSS/JavaScript management
- **Limited SFTP access** to your assigned subdirectory only
- **External assets** referenced from `/rmcc/assets/` (managed by IT)

## Documentation

📋 **[Requirements & Compliance](docs/REQUIREMENTS.md)** - Section 508 accessibility, CSS/JS restrictions, USFS standards

🚀 **[Deployment Guide](docs/DEPLOYMENT.md)** - Server setup, SFTP process, troubleshooting

🌐 **[Public Repository Guidelines](docs/PUBLIC-REPOSITORY.md)** - Open source policy, security considerations, publishing guidance

🎨 **[CSS Framework Expectations](docs/CSS-EXPECTATIONS.md)** - USWDS structure, customization limits, styling guidelines

📋 **[Planning Guide](docs/PLANNING-GUIDE.md)** - Comprehensive guide for website planning sessions and content strategy

## License

This project uses **Creative Commons Zero (CC0 1.0 Universal** - "No Rights Reserved"

### Why CC0?
- **Federal Law**: U.S. government works are public domain by default (17 U.S.C. § 105)
- **Policy Compliance**: Follows Code.gov guidance for federal open source projects
- **Maximum Reusability**: No attribution requirements for other agencies or organizations
- **International Compatibility**: Ensures public domain status worldwide

CC0 is the standard license for federal projects including USWDS and other GSA initiatives.

## Important Notes

⚠️ **Mandatory Compliance**: All federal websites must meet Section 508/WCAG 2.0 Level AA standards

🔒 **Limited Modifications**: You can only modify template files in your directory - shared CSS/JS is centrally managed

📱 **Mobile & Accessibility First**: Test with screen readers and keyboard navigation