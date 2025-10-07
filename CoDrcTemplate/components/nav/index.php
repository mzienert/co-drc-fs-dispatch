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
        ['label' => 'Testing', 'url' => '/testing/'],
        ['label' => 'Contact', 'url' => '/contact/']
    ];
?>
<nav class="main-nav">
    <ul class="nav-list">
        <?php foreach ($navItems as $item): ?>
            <li class="nav-item <?= isset($item['children']) ? 'has-dropdown' : '' ?>">
                <a href="<?= htmlspecialchars($item['url']) ?>" class="nav-link"><?= htmlspecialchars($item['label']) ?></a>
                <?php if (isset($item['children'])): ?>
                    <ul class="nav-dropdown">
                        <?php foreach ($item['children'] as $child): ?>
                            <li class="nav-dropdown-item">
                                <a href="<?= htmlspecialchars($child['url']) ?>" class="nav-dropdown-link"><?= htmlspecialchars($child['label']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
