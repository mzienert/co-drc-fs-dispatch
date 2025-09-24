<?php
	include_once("dispatch_config.php");
    $page_title = "Enter Page Title"
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $page_title; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/rmcc/assets/css/main.css" />
		<style>
			.image img {
				aspect-ratio: 1056 / 816;
			}
		</style>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
			<div id="main">
				<div class="inner">
                    <?php include("header.php"); ?>
							<!-- Content -->
							<section>
								<header class="main">
									<h1><?php echo $page_title; ?></h1>
								</header>
                            	<div class="padded-boxes ">
                                    <!-- Begin page subsections -->
				    				<section  style="width:100%;">
                                    	<h3 class="heading" style="text-align: center;">Enter Subsection Title</h3>
										<div class="box alt" style="margin: 10px;">
											<!-- Begin subection rows -->
											<div class="row gtr-50 gtr-uniform">
												<!-- Begin Tile list -->
												<div class="col-3">
													<span class="image fit" style="text-align: center; font-weight:bold; color:black;">
														<a href="Enter Link URL" target="_blank"><img src="images/TileTemplate.png" alt="Enter Image Description" /></a>
													</span>
												</div>
												<!-- End Tile list -->
											</div>
											<!-- End subection rows -->
										</div>
                                    </section>
									<!-- End page subsections -->
                                </div>
							</section>
				</div>
			</div>
            <?php include('sidebar.php'); ?>
		</div>
		<?php include('scripts.php'); ?>
    </body>
</html>