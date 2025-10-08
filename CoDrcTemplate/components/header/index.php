<!-- Header -->
<header id="header">
	<div class="header-container">
		<div class="header-title">
			<?php global $dispatch_center_name; echo "$dispatch_center_name"; ?>
		</div>
		<!-- Desktop Navigation -->
		<div class="desktop-nav">
			<?php component('nav', ['navItems' => $props['navItems']]); ?>
		</div>
		<!-- Mobile Hamburger -->
		<button class="hamburger-menu" id="menu-toggle" aria-label="Toggle menu">
			<img src="/assets/svg/menu.svg" alt="Menu" class="hamburger-icon" />
		</button>
	</div>
</header>

<!-- Mobile Sidebar Overlay -->
<div id="mobile-sidebar" class="mobile-sidebar">
	<div class="mobile-sidebar-content">
		<?php component('nav', ['navItems' => $props['navItems']]); ?>
	</div>
</div>