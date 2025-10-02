<!-- Navigation Component -->
<?php
$navItems = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'About', 'url' => '/about/'],
    ['label' => 'Contact', 'url' => '/contact/']
];
?>
<nav class="main-nav">
    <ul class="nav-list">
        <?php foreach ($navItems as $item): ?>
            <li class="nav-item"><a href="<?= htmlspecialchars($item['url']) ?>" class="nav-link"><?= htmlspecialchars($item['label']) ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
