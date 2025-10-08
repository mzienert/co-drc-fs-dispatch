<!-- Footer Component -->
<footer id="footer">
	<div class="footer-container">
		<div class="row gtr-50">
			<div class="col-4 col-12-medium footer-left">
				<div class="footer-logo"></div>
				<p class="footer-copyright">&copy; <?php echo date('Y'); ?>. All rights reserved.</p>
			</div>
			<div class="col-8 col-12-medium footer-right">
				<nav class="footer-nav">
					<?php foreach ($props['navItems'] as $item): ?>
						<div class="footer-nav-column">
							<h3 class="footer-nav-title">
								<a href="<?= htmlspecialchars($item['url']) ?>"><?= htmlspecialchars($item['label']) ?></a>
							</h3>
							<?php if (isset($item['children'])): ?>
								<ul class="footer-nav-list">
									<?php foreach ($item['children'] as $child): ?>
										<li class="footer-nav-item">
											<a href="<?= htmlspecialchars($child['url']) ?>"><?= htmlspecialchars($child['label']) ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</nav>
			</div>
		</div>
	</div>
</footer>
