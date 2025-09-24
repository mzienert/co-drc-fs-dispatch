<?php
	include_once("dispatch_config.php");
	if (file_exists("../../pl.txt")) {
		$pl_content = file_get_contents("../../pl.txt");
		preg_match('/Preparedness Level[\n\s]+National\s+(PL \d)[\n\s]+RMA\s+(PL \d)/', $pl_content, $preparedness_levels);
	} else {
		$preparedness_levels = array("PL N/A", "PL N/A", "PL N/A");
	}
	if (file_exists("pl.txt")) {
		$pl_content = file_get_contents("pl.txt");
		preg_match('/Preparedness Level[\n\s]+Local\s+(PL \d)/', $pl_content, $preparedness_local);
	} else {
		$preparedness_local = array("PL N/A", "PL N/A");
	}
	array_push($preparedness_levels, $preparedness_local[1]);
?>
<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">
					<!-- Menu -->
					<nav id="menu">
                    	<table>
                            <th colspan="2"><center><font size="+1"><strong>Preparedness Level</strong></center></font></th>
							<tr>
								<td><center><strong><?php echo "$dispatch_center_id"; ?></strong></center></td>
								<td><center><strong><?php echo $preparedness_levels[3]; ?></strong></center></td>
							</tr>
							<tr>
								<td><center><strong>RMA</strong></center></td>
								<td><center><strong><?php echo $preparedness_levels[2]; ?></strong></center></td>
							</tr>
							<tr>
								<td><center><strong>National</strong></center></td>
								<td><center><strong><?php echo $preparedness_levels[1]; ?></strong></center></td>
							</tr>
                        </table>
						<header class="major">
							<h2>Menu</h2>
						</header>
                        <ul><!-- Sidebar section starts here -->
							<li><a href="index.php"><?php echo "$dispatch_center_id&nbsp;"; ?>Homepage</a></li>
							<li><a href="/rmcc/index.php"> RMACC Homepage</a></li>
							<li><a href="https://www.nifc.gov/nicc">NICC</a></li>
							<!-- Additional Sidebar Content Goes Here -->
						</ul> <!-- Sidebar section ends here -->
					</nav>
					<!-- Section -->
					<section>
						<header class="major">
							<h2>Get in touch</h2>
						</header>
						<ul class="contact">
							<li class="icon solid fa-envelope"><?php echo $dispatch_center_email; ?></li>
							<li class="icon solid fa-phone">
								<b>24-Hour:</b><?php echo $dispatch_center_24_hour_phone; ?><br />
								<b>Office:</b><?php echo $dispatch_center_office_phone; ?><br />
								<b>Fax:</b><?php echo $dispatch_center_fax_number; ?><br />
							</li>
							<li class="icon solid fa-home">
								<?php echo $dispatch_center_address_line_1; ?><br />
								<?php echo $dispatch_center_address_line_2; ?>
							</li>
						</ul>
					</section>

					<!-- Footer -->
					<footer id="footer">
						<section>
							<header class="major">
								<h2><a href="disclaimer.php">Disclaimer</a></h2>
							</header>
						</section>
					</footer>

				</div>
			</div>