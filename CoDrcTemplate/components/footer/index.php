<!-- Footer Component -->
<footer id="footer">
	<div class="footer-container">
		<div class="row gtr-50">
			<div class="col-4 col-12-medium footer-left">
				<div class="row gtr-50">
					<div class="col-6">
						<img src="/assets/images/logo.png" alt="Logo" class="footer-logo" />
					</div>
					<div class="col-6">
						<div class="footer-contact">
							<p class="footer-contact-item"><strong><?php global $dispatch_center_id; echo htmlspecialchars($dispatch_center_id); ?></strong></p>
							<p class="footer-contact-item">24-Hour: <a href="tel:<?php global $dispatch_center_24_hour_phone; echo htmlspecialchars($dispatch_center_24_hour_phone); ?>"><?php echo htmlspecialchars($dispatch_center_24_hour_phone); ?></a></p>
							<p class="footer-contact-item">Office: <a href="tel:<?php global $dispatch_center_office_phone; echo htmlspecialchars($dispatch_center_office_phone); ?>"><?php echo htmlspecialchars($dispatch_center_office_phone); ?></a></p>
							<p class="footer-contact-item">Email: <a href="mailto:<?php global $dispatch_center_email; echo htmlspecialchars($dispatch_center_email); ?>"><?php echo htmlspecialchars($dispatch_center_email); ?></a></p>
							<p class="footer-contact-item"><?php global $dispatch_center_address_line_1; echo htmlspecialchars($dispatch_center_address_line_1); ?></p>
							<p class="footer-contact-item"><?php global $dispatch_center_address_line_2; echo htmlspecialchars($dispatch_center_address_line_2); ?></p>
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
								<a href="<?= htmlspecialchars($item['url']) ?>"><?= htmlspecialchars($item['label']) ?></a>
							</h3>
							<?= isset($item['children']) ? Helpers::renderFooterNavList($item['children']) : '' ?>
						</div>
					<?php endforeach; ?>
				</nav>
			</div>
		</div>
	</div>
</footer>
