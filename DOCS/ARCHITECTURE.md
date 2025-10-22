# Application Architecture

## Overview

This application uses a modern, component-based architecture inspired by React, with a clean separation of concerns and zero global variables. All data flows explicitly through objects and props.

## Core Concepts

### 1. PageContext Object

The `PageContext` class is the central container for all page-level data and metadata.

**Location:** `helpers/PageContext.php`

**Properties:**
- `layoutData` - Application-wide data (dispatch info, navigation)
- `layout` - Path to the layout template file
- `page_title` - Page title for `<title>` tag
- `meta_description` - Meta description
- `body_class` - CSS class for `<body>` tag
- `canonical_url` - Canonical URL for SEO
- `og_title`, `og_description`, `og_url`, `og_type`, `og_site_name`, `og_image` - Open Graph metadata
- `content` - Buffered page content (set by buffer system)

### 2. Data Files

Centralized data sources that return arrays.

**Pattern:**
```php
<?php
return [
    'key' => 'value',
    // ...
];
?>
```

**Files:**
- `data/nav.php` - Navigation menu structure
- `data/dispatchCenterInfo.php` - Dispatch center contact information

### 3. Helpers Class

Namespaced utility class with static methods.

**Namespace:** `App\Helpers`

**Location:** `helpers/index.php`

**Methods:**
- `component($name, $props)` - Renders a component with props
- `renderDropdown($children)` - Renders navigation dropdown HTML
- `renderFooterNavList($children)` - Renders footer navigation list HTML
- `getPreparednessLevels()` - Retrieves preparedness levels from JSON

**Usage:**
```php
\App\Helpers::component('hero', ['dispatchInfo' => $dispatchInfo]);
```

## Architecture Flow

```
┌─────────────────────────────────────────────────────────────────┐
│ 1. Page File (index.php, about/index.php, etc.)                │
│    - Requires config/layout.php                                 │
│    - Receives $pageContext object                               │
│    - Sets page-specific metadata on $pageContext                │
│    - Outputs page content (buffered)                            │
└────────────────────────┬────────────────────────────────────────┘
                         │
                         ▼
┌─────────────────────────────────────────────────────────────────┐
│ 2. config/layout.php (Bootstrap)                                │
│    - Loads error handler                                        │
│    - Loads helpers and PageContext class                        │
│    - Loads data files (nav, dispatch info)                      │
│    - Creates PageContext with layoutData                        │
│    - Starts output buffering                                    │
│    - Sets default metadata                                      │
│    - Returns $pageContext to page file                          │
└────────────────────────┬────────────────────────────────────────┘
                         │
                         ▼
┌─────────────────────────────────────────────────────────────────┐
│ 3. config/buffer.php (Output Buffering)                         │
│    - Starts output buffer                                       │
│    - Registers shutdown function (closure)                      │
│    - Closure captures $pageContext                              │
└────────────────────────┬────────────────────────────────────────┘
                         │
                         ▼
┌─────────────────────────────────────────────────────────────────┐
│ 4. config/defaults.php (Default Metadata)                       │
│    - Sets default page_title, meta_description, etc.            │
│    - Sets canonical_url from site_base_url                      │
│    - Sets Open Graph defaults                                   │
│    - All defaults set on $pageContext properties               │
└────────────────────────┬────────────────────────────────────────┘
                         │
                         ▼
┌─────────────────────────────────────────────────────────────────┐
│ 5. Shutdown (End of Page Execution)                             │
│    - Closure executes                                           │
│    - Captures buffered content into $pageContext->content       │
│    - Extracts properties from $pageContext                      │
│    - Requires layout template                                   │
└────────────────────────┬────────────────────────────────────────┘
                         │
                         ▼
┌─────────────────────────────────────────────────────────────────┐
│ 6. layouts/default.php (Layout Template)                        │
│    - Accesses $layoutData from $pageContext                     │
│    - Prepares data for components                               │
│    - Renders header, footer with props                          │
│    - Outputs $content (buffered page content)                   │
└────────────────────────┬────────────────────────────────────────┘
                         │
                         ▼
┌─────────────────────────────────────────────────────────────────┐
│ 7. Components (header, footer, nav, hero)                       │
│    - Receive data via $props array                              │
│    - Render HTML using prop data                                │
│    - Can call nested components with props                      │
└─────────────────────────────────────────────────────────────────┘
```

## Component System

### Creating a Component

Components are located in `components/{name}/index.php`.

**Component Structure:**
```php
<!-- Component Name -->
<div class="component-wrapper">
    <h1><?= htmlspecialchars($props['title']) ?></h1>
    <?php foreach ($props['items'] as $item): ?>
        <p><?= htmlspecialchars($item) ?></p>
    <?php endforeach; ?>
</div>
```

### Using a Component

```php
\App\Helpers::component('componentName', [
    'title' => 'Hello World',
    'items' => ['Item 1', 'Item 2']
]);
```

### Props Access

Inside components, data is accessed via the `$props` array:

```php
$props['propName']
$props['nestedArray']['key']
```

### Nested Components

Components can render other components and pass props down:

```php
<!-- Parent Component -->
<div class="parent">
    <?php \App\Helpers::component('child', ['data' => $props['childData']]); ?>
</div>
```

## Data Flow Examples

### Example 1: Setting Page Metadata

```php
<?php
// index.php
$pageContext = require_once('config/layout.php');
$dispatchInfo = $pageContext->layoutData['dispatchInfo'];

// Override default page title
$pageContext->page_title = "Custom Page Title";
$pageContext->meta_description = "Custom description for SEO";
?>

<h1>Page Content</h1>
```

### Example 2: Passing Data to Components

```php
<?php
// layouts/default.php
global $layoutData;
$dispatchInfo = $layoutData['dispatchInfo'];
$navItems = $layoutData['navItems'];

// Pass data to header component
\App\Helpers::component('header', [
    'navItems' => $navItems,
    'dispatchInfo' => $dispatchInfo
]);
?>
```

### Example 3: Using Props in Components

```php
<!-- components/header/index.php -->
<header>
    <h1><?= htmlspecialchars($props['dispatchInfo']['name']) ?></h1>
    <?php \App\Helpers::component('nav', ['navItems' => $props['navItems']]); ?>
</header>
```

## Key Principles

### 1. No Global Variables
All data flows explicitly through:
- `$pageContext` object (page-level data)
- `$props` arrays (component data)
- Return values from data files

### 2. Single Source of Truth
- Data files in `data/` directory
- Loaded once in `config/layout.php`
- Passed down through the application

### 3. Props-Based Components
- Components receive data via `$props`
- Similar to React component pattern
- Clear data dependencies

### 4. Separation of Concerns
- **Data**: `data/` directory
- **Configuration**: `config/` directory
- **Presentation**: `components/` and `layouts/`
- **Utilities**: `helpers/` directory
- **Content**: Page files (index.php, about/index.php, etc.)

### 5. Type Safety via Objects
- `PageContext` object for page state
- Properties are explicit and documented
- IDE autocomplete support

## File Structure

```
CoDrcTemplate/
├── assets/
│   └── css/
│       └── custom.css          # Site-specific styles
├── components/
│   ├── footer/
│   │   └── index.php           # Footer component
│   ├── header/
│   │   └── index.php           # Header component
│   ├── hero/
│   │   └── index.php           # Hero component
│   └── nav/
│       └── index.php           # Navigation component
├── config/
│   ├── buffer.php              # Output buffering system
│   ├── defaults.php            # Default metadata values
│   ├── error-handler.php       # Error handling
│   └── layout.php              # Bootstrap & entry point
├── data/
│   ├── dispatchCenterInfo.php  # Dispatch center data
│   └── nav.php                 # Navigation structure
├── helpers/
│   ├── index.php               # Helpers class
│   └── PageContext.php         # PageContext class
├── layouts/
│   └── default.php             # Default layout template
├── about/
│   └── index.php               # About page
├── contact/
│   └── index.php               # Contact page
└── index.php                   # Home page
```

## Best Practices

### Page Files

```php
<?php
// 1. Load layout system and get page context
$pageContext = require_once('config/layout.php');

// 2. Extract data you need
$dispatchInfo = $pageContext->layoutData['dispatchInfo'];

// 3. Set page-specific metadata
$pageContext->page_title = "Your Page Title";
$pageContext->meta_description = "Your description";
?>

<!-- 4. Output your page content -->
<h1>Your Content</h1>
```

### Creating New Components

1. Create directory: `components/mycomponent/`
2. Create file: `components/mycomponent/index.php`
3. Access props: `$props['propName']`
4. Sanitize output: `htmlspecialchars()`

### Adding New Data Sources

1. Create file in `data/`: `data/mydata.php`
2. Return an array: `return ['key' => 'value'];`
3. Load in `config/layout.php`:
   ```php
   'myData' => require_once __DIR__ . '/../data/mydata.php'
   ```
4. Access in pages: `$pageContext->layoutData['myData']`

### Security

- **Always** use `htmlspecialchars()` when outputting user data
- **Never** use `echo` with raw variables
- **Sanitize** in data preparation layer (layout.php) when possible
- **Use** parameterized queries for database operations (if added)

## Testing

### Manual Testing Checklist

- ✅ All pages load without errors
- ✅ Page titles are correct
- ✅ Meta tags are populated
- ✅ Navigation works on desktop and mobile
- ✅ Footer displays correctly
- ✅ Components receive correct props
- ✅ No global variable warnings in error log

### Common Issues

**Issue:** "Undefined variable $pageContext"
- **Solution:** Ensure page file requires `config/layout.php` and assigns result to `$pageContext`

**Issue:** "Trying to access array offset on null"
- **Solution:** Check that data files return arrays and props are passed correctly

**Issue:** "Class 'App\Helpers' not found"
- **Solution:** Ensure helpers are loaded and use full namespace: `\App\Helpers::`

## Migration Guide

### From Old Global Variables Pattern

**Before:**
```php
include_once("dispatch_config.php");
$page_title = $dispatch_center_name;
```

**After:**
```php
$pageContext = require_once('config/layout.php');
$pageContext->page_title = $pageContext->layoutData['dispatchInfo']['name'];
```

### From Old Component Pattern

**Before:**
```php
component('header');  // No props
```

**After:**
```php
\App\Helpers::component('header', [
    'navItems' => $navItems,
    'dispatchInfo' => $dispatchInfo
]);
```

## Performance Considerations

- Data files loaded once via `require_once`
- Output buffering minimizes HTTP overhead
- Components loaded on-demand
- No database queries in this architecture (static data only)

## Future Enhancements

Potential improvements while maintaining architecture:

1. **Caching Layer** - Cache compiled data files
2. **Asset Pipeline** - Minify CSS/JS automatically
3. **Template Engine** - Add Twig or similar for more features
4. **Dependency Injection** - Container for services
5. **Routing** - Cleaner URLs with .htaccess rules
6. **API Layer** - REST API for preparedness levels
7. **Testing Suite** - PHPUnit tests for helpers and components

## Support

For questions or issues with this architecture:
1. Review this documentation
2. Check the code comments in config files
3. Examine working examples in existing pages
4. Refer to component implementations for patterns
