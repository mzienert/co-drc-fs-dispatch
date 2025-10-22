<?php
    // Detect environment based on host
    $isLocal = isset($_SERVER['HTTP_HOST']) &&
               (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ||
                strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);

    // Set base path based on environment
    // Use relative path to avoid WebDAV authentication issues with static assets
    $basePath = '.';

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
