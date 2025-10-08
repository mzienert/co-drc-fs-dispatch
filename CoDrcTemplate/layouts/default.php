<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo htmlspecialchars($page_title); ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php if ($meta_description): ?>
			<meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>" />
		<?php endif; ?>
		<?php if (isset($canonical_url)): ?>
			<link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>" />
		<?php endif; ?>

		<!-- Open Graph / Social Media -->
		<meta property="og:title" content="<?php echo htmlspecialchars($og_title); ?>" />
		<?php if ($og_description): ?>
			<meta property="og:description" content="<?php echo htmlspecialchars($og_description); ?>" />
		<?php endif; ?>
		<?php if ($og_url): ?>
			<meta property="og:url" content="<?php echo htmlspecialchars($og_url); ?>" />
		<?php endif; ?>
		<meta property="og:type" content="<?php echo htmlspecialchars($og_type); ?>" />
		<meta property="og:site_name" content="<?php echo htmlspecialchars($og_site_name); ?>" />
		<?php if (isset($og_image)): ?>
			<meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>" />
		<?php endif; ?>

		<!-- Structured Data (Schema.org) -->
		<script type="application/ld+json">
		{
		"@context": "https://schema.org",
		"@type": "GovernmentOrganization",
		"name": "<?= htmlspecialchars($dispatch_center_name, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"url": "<?= htmlspecialchars($site_base_url ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"telephone": "<?= htmlspecialchars($dispatch_center_24_hour_phone, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"email": "<?= htmlspecialchars($dispatch_center_email, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "<?= htmlspecialchars($dispatch_center_address_line_1, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
			"addressLocality": "<?= htmlspecialchars($dispatch_center_address_line_2, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>"
		}
		}
		</script>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://gacc.nifc.gov/rmcc/assets/css/main.css" />
		<link rel="stylesheet" href="/assets/css/custom.css" />
	</head>
	<body class="is-preload <?php echo htmlspecialchars($body_class); ?>">
		<?php
		require_once __DIR__ . '/../helpers/index.php';
		$navItems = require_once __DIR__ . '/../data/nav.php';

		// Prepare footer contact data
		global $dispatch_center_id, $dispatch_center_24_hour_phone, $dispatch_center_office_phone, $dispatch_center_email, $dispatch_center_address_line_1, $dispatch_center_address_line_2;
		$footerContact = [
			'centerId' => htmlspecialchars($dispatch_center_id),
			'phone24' => htmlspecialchars($dispatch_center_24_hour_phone),
			'phoneOffice' => htmlspecialchars($dispatch_center_office_phone),
			'email' => htmlspecialchars($dispatch_center_email),
			'address1' => htmlspecialchars($dispatch_center_address_line_1),
			'address2' => htmlspecialchars($dispatch_center_address_line_2)
		];
		?>
		<div id="wrapper">
			<div id="main">
				<?php Helpers::component('header', ['navItems' => $navItems]) ?>
				<div class="inner">
					<section class="content-area">
						<?php echo $content; ?>
					</section>
				</div>
			</div>
		</div>

		<?php Helpers::component('footer', ['navItems' => $navItems, 'contact' => $footerContact]); ?>

		<?php include(__DIR__ . '/../scripts.php'); ?>

		<script>
			// Mobile sidebar toggle
			const sidebar = document.getElementById('mobile-sidebar');
			const menuToggle = document.getElementById('menu-toggle');

			menuToggle.addEventListener('click', function(e) {
				e.stopPropagation();
				sidebar.classList.toggle('active');
			});

			// Close sidebar when clicking outside
			document.addEventListener('click', function(e) {
				if (sidebar.classList.contains('active') && !sidebar.contains(e.target) && e.target !== menuToggle) {
					sidebar.classList.remove('active');
				}
			});

			// Prevent clicks inside sidebar from closing it
			sidebar.addEventListener('click', function(e) {
				e.stopPropagation();
			});

			// Preparedness level expand/collapse
			document.querySelectorAll('[data-expandable]').forEach(item => {
				const header = item.querySelector('.pl-header');
				header.addEventListener('click', function() {
					// Close other items
					document.querySelectorAll('[data-expandable].expanded').forEach(other => {
						if (other !== item) {
							other.classList.remove('expanded');
						}
					});
					// Toggle current item
					item.classList.toggle('expanded');
				});
			});
		</script>
	</body>
</html>
