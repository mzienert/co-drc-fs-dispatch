<?php
    return [
        ['label' => 'Home', 'url' => '/'],
        [
            'label' => 'About',
            'url' => '/about/',
            'children' => [
                ['label' => 'Our Team', 'url' => '/about/team/'],
                ['label' => 'History', 'url' => '/about/history/'],
                ['label' => 'Testing2', 'url' => '/about/testing2/']
            ]
        ],
        ['label' => 'Testing', 'url' => '/testing/',],
        ['label' => 'Contact', 'url' => '/contact/']
    ];
?>