<!-- Navigation Component -->
<nav class="main-nav">
    <ul class="nav-list">
        <?php foreach ($props['navItems'] as $item): ?>
            <li class="nav-item <?= isset($item['children']) ? 'has-dropdown' : '' ?>">
                <a href="<?= htmlspecialchars($item['url']) ?>" class="nav-link"><?= htmlspecialchars($item['label']) ?></a>
                <?= isset($item['children']) ? renderDropdown($item['children']) : '' ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
