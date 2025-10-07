<!-- Navigation Component -->
<?php
    $navItems = [
        ['label' => 'Home', 'url' => '/'],
        [
            'label' => 'About',
            'url' => '/about/',
            'children' => [
                ['label' => 'Our Team', 'url' => '/about/team/'],
                ['label' => 'History', 'url' => '/about/history/']
            ]
        ],
        ['label' => 'Testing', 'url' => '/testing/',],
        ['label' => 'Contact', 'url' => '/contact/']
    ];
?>
<nav class="main-nav">
    <ul class="nav-list">
        <?php foreach ($navItems as $item): ?>
            <li class="nav-item <?= isset($item['children']) ? 'has-dropdown' : '' ?>">
                <a href="<?= htmlspecialchars($item['url']) ?>" class="nav-link"><?= htmlspecialchars($item['label']) ?></a>
                <?= isset($item['children']) ? renderDropdown($item['children']) : '' ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
