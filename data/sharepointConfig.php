<?php
/**
 * SharePoint Integration Configuration
 *
 * This file contains configuration for SharePoint lists used on the site.
 * See /docs/SHAREPOINT-INTEGRATION.md for setup instructions.
 */

if (!defined('SHAREPOINT_WEBSITE_DATA_LIST')) {
    define('SHAREPOINT_WEBSITE_DATA_LIST', 'website-data');
}

return [
    // Website data list configuration
    SHAREPOINT_WEBSITE_DATA_LIST => [
        'shareLink' => 'https://firenet365-my.sharepoint.com/:l:/g/personal/matthew_zienert_firenet_gov/FLho6BsGkINJjgT19zahNicBGZ-FPUanO0lr-tZU1NOceA?e=tOUQpa',
        'listGuid' => '1be868b8-9006-4983-8e04-f5f736a13627',
        'siteUrl' => 'https://firenet365-my.sharepoint.com/personal/matthew_zienert_firenet_gov',
        'cacheDuration' => 300,
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
