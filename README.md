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

📋 **[Requirements & Compliance](docs/requirements.md)** - Section 508 accessibility, CSS/JS restrictions, USFS standards

🚀 **[Deployment Guide](docs/deployment.md)** - Server setup, SFTP process, troubleshooting

🌐 **[Public Repository Guidelines](docs/public-repository.md)** - Open source policy, security considerations, publishing guidance

## Important Notes

⚠️ **Mandatory Compliance**: All federal websites must meet Section 508/WCAG 2.0 Level AA standards

🔒 **Limited Modifications**: You can only modify template files in your directory - shared CSS/JS is centrally managed

📱 **Mobile & Accessibility First**: Test with screen readers and keyboard navigation