<?php
require_once 'vendor/autoload.php';

echo '=== Testing Cache in Project Directory ===' . PHP_EOL . PHP_EOL;

$config = require 'data/sharepointConfig.php';
$listConfig = $config['website-data'];
$listConfig['debug'] = true;

echo 'Fetching data (should create cache file)...' . PHP_EOL;
$client = new \App\SharePointListClient($listConfig);
$items = $client->getItems();
echo 'Items fetched: ' . count($items) . PHP_EOL . PHP_EOL;

echo 'Cache file location:' . PHP_EOL;
$cacheDir = __DIR__ . '/cache';
$files = glob($cacheDir . '/*.json');
if (count($files) > 0) {
    foreach ($files as $file) {
        echo '  ' . basename($file) . ' (' . round(filesize($file)/1024, 2) . ' KB)' . PHP_EOL;
        echo '  Full path: ' . $file . PHP_EOL;
    }
} else {
    echo '  No cache files found!' . PHP_EOL;
}
