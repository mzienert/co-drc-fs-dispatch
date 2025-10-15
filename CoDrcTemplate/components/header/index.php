<!-- Header -->
<header id="header">
	<div class="header-container">
		<div class="header-title">
			<?= htmlspecialchars($props['dispatchInfo']['name']) ?>
		</div>
		<!-- Desktop Navigation -->
		<div class="desktop-nav">
			<?php \App\Helpers::component('nav', ['navItems' => $props['navItems']]); ?>
		</div>
		<!-- Mobile Hamburger -->
		<button class="hamburger-menu" id="menu-toggle" aria-label="Toggle menu">
			<img src="<?= htmlspecialchars($props['dispatchInfo']['base_path'] ?? '') ?>/assets/svg/menu.svg" alt="Menu" class="hamburger-icon" />
		</button>
	</div>
</header>

<!-- Mobile Sidebar Overlay -->
<div id="mobile-sidebar" class="mobile-sidebar">
	<div class="mobile-sidebar-content">
		<?php \App\Helpers::component('nav', ['navItems' => $props['navItems']]); ?>
	</div>
</div>