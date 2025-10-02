# Developer Guide

## Template & Buffer System

### How It Works

The template system uses PHP output buffering to create a React-like layout wrapper. Here's the flow:

1. **Page loads** (e.g., `about/index.php`)
2. **Config files load** in this order:
   - `dispatch_config.php` - Site and dispatch center configuration
   - `config/layout.php` - Bootstrap that loads:
     - `config/error-handler.php` - Fatal error handling
     - `config/helpers.php` - Utility functions (like `component()`)
     - `config/buffer.php` - Output buffering system
     - `config/defaults.php` - Default page variables

3. **Output buffering starts** - Everything echoed from this point is captured
4. **Page content renders** - HTML/PHP in the page file is captured in the buffer
5. **PHP shutdown occurs** - `render_layout()` function runs automatically
6. **Buffer content retrieved** - Captured page content is stored as `$content`
7. **Layout wraps content** - `layouts/default.php` renders with `$content` inside

### Error Handling

The system includes robust error handling:

- **`ob_start()` failure** - Gracefully skips buffering, content renders without layout
- **`ob_get_clean()` failure** - Logs error and exits safely
- **Buffer level checks** - Verifies we're cleaning the correct buffer, not nested ones
- **Fatal errors** - Cleans all buffers and displays user-friendly error page (`errors/fatal.php`)

### Buffer System Files

- **`config/buffer.php`** - Manages output buffering and layout rendering
- **`config/error-handler.php`** - Handles fatal errors and buffer cleanup
- **`config/helpers.php`** - Component loading and utility functions
- **`config/defaults.php`** - Sets default values for page variables

## Available Variables

### Global Scope in `render_layout()`

These variables are available in layout files (like `layouts/default.php`):

#### Page Variables
- `$page_title` - Page title (default: `"$dispatch_center_name ($dispatch_center_id)"`)
- `$meta_description` - Meta description for SEO (default: empty)
- `$body_class` - Additional CSS classes for `<body>` (default: empty)
- `$canonical_url` - Canonical URL for the page (auto-generated from `$site_base_url` + request URI)
- `$layout` - Path to layout file (default: `layouts/default.php`)
- `$content` - Captured page content from buffer

#### Site Configuration
- `$site_base_url` - Base URL of the site (from `dispatch_config.php`)

#### Dispatch Center Variables
- `$dispatch_center_name` - Center name
- `$dispatch_center_id` - Center ID
- `$dispatch_center_email` - Center email
- `$dispatch_center_24_hour_phone` - 24-hour phone number
- `$dispatch_center_office_phone` - Office phone number
- `$dispatch_center_fax_number` - Fax number
- `$dispatch_center_address_line_1` - Address line 1
- `$dispatch_center_address_line_2` - Address line 2

### How to Override Variables

In your page files, set variables **before** they're used:

```php
<?php
include_once("../dispatch_config.php");
require_once('../config/layout.php');

// Override default page variables
$page_title = "Custom Title - $dispatch_center_name";
$meta_description = "Custom description for SEO";
$body_class = "special-page";
$canonical_url = "https://example.com/custom-url"; // Optional override
?>

<h1>Your page content here</h1>
```

### Component System

Use the `component()` helper function to include reusable components:

```php
component('nav');  // No props
component('hero', ['title' => 'Welcome', 'subtitle' => 'Get started']);  // With props
```

Inside component files, access props via the `$props` array:

```php
<!-- components/hero/index.php -->
<div class="hero">
    <h1><?= htmlspecialchars($props['title'] ?? '') ?></h1>
    <p><?= htmlspecialchars($props['subtitle'] ?? '') ?></p>
</div>
```
