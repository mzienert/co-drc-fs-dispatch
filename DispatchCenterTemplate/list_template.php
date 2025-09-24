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
                                    <div class="padded-boxes">
                                        <!-- Begin page subsections -->
                                        <section>
                                            <h3 class="heading">Enter Subection heading</h3>
                                            <div class="padded">
                                                <ul> <!-- Begin link list -->
                                                    <li><a href="Enter URL to page">Enter Link Text for Page</a></li> 
                                                </ul> <!-- End link list -->             
                                            </div>
                                        </section>
                                        <!-- Begin page subsections -->
                                    </div>
                                </section>

						</div>
					</div>
                <?php include('sidebar.php'); ?>
			</div>
		    <?php include('scripts.php'); ?>
            <script>
                function toggleFullscreen() {
                    Array.from(document.getElementsByClassName('fullscreen-element')).forEach((element) => {
                        if (element.classList.contains('fullscreen')) {
                            element.classList.remove('fullscreen');
                            if (element.classList.contains('fullscreen-control')) {
                                element.innerHTML = "Fullscreen";
                            }
                        } else {
                            element.classList.add('fullscreen');
                            if (element.classList.contains('fullscreen-control')) {
                                element.innerHTML = "Close";
                            }
                            window.scrollTo(0,0);
                        }
                    })
                }
            </script>

        </div>
    </body>
</html>