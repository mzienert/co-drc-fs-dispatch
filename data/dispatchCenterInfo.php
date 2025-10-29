<?php
    // Detect environment based on host
    $isLocal = isset($_SERVER['HTTP_HOST']) &&
               (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ||
                strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);

    // Set paths for assets and navigation
    // LOCAL: Use current directory (relative paths)
    // PRODUCTION: Use absolute paths from domain root to your deployed directory
    if ($isLocal) {
        // Local development - use relative paths for assets
        if (isset($_SERVER['REQUEST_URI'])) {
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $path = trim($path, '/');
            $depth = empty($path) ? 0 : substr_count($path, '/') + 1;
            $basePath = $depth > 0 ? str_repeat('../', $depth) : '.';
            $basePath = rtrim($basePath, '/');
        } else {
            $basePath = '.';
        }
        $sitePath = '';  // No prefix for local (URLs are like /about/)
    } else {
        // Production - use absolute paths
        // IMPORTANT: Change these to match your actual deployment path on the server
        $deployPath = '/rmcc/dispatch_centers/r2drc';
        $basePath = $deployPath;   // For assets: /rmcc/.../assets/css/style.css
        $sitePath = $deployPath;   // For nav: /rmcc/.../about/
    }

    return [
        'base_path' => $basePath,
        'site_path' => $sitePath,
        'site_base_url' => 'https://gacc.nifc.gov',
        'name' => 'Durango Interagency Dispatch Center',
        'id' => 'CODRC',
        'phone_24_hour' => '800-XXX-XXXX',
        'phone_office' => 'XXX-XXX-XXXX',
        'fax' => 'XXX-XXX-XXXX',
        'email' => 'example@firenet.gov',
        'address_line_1' => '123 Example Street',
        'address_line_2' => 'City, State 12345'
    ];
?>
