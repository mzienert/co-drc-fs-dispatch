<?php
    // Load dispatch info to get site_path
    $dispatchInfo = require __DIR__ . '/dispatchCenterInfo.php';
    $sitePath = $dispatchInfo['site_path'];

    return [
        ['label' => 'Home', 'url' => $sitePath . '/'],
        [
            'label' => 'About',
            'url' => $sitePath . '/about/',
            /* 'children' => [
                ['label' => 'Our Team', 'url' => $sitePath . '/about/team/'],
                ['label' => 'History', 'url' => $sitePath . '/about/history/']
            ] */
        ],
        ['label' => 'Smoke Report', 'url' => $sitePath . '/testing/',],
        ['label' => 'Contact', 'url' => $sitePath . '/contact/']
    ];
?>