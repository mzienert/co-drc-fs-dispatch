<?php
    // Detect environment based on host
    $isLocal = isset($_SERVER['HTTP_HOST']) &&
               (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ||
                strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);

    // Calculate base path dynamically
    // This ensures assets load correctly from any subdirectory
    if (isset($_SERVER['REQUEST_URI'])) {
        // Parse the URI path and remove query strings
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = trim($path, '/');

        // Calculate depth: empty = root (0), 'about' = 1 level, 'about/team' = 2 levels
        $depth = empty($path) ? 0 : substr_count($path, '/') + 1;

        // Build relative path back to root
        $basePath = $depth > 0 ? str_repeat('../', $depth) : '.';
        $basePath = rtrim($basePath, '/');
    } else {
        // Fallback for CLI or when REQUEST_URI not available
        $basePath = '.';
    }

    return [
        'base_path' => $basePath,
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
