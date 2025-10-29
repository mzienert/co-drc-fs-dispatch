<!-- Footer Component -->
<?php use App\Helpers; ?>
<footer id="footer">
	<div class="footer-container">
		<div class="row gtr-50">
			<div class="col-4 col-12-medium footer-left">
				<div class="row gtr-50">
					<div class="col-6">
						<img src="<?= Helpers::sanitize(Helpers::prop($props, 'dispatchInfo.base_path')) ?>/assets/images/logo_small.png" alt="Logo" class="footer-logo" />
					</div>
					<div class="col-6">
						<div class="footer-contact">
							<p class="footer-contact-item">Center ID: <strong><?= Helpers::sanitize(Helpers::prop($props, 'contact.centerId')) ?></strong></p>
							<p class="footer-contact-item">24-Hour: <strong><a href="tel:<?= Helpers::sanitize(Helpers::prop($props, 'contact.phone24')) ?>"><?= Helpers::sanitize(Helpers::prop($props, 'contact.phone24')) ?></a></strong></p>
							<p class="footer-contact-item">Office: <strong><a href="tel:<?= Helpers::sanitize(Helpers::prop($props, 'contact.phoneOffice')) ?>"><?= Helpers::sanitize(Helpers::prop($props, 'contact.phoneOffice')) ?></a></strong></p>
							<p class="footer-contact-item">Email: <strong><a href="mailto:<?= Helpers::sanitize(Helpers::prop($props, 'contact.email')) ?>"><?= Helpers::sanitize(Helpers::prop($props, 'contact.email')) ?></a></strong></p>
							<p class="footer-contact-item"><?= Helpers::sanitize(Helpers::prop($props, 'contact.address1')) ?></p>
							<p class="footer-contact-item"><?= Helpers::sanitize(Helpers::prop($props, 'contact.address2')) ?></p>
						</div>
					</div>
				</div>
				<!-- <p class="footer-copyright">&copy; <?php echo date('Y'); ?>. All rights reserved.</p> -->
			</div>
			<div class="col-8 col-12-medium footer-right">
				<nav class="footer-nav">
					<?php foreach ($props['navItems'] as $item): ?>
						<div class="footer-nav-column">
							<h3 class="footer-nav-title">
								<a href="<?= Helpers::sanitize($item['url']) ?>"><?= Helpers::sanitize($item['label']) ?></a>
							</h3>
							<?= isset($item['children']) ? Helpers::renderFooterNavList($item['children']) : '' ?>
						</div>
					<?php endforeach; ?>
				</nav>
			</div>
		</div>
	</div>
</footer>
