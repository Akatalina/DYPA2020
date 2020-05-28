<?php @session_start()?>
<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<nav class="left">
					<a href="#menu"><span>Menu</span></a>
				</nav>
				<a href="index.php" class="logo">MyDoctor</a>
				<nav class="right">
					<?php 	if(isset($_SESSION['user']) && $_SESSION['user']!='?'){
							print "<a href=\"logout.php\" class=\"button alt\">Logout</a>";
						}
						else if(!isset($_SESSION['user']) || $_SESSION['user']=='?')
							print "<a href=\"login.php\" class=\"button alt\">Login</a>";
				?>
				</nav>
			</header>

		<!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<?php
					if(isset($_SESSION['user']) && $_SESSION['user']!='?'){
						print <<<END
						<li><a href="profile.php">Profile</a></li>
						<li><a href="allergies.php">My Allergies</a></li>
						<li><a href="medhistory.php">My Medical History</a></li>
						<li><a href="symptoms.php" class="current_page_item">Symptoms</a></li>
END;
					}
					?>
					<li><a href="about.php">About</a></li>
				</ul>
				<ul class="actions vertical">
					<?php 	if(isset($_SESSION['user']) && $_SESSION['user']!='?'){
							print "<li><a href=\"logout.php\" class =\"button fit\">Logout</a></li>";
						}
						else if(!isset($_SESSION['user']) || $_SESSION['user']=='?')
							print "<li><a href=\"login.php\" class=\"button fit\">Login</a></li>";
						
				?>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Symptoms Page</h1>
						<p>Find your medicine</p>
					</header>
					<form method="POST" action="findMedicine.php"	>
						<div class="row">
							<div class="6u 12u$(small)">
								<ul class="alt">
									<p>&nbsp;
									<select name="symptom1" id="symptom1">
									<option> -- None -- </option>		
									<option value="Constipation">Constipation</option>
									<option value="Diarrhea">Diarrhea</option>
									<option value="Fever">Fever</option>
									<option value="Headache">Headache</option>
									<option value="Muscle pain">Muscle pain</option>
									<option value="Runny nose">Runny nose</option>
									<option value="Sore throat">Sore throat</option>
									<option value="Stomach ache">Stomach ache</option>
									<option value="Toothache">Toothache</option>
									</select></p>
									<p>&nbsp;
									<select name="symptom3" id="symptom3">
									<option> -- None -- </option>						
									<option value="Constipation">Constipation</option>
									<option value="Diarrhea">Diarrhea</option>
									<option value="Fever">Fever</option>
									<option value="Headache">Headache</option>
									<option value="Muscle pain">Muscle pain</option>
									<option value="Runny nose">Runny nose</option>
									<option value="Sore throat">Sore throat</option>
									<option value="Stomach ache">Stomach ache</option>
									<option value="Toothache">Toothache</option>
									</select></p>
									<p>&nbsp;
									<select name="symptom5" id="symptom5">
									<option> -- None -- </option>						
									<option value="Constipation">Constipation</option>
									<option value="Diarrhea">Diarrhea</option>
									<option value="Fever">Fever</option>
									<option value="Headache">Headache</option>
									<option value="Muscle pain">Muscle pain</option>
									<option value="Runny nose">Runny nose</option>
									<option value="Sore throat">Sore throat</option>
									<option value="Stomach ache">Stomach ache</option>
									<option value="Toothache">Toothache</option>
									</select></p>
								</ul>
							</div>
							<div class="6u$ 12u$(small)">
								<ul class="icons">
									<p>&nbsp;
									<select name="symptom2" id="symptom2">
									<option> -- None -- </option>						
									<option value="Constipation">Constipation</option>
									<option value="Diarrhea">Diarrhea</option>
									<option value="Fever">Fever</option>
									<option value="Headache">Headache</option>
									<option value="Muscle pain">Muscle pain</option>
									<option value="Runny nose">Runny nose</option>
									<option value="Sore throat">Sore throat</option>
									<option value="Stomach ache">Stomach ache</option>
									<option value="Toothache">Toothache</option>
									</select></p>
									<p>&nbsp;
									<select name="symptom4" id="symptom4">
									<option> -- None -- </option>						
									<option value="Constipation">Constipation</option>
									<option value="Diarrhea">Diarrhea</option>
									<option value="Fever">Fever</option>
									<option value="Headache">Headache</option>
									<option value="Muscle pain">Muscle pain</option>
									<option value="Runny nose">Runny nose</option>
									<option value="Sore throat">Sore throat</option>
									<option value="Stomach ache">Stomach ache</option>
									<option value="Toothache">Toothache</option>
									</select></p>
									<p id="thisbutton">&nbsp;<br/>
									<input type="submit" class="button" onclick="hide()" value="Show results"/></p>						
								</ul>
							</div>
						</div>
					</form>
					<header class="align-center">
						<?php 
						if(empty($_SESSION['proteinomenaFarmaka'])){
							$_SESSION['proteinomenaFarmaka']=null;
						}
						else if($_SESSION['proteinomenaFarmaka']!=null){
							print "<h2>Results</h1>";
							print "<p id='results'>";
							print "<ol>";
							//$i=1;
							foreach($_SESSION['proteinomenaFarmaka'] as $x){
								print "<li>".$x."</li>";
								//print "<li>".$i.") ".$x."</li>";
								//$i++;
							}
							print "</ol>";
							print "</p> <!-- jquery function -> document.getElementById('results').textContent = 'apotelesmata'; || var x = 'kati'; -> document.getElementById('results').textContent = x; -->";
						}
						?>
					</header>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h2>Get In Touch</h2>
					<ul class="actions">
						<li><span class="icon fa-phone"></span> <a href="tel:+302310013621">(+30) 2310 013 621</a></li>
						<li><span class="icon fa-envelope"></span> <a href="mailto:admin@dypa.com">admin@dypa.com</a></li>
						<li><span class="icon fa-map-marker"></span> P.O BOX 141, GR T.K. 57400, Thessaloniki</li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. Design <a href="https://templated.co">TEMPLATED</a>. Images <a href="https://unsplash.com">Unsplash</a>.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>				
			function hide() {
				var x = document.getElementById("thisbutton");
			
			}
		</script>

	</body>
</html>