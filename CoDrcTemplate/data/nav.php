<?php
    return [
        ['label' => 'Home', 'url' => '/'],
        [
            'label' => 'About',
            'url' => '/about/',
            'children' => [
                ['label' => 'Our Team', 'url' => '/about/team/'],
                ['label' => 'History', 'url' => '/about/history/'],
                ['label' => 'Smoke Report', 'url' => '/about/testing2/'],
                ['label' => 'Testing2', 'url' => '/about/testing3/']
            ]
        ],
        ['label' => 'Smoke Report', 'url' => '/testing/',],
        ['label' => 'Contact', 'url' => '/contact/']
    ];
?>