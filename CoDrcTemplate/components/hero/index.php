<!-- Hero Component -->
<?php
	$preparednessLevels = getPreparednessLevels();
?>
<section id="hero">
	<div class="hero-container">
		<div class="row">
			<div class="col-7 hero-left">
				<!-- Left column content -->
			</div>
			<div class="col-5 hero-right">
				<div class="preparedness-levels">
					<h2>Preparedness Levels</h2>

					<!-- National -->
					<div class="pl-item" data-expandable>
						<div class="pl-header">
							<div class="pl-header-content">
								<h3 class="pl-label">National</h3>
								<p class="pl-value">PL <?= htmlspecialchars($preparednessLevels['national']['level']) ?></p>
							</div>
							<img src="/assets/svg/plus.svg" alt="Expand" class="pl-expand-icon" />
						</div>
						<div class="pl-details">
							<p class="pl-description"><?= htmlspecialchars($preparednessLevels['national']['description']) ?></p>
							<?php if (!empty($preparednessLevels['national']['source'])): ?>
								<a href="<?= htmlspecialchars($preparednessLevels['national']['source']) ?>" target="_blank" class="pl-source">Learn More →</a>
							<?php endif; ?>
						</div>
					</div>

					<!-- RMA -->
					<div class="pl-item" data-expandable>
						<div class="pl-header">
							<div class="pl-header-content">
								<h3 class="pl-label">RMA</h3>
								<p class="pl-value">PL <?= htmlspecialchars($preparednessLevels['rma']['level']) ?></p>
							</div>
							<img src="/assets/svg/plus.svg" alt="Expand" class="pl-expand-icon" />
						</div>
						<div class="pl-details">
							<p class="pl-description"><?= htmlspecialchars($preparednessLevels['rma']['description']) ?></p>
							<?php if (!empty($preparednessLevels['rma']['source'])): ?>
								<a href="<?= htmlspecialchars($preparednessLevels['rma']['source']) ?>" target="_blank" class="pl-source">Learn More →</a>
							<?php endif; ?>
						</div>
					</div>

					<!-- Local -->
					<div class="pl-item" data-expandable>
						<div class="pl-header">
							<div class="pl-header-content">
								<h3 class="pl-label">Local</h3>
								<p class="pl-value">PL <?= htmlspecialchars($preparednessLevels['local']['level']) ?></p>
							</div>
							<img src="/assets/svg/plus.svg" alt="Expand" class="pl-expand-icon" />
						</div>
						<div class="pl-details">
							<p class="pl-description"><?= htmlspecialchars($preparednessLevels['local']['description']) ?></p>
							<?php if (!empty($preparednessLevels['local']['source'])): ?>
								<a href="<?= htmlspecialchars($preparednessLevels['local']['source']) ?>" target="_blank" class="pl-source">Learn More →</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
