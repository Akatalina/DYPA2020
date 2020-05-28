<?php 
@session_start();
require_once("dbconnect.php");



if(isset($_REQUEST['save_medHistory'])) { //	ΑΝ ΠΑΤΗΘΕΙ ΤΟ ΚΟΥΜΠΙ "save_medHistory" ΤΟΤΕ ΜΠΑΙΝΕΙ ΣΤΟΝ ΒΡΟΓΧΟ.
		//print_r($_REQUEST);
		//print "Πρωτη θεση id toy allergies".$_REQUEST['idAllergiesHidden'];
		//$idFromAllergies=$_REQUEST['idAllergiesHidden']; //Αποθηκευει την τιμη του id που ειναι type=hidden στην φορμα
		$medh1=$_REQUEST['condition1']; //Περιεχει το text απο το textbox των αλλεργιων. Τα textbx περιεχουν κειμενο ή " "(κενος χαρακτηρας)
		$medh2=$_REQUEST['condition2'];
		$medh3=$_REQUEST['condition3'];
		$medh4=$_REQUEST['condition4'];
		$medh5=$_REQUEST['condition5'];
		
			$historyToUpdate="";
			for($i=1;$i<6;$i++){
				$medh='medh'.$i;  //Δημιουργει το string medh1-6
				$finalmedh = ${$medh};// Κανει το string μεταβλητη και αποθηκευει την τιμη πχ της medh1 στην finalmedh
					$historyToUpdate.=",".$finalmedh;
			}
			$finalHistoryToUpdate=ltrim($historyToUpdate,",");
			$sqlUpdate="UPDATE medhistory SET history='".$finalHistoryToUpdate."' WHERE user=".$_SESSION['userId'].";";
			//print $finalHistoryToUpdate;
			$resultUpdate=$con->query($sqlUpdate);
		

}

//======================================================
function addToArraySplitted($history){   			// Βαζει το ιστορικο του χρηστη σε πινακα.
	$historyArray = array();
	$token=strtok($history,",");
	while($token !== false){
		array_push($historyArray,$token);
		$token=strtok(",");
	}
	return $historyArray;
}
//===================================


$selectMedHistory="SELECT * FROM medhistory WHERE user=".$_SESSION['userId'];
$resultMedHistory=$con->query($selectMedHistory);
$historyString="" ;
$historyArray=array();
$historyID=""; //Μεταβλητη που περιεχει το id του medhistory. Θα ειναι hidden input στην φορμα.
$rowMedHistory=$resultMedHistory->fetch_assoc();
	//array_push($historyArray,$rowMedHistory['history']);
	//array_push($historyID,$rowMedHistory['id']);
	//$history=$rowMedHistory['history'];
	//$historyID=$rowMedHistory['id'];

if($rowMedHistory['history']==null){
	$historyString="";
}else{
	$historyString=$rowMedHistory['history'];
	//print "historyString: ".$historyString;
	$historyArray=addToArraySplitted($rowMedHistory['history']);
}
	
?>
<!DOCTYPE HTML>
<!--
    Intensify by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>My Medical History</title>
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
			if($_SESSION['user'] != null && $_SESSION['user'] != '?'){
				print <<<END
			<li><a href="profile.php">Profile</a></li>
            <li><a href="allergies.php">My Allergies</a></li>
            <li><a href="medhistory.php" class="current_page_item">My Medical History</a></li>
            <li><a href="symptoms.php">Symptoms</a></li>
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
                <h1>My Medical History</h1>
                <p>Medical conditions you have/had</p>
            </header>   
			<div class="image fit">
                <img src="images/pic07.jpg" alt="" /> <!--image src:https://unsplash.com/photos/l0j0DHVWcIE-->
            </div>
        <form method="POST"> 
            <div class="row">
				<div class="6u 12u$(small)">
					<ul class="alt">
						<p>&nbsp;
						<select name="condition1" id="condition1" disabled placeholder="Enter your history">
						<option>
						<?php 
								
								if(empty($historyArray[0])){
									print "None";
								}else{
									print $historyArray[0];
								}
						?> 
						</option>
						<option value="None">None</option>
						<option value="Asthma">Asthma</option>
						<option value="Arthritida">Arthritida</option>
						<option value="Diavitis">Diavitis</option>
						<option value="Egefaliko">Egefaliko</option>
						<option value="Epilipsia">Epilipsia</option>
						<option value="Kardiako Epeisodio">Kardiako Epeisodio</option>
						<option value="Kinitiki neurwsi">Kinitiki neurwsi</option>
						<option value="Parkinson">Parkinson</option>
						<option value="Sklirinsi kata plakas">Sklirinsi kata plakas</option>
						<option value="Thromvwsi">Thromvwsi</option>
						<option value="Xwlisterini">Xwlisterini</option>
						</select></p>
						<p>&nbsp;
						<select name="condition2" id="condition2" disabled placeholder="Enter your history">
						<option>
						<?php 
								
								if(empty($historyArray[1])){
									print "None";
								}else{
									print $historyArray[1];
								}
						?> 
						</option>
						<option value="None">None</option>						
						<option value="Asthma">Asthma</option>
						<option value="Arthritida">Arthritida</option>
						<option value="Diavitis">Diavitis</option>
						<option value="Egefaliko">Egefaliko</option>
						<option value="Epilipsia">Epilipsia</option>
						<option value="Kardiako Epeisodio">Kardiako Epeisodio</option>
						<option value="Kinitiki neurwsi">Kinitiki neurwsi</option>
						<option value="Parkinson">Parkinson</option>
						<option value="Sklirinsi kata plakas">Sklirinsi kata plakas</option>
						<option value="Thromvwsi">Thromvwsi</option>
						<option value="Xwlisterini">Xwlisterini</option>
						</select></p>
						<p>&nbsp;
						<select name="condition3" id="condition3" disabled placeholder="Enter your history">
						<option>
						<?php 
								
								if(empty($historyArray[2])){
									print "None";
								}else{
									print $historyArray[2];
								}
						?> 
						</option>
						<option value="None">None</option>
						<option value="Asthma">Asthma</option>
						<option value="Arthritida">Arthritida</option>
						<option value="Diavitis">Diavitis</option>
						<option value="Egefaliko">Egefaliko</option>
						<option value="Epilipsia">Epilipsia</option>
						<option value="Kardiako Epeisodio">Kardiako Epeisodio</option>
						<option value="Kinitiki neurwsi">Kinitiki neurwsi</option>
						<option value="Parkinson">Parkinson</option>
						<option value="Sklirinsi kata plakas">Sklirinsi kata plakas</option>
						<option value="Thromvwsi">Thromvwsi</option>
						<option value="Xwlisterini">Xwlisterini</option>
						</select></p>
					</ul>
				</div>
				<div class="6u$ 12u$(small)">
					<ul class="icons">
						<p>&nbsp;
						<select name="condition4" id="condition4" disabled placeholder="Enter your history">
						<option>
						<?php 
								
								if(empty($historyArray[3])){
									print "None";
								}else{
									print $historyArray[3];
								}
						?> 
						</option>	
						<option value="None">None</option>
						<option value="Asthma">Asthma</option>
						<option value="Arthritida">Arthritida</option>
						<option value="Diavitis">Diavitis</option>
						<option value="Egefaliko">Egefaliko</option>
						<option value="Epilipsia">Epilipsia</option>
						<option value="Kardiako Epeisodio">Kardiako Epeisodio</option>
						<option value="Kinitiki neurwsi">Kinitiki neurwsi</option>
						<option value="Parkinson">Parkinson</option>
						<option value="Sklirinsi kata plakas">Sklirinsi kata plakas</option>
						<option value="Thromvwsi">Thromvwsi</option>
						<option value="Xwlisterini">Xwlisterini</option>
						</select></p>
						<p>&nbsp;
						<select name="condition5" id="condition5" disabled placeholder="Enter your history">
						<option>
						<?php 
								if(empty($historyArray[4])){
									print "None";
								}else{
									print $historyArray[4];
								}
						?> 
						</option>	
						<option value="None">None</option>
						<option value="Asthma">Asthma</option>
						<option value="Arthritida">Arthritida</option>
						<option value="Diavitis">Diavitis</option>
						<option value="Egefaliko">Egefaliko</option>
						<option value="Epilipsia">Epilipsia</option>
						<option value="Kardiako Epeisodio">Kardiako Epeisodio</option>
						<option value="Kinitiki neurwsi">Kinitiki neurwsi</option>
						<option value="Parkinson">Parkinson</option>
						<option value="Sklirinsi kata plakas">Sklirinsi kata plakas</option>
						<option value="Thromvwsi">Thromvwsi</option>
						<option value="Xwlisterini">Xwlisterini</option>
						</select></p>
						<p id="thisbutton">&nbsp;<br/>
						<input class="button" onclick="hide()" value="Edit Profile"/></p>
						<p id="thesebuttons" style="display: none;">&nbsp;<br/>
						<input type="submit" class="button" value="Save" name="save_medHistory"/>
						<input class="button" onclick="location.reload()" value="Cancel"/>
						</p>
					</ul>
				</div>
			</div>
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
	<script>				
		function hide() {
			var x = document.getElementById("thisbutton");
			if (x.style.display === "none") {
			x.style.display = "block";
			} else {
			x.style.display = "none";
			}
			document.getElementById("thesebuttons").style.display = "block";
			$("#condition1").prop('disabled', false);
			$("#condition2").prop('disabled', false);
			$("#condition3").prop('disabled', false);
			$("#condition4").prop('disabled', false);
			$("#condition5").prop('disabled', false);
		}
		function show() {
			var x = document.getElementById("thesebuttons");
			if (x.style.display === "none") {
			x.style.display = "block";
			} else {
			x.style.display = "none";
			}
			document.getElementById("thisbutton").style.display = "block";
			$("#condition1").prop('disabled', true);
			$("#condition2").prop('disabled', true);
			$("#condition3").prop('disabled', true);
			$("#condition4").prop('disabled', true);
			$("#condition5").prop('disabled', true);
		}
	</script>

</body>
</html>