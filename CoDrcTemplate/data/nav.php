<?php
    return [
        ['label' => 'Home', 'url' => '/'],
        [
            'label' => 'About',
            'url' => '/about/',
            'children' => [
                ['label' => 'Our Team', 'url' => '/about/team/'],
                ['label' => 'History', 'url' => '/about/history/']
            ]
        ],
        ['label' => 'Smoke Report', 'url' => '/testing/',],
        ['label' => 'Contact', 'url' => '/contact/']
    ];
?>