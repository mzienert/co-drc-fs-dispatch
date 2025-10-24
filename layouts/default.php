<!DOCTYPE HTML>
<?php use App\Helpers; ?>
<html>
	<head>
		<title><?= Helpers::sanitize($page_title) ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php if ($meta_description): ?>
			<meta name="description" content="<?= Helpers::sanitize($meta_description) ?>" />
		<?php endif; ?>
		<?php if (isset($canonical_url)): ?>
			<link rel="canonical" href="<?= Helpers::sanitize($canonical_url) ?>" />
		<?php endif; ?>

		<!-- Open Graph / Social Media -->
		<meta property="og:title" content="<?= Helpers::sanitize($og_title) ?>" />
		<?php if ($og_description): ?>
			<meta property="og:description" content="<?= Helpers::sanitize($og_description) ?>" />
		<?php endif; ?>
		<?php if ($og_url): ?>
			<meta property="og:url" content="<?= Helpers::sanitize($og_url) ?>" />
		<?php endif; ?>
		<meta property="og:type" content="<?= Helpers::sanitize($og_type) ?>" />
		<meta property="og:site_name" content="<?= Helpers::sanitize($og_site_name) ?>" />
		<?php if (isset($og_image)): ?>
			<meta property="og:image" content="<?= Helpers::sanitize($og_image) ?>" />
		<?php endif; ?>

		<!-- Structured Data (Schema.org) -->
		<script type="application/ld+json">
		{
		"@context": "https://schema.org",
		"@type": "GovernmentOrganization",
		"name": "<?= Helpers::sanitize($dispatch_center_name ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"url": "<?= Helpers::sanitize($site_base_url ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"telephone": "<?= Helpers::sanitize($dispatch_center_24_hour_phone ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"email": "<?= Helpers::sanitize($dispatch_center_email ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "<?= Helpers::sanitize($dispatch_center_address_line_1 ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>",
			"addressLocality": "<?= Helpers::sanitize($dispatch_center_address_line_2 ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>"
		}
		}
		</script>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.cdnfonts.com/css/open-dyslexic" rel="stylesheet">
		<link rel="stylesheet" href="https://gacc.nifc.gov/rmcc/assets/css/main.css" />
		<?php
		global $layoutData;
		$dispatchInfo = $layoutData['dispatchInfo'];
		$navItems = $layoutData['navItems'];
		$basePath = $dispatchInfo['base_path'] ?? '';
		?>
		<link rel="stylesheet" href="<?= Helpers::sanitize($basePath) ?>/assets/css/custom.css" />
	</head>
	<body class="is-preload <?= Helpers::sanitize($body_class) ?>">
		<?php

		// Prepare footer contact data
		$footerContact = [
			'centerId' => $dispatchInfo['id'],
			'phone24' => $dispatchInfo['phone_24_hour'],
			'phoneOffice' => $dispatchInfo['phone_office'],
			'email' => $dispatchInfo['email'],
			'address1' => $dispatchInfo['address_line_1'],
			'address2' => $dispatchInfo['address_line_2']
		];
		?>
		<div id="wrapper">
			<div id="main">
				<?php Helpers::component('header', ['navItems' => $navItems, 'dispatchInfo' => $dispatchInfo]) ?>
				<div class="inner">
					<section class="content-area">
						<?php echo $content; ?>
					</section>
				</div>
			</div>
		</div>

		<?php Helpers::component('footer', ['navItems' => $navItems, 'contact' => $footerContact, 'dispatchInfo' => $dispatchInfo]); ?>

		<?php Helpers::component('partner-logos', ['dispatchInfo' => $dispatchInfo]); ?>

		<?php include(__DIR__ . '/../scripts.php'); ?>
	</body>
</html>
