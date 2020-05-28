<?php @session_start();?>
<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

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
				<li class="current_page_item"><a  href="index.php">Home</a></li>
				<?php if(isset($_Session['user']) && $_SESSION['user']!='?') print"<li><a href=\"profile.html\">Profile</a></li>";?>
				<li><a href="about.php">About</a></li>
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

		<!-- One -->
		<section id="one" class="wrapper">
			<div class="inner flex flex-3">
				<form action="doLogin.php" method="post" >					
					<ul class="alt">
						<p>Username:
						<input type="text" class="text" name="username" placeholder="Enter your username"/></p>
						<p>Password:
						<input type="password" class="password" name="passwd" placeholder="Enter your password"/></p>							
					</ul>
					<input type="submit" class="button" value="Login"/>
				</form>
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