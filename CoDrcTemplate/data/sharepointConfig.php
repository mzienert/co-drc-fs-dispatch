<?php
/**
 * SharePoint Integration Configuration
 *
 * This file contains configuration for SharePoint lists used on the site.
 * See /docs/SHAREPOINT-INTEGRATION.md for setup instructions.
 */

return [
    // Test list configuration (remove or comment out in production)
    'test-list' => [
        'shareLink' => 'https://firenet365-my.sharepoint.com/:li:/g/personal/matthew_zienert_firenet_gov/EwJJ7K0ZNa5EigUA0RtwFewBss0J7j0g_Pu5buHB44Jj7Q?e=QIVqr2',
        'listGuid' => '1be868b8-9006-4983-8e04-f5f736a13627',
        'siteUrl' => 'https://firenet365-my.sharepoint.com/personal/matthew_zienert_firenet_gov',
        'cacheDuration' => 300, // 5 minutes
        'debug' => false
    ],

    // Example: Fire danger levels list
    // 'fire-danger' => [
    //     'shareLink' => 'https://firenet365-my.sharepoint.com/:li:/g/...',
    //     'listGuid' => 'your-list-guid-here',
    //     'siteUrl' => 'https://firenet365-my.sharepoint.com/personal/username_firenet_gov',
    //     'cacheDuration' => 300, // 5 minutes
    //     'debug' => false
    // ],

    // Example: Status updates / headlines
    // 'status-updates' => [
    //     'shareLink' => 'https://firenet365-my.sharepoint.com/:li:/g/...',
    //     'listGuid' => 'your-list-guid-here',
    //     'siteUrl' => 'https://firenet365-my.sharepoint.com/personal/username_firenet_gov',
    //     'cacheDuration' => 300, // 5 minutes
    //     'debug' => false
    // ],
];
?>
