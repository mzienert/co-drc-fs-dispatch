# USFS Dispatch Center Template

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

### .gitignore Recommendations

Add these to your `.gitignore`:
```
/vendor/
composer.lock
/tests/coverage/
```

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

## Project Structure

```
CoDrcTemplate/
├── vendor/              # Composer dependencies (generated)
├── tests/              # PHPUnit tests
├── helpers/            # Helper classes
│   └── index.php       # Helpers class
├── lib/                # Library classes
│   └── SharePointListClient.php
├── components/         # Reusable components
├── composer.json       # Dependency configuration
├── phpunit.xml         # PHPUnit configuration
└── README.md          # This file
```

## SharePoint Integration

This template integrates with SharePoint Online lists to display dynamic data like fire danger levels. See `/data/sharepointConfig.php` for configuration.

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
