<?php @session_start()?>
<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>About</title>
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
						else if(!isset($_SESSION['user']) || $_SESSION['user']=='?'){
							print "<a href=\"login.php\" class=\"button alt\">Login</a>";
							print "<a href=\"signup.php\" class=\"button alt\">Sign Up</a>";
						}
				?>
				</nav>
			</header>

		<!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<?php if(isset($_SESSION['user']) && $_SESSION['user']!='?'){ 
						print "<li><a href=\"profile.php\">Profile</a></li>";
						print "<li><a href=\"symptoms.php\">Symptoms</a></li>";
					}?>
					<li><a href="about.php" class="current_page_item">About</a></li>
				</ul>
				<ul class="actions vertical">
					<?php 	if(isset($_SESSION['user']) && $_SESSION['user']!='?'){
							print "<li><a href=\"logout.php\" class =\"button fit\">Logout</a></li>";
						}
						else if(!isset($_SESSION['user']) || $_SESSION['user']=='?'){
							print "<li><a href=\"login.php\" class=\"button fit\">Login</a></li>";
							print "<li><a href=\"signup.php\" class=\"button fit\">Sign Up</a></li>";
						}
						
				?>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>About MyDoctor</h1>
						<p>A university project</p>
					</header>

					<!-- Content -->
						<h2 id="content">Who made MyDoctor</h2>
						<p>Hello! We are Alexandros, Elena and Pasxalis, three students in the International Hellenic University in the Department of Information and Electronic Engineering!</p>
						<p>The web-page and app were both made as a project for the DYPA class of 2020.</p>
						<h2 id="content">Warning!!</h2>
						<p>This project was made strictly for an educational purpose ONLY and not for public use. The contents of it might not be accurate and should not be trusted!
						We do not take any responsibility for anyone that might use this project. IF you decide to test it out, you are accoubtable for your own actions.</p>
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

	</body>
</html>