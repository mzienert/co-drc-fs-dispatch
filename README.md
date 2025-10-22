# USFS Dispatch Center Website Template

This repository contains a website template for USFS (U.S. Forest Service) dispatch centers.

## Quick Start

1. Edit dispatch center configuration in `/data/dispatchCenterInfo.php`
2. Customize the homepage content in `index.php`
3. Configure SharePoint integration in `/data/sharepointConfig.php`
4. Upload center-specific images to the `assets/images/` folder
5. Deploy via SFTP to your assigned directory

## Development Setup

### Prerequisites
- PHP >= 7.4
- Composer (for dependency management and testing)

### Installing Composer

If you don't have Composer installed:

```bash
# Download Composer installer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Install Composer globally (requires sudo)
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Clean up
php -r "unlink('composer-setup.php');"

# Verify installation
composer --version
```

### Installing Dependencies

```bash
# Install all dependencies (including dev dependencies like PHPUnit)
composer install

# Install only production dependencies (excludes PHPUnit)
composer install --no-dev
```

## Testing

This project uses PHPUnit for testing.

### Running Tests

```bash
# Run all tests
vendor/bin/phpunit

# Run tests with verbose output
vendor/bin/phpunit --verbose

# Run a specific test file
vendor/bin/phpunit tests/HelpersTest.php

# Run tests with coverage report (requires Xdebug)
vendor/bin/phpunit --coverage-html coverage
```

### Writing Tests

Tests are located in the `/tests` directory. Test files should:
- End with `Test.php` (e.g., `HelpersTest.php`)
- Extend `PHPUnit\Framework\TestCase`
- Have test methods prefixed with `test` (e.g., `testSanitizeMethod()`)

Example test:
```php
<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Helpers;

class MyTest extends TestCase
{
    public function testExample()
    {
        $result = Helpers::sanitize('<script>test</script>');
        $this->assertEquals('&lt;script&gt;test&lt;/script&gt;', $result);
    }
}
```

## Project Structure

```
website/
├── vendor/              # Composer dependencies (generated)
├── tests/              # PHPUnit tests
├── helpers/            # Helper classes
│   └── index.php       # Helpers class
├── lib/                # Library classes
│   └── SharePointListClient.php
├── components/         # Reusable components (hero, nav, header, footer)
├── layouts/            # Page layouts
│   └── default.php     # Default layout template
├── data/               # Configuration files
│   ├── dispatchCenterInfo.php  # Center information
│   ├── nav.php                 # Navigation structure
│   └── sharepointConfig.php    # SharePoint integration
├── assets/             # Static assets
│   ├── css/            # Custom styles
│   ├── images/         # Images and logos
│   └── svg/            # SVG icons
├── docs/               # Documentation
├── composer.json       # Dependency configuration
├── phpunit.xml         # PHPUnit configuration
└── README.md          # This file
```

## SharePoint Integration

This template integrates with SharePoint Online lists to display dynamic data like fire danger levels.

Configuration is in `/data/sharepointConfig.php`:

```php
return [
    'website-data' => [
        'shareLink' => 'https://firenet365-my.sharepoint.com/:li:/g/...',
        'listGuid' => 'your-list-guid',
        'siteUrl' => 'https://firenet365-my.sharepoint.com/personal/...',
        'cacheDuration' => 300,
        'debug' => false
    ]
];
```

See [docs/SHAREPOINT-INTEGRATION.md](docs/SHAREPOINT-INTEGRATION.md) for setup instructions.

## Helper Utilities

### Helpers::sanitize()
Sanitizes strings for HTML output with optional capitalization.
```php
Helpers::sanitize($value);              // Sanitize only
Helpers::sanitize($value, true);        // Sanitize + capitalize first letter
```

### Helpers::prop()
Get nested array values with dot notation.
```php
Helpers::prop($props, 'dispatchInfo.base_path');
Helpers::prop($props, 'missing.key', 'default');
```

### Helpers::getFireDanger()
Get fire danger levels from SharePoint.
```php
$fireDanger = Helpers::getFireDanger();
// Returns: ['higher-elevation' => 'Low', 'lower-elevation' => 'Moderate']
```

### Helpers::component()
Include reusable components (like React).
```php
Helpers::component('hero', ['dispatchInfo' => $dispatchInfo]);
Helpers::component('nav', ['navItems' => $navItems]);
```

## Deployment

### Preparing for Deployment

```bash
# Install production dependencies only (excludes testing tools)
composer install --no-dev --optimize-autoloader

# Deploy these files/directories to production:
# - vendor/
# - All your PHP application files
# - composer.json and composer.lock (optional but recommended)
```

### Important Notes

- **The `vendor/` directory is safe to deploy** - it contains only PHP files and won't affect other sites on the server
- Each project has its own isolated `vendor/` directory
- The server does NOT need Composer installed - just deploy the `vendor/` folder
- **Do NOT deploy the `/tests` directory** to production

### Deployment Architecture

- **Shared hosting environment** with centralized CSS/JavaScript management
- **Limited SFTP access** to your assigned subdirectory only
- **External assets** referenced from `/rmcc/assets/` (managed by IT)

See [docs/DEPLOYMENT.md](docs/DEPLOYMENT.md) for detailed deployment instructions.

## Composer Commands Reference

```bash
# Install dependencies
composer install

# Update dependencies to latest versions
composer update

# Add a new package
composer require package/name

# Add a dev dependency (like a testing tool)
composer require --dev package/name

# Remove a package
composer remove package/name

# Regenerate autoloader (after adding new classes)
composer dump-autoload

# Show installed packages
composer show

# Validate composer.json
composer validate
```

## Documentation

📋 **[Requirements & Compliance](docs/REQUIREMENTS.md)** - Section 508 accessibility, CSS/JS restrictions, USFS standards

🚀 **[Deployment Guide](docs/DEPLOYMENT.md)** - Server setup, SFTP process, troubleshooting

🌐 **[Public Repository Guidelines](docs/PUBLIC-REPOSITORY.md)** - Open source policy, security considerations, publishing guidance

🎨 **[RMCC CSS Framework](docs/RMCC-CSS-FRAMEWORK.md)** - Custom flexbox system documentation

📋 **[Planning Guide](docs/PLANNING-GUIDE.md)** - Comprehensive guide for website planning sessions and content strategy

🔗 **[SharePoint Integration](docs/SHAREPOINT-INTEGRATION.md)** - SharePoint setup and configuration guide

## .gitignore Recommendations

Add these to your `.gitignore`:
```
/vendor/
composer.lock
/tests/coverage/
.DS_Store
```

## License

This project uses **Creative Commons Zero (CC0 1.0 Universal)** - "No Rights Reserved"

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
