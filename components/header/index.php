<!-- Header -->
<?php use App\Helpers; ?>
<header id="header">
	<div class="header-container">
		<div class="header-title">
			<?= Helpers::sanitize(Helpers::prop($props, 'dispatchInfo.name')) ?>
		</div>
		<!-- Desktop Navigation -->
		<div class="desktop-nav">
			<?php Helpers::component('nav', ['navItems' => $props['navItems']]); ?>
			<?php Helpers::component('accessibility-menu', ['dispatchInfo' => $props['dispatchInfo']]); ?>
		</div>
		<!-- Mobile Hamburger -->
		<button class="hamburger-menu" id="menu-toggle" aria-label="Toggle menu">
			<img src="<?= Helpers::sanitize(Helpers::prop($props, 'dispatchInfo.base_path')) ?>/assets/svg/menu.svg" alt="Menu" class="hamburger-icon" />
		</button>
	</div>
</header>

<!-- Mobile Sidebar Overlay -->
<div id="mobile-sidebar" class="mobile-sidebar">
	<div class="mobile-sidebar-content">
		<?php Helpers::component('nav', ['navItems' => $props['navItems']]); ?>
		<?php Helpers::component('accessibility-menu', ['dispatchInfo' => $props['dispatchInfo']]); ?>
	</div>
</div>