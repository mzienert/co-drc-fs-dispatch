<!-- Navigation Component -->
<?php use App\Helpers; ?>
<nav class="main-nav">
    <ul class="nav-list">
        <?php foreach ($props['navItems'] as $item): ?>
            <li class="nav-item <?= isset($item['children']) ? 'has-dropdown' : '' ?>">
                <a href="<?= Helpers::sanitize($item['url']) ?>" class="nav-link"><?= Helpers::sanitize($item['label']) ?></a>
                <?= isset($item['children']) ? Helpers::renderDropdown($item['children']) : '' ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
