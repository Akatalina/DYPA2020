<?php 
@session_start();
require_once("dbconnect.php");

$username=$_POST['username'];
$passwd=$_POST['passwd'];
$repeatPasswd=$_POST['repeatpasswd'];
$firstName=$_POST['firstname'];
$lastName=$_POST['lastname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$weight=$_POST['weight'];

if(!isset($age) || !isset($gender) || !isset($weight) || !isset($username) || !isset($passwd) || !isset($repeatPasswd) || !isset($firstName) || !isset($lastName) || !isset($email)){
	header("Location:signup.php?msg=Fill+all+fields");
}
else if( $passwd!=$repeatPasswd){
	header("Location:signup.php?msg1=Passwords+dont+match");
}
else{
	//print $username." ".$passwd." ".$repeatPasswd." ".$firstName." ".$lastName." ".$age." ".$gender." ".$email." ".$weight;

	$sql="INSERT INTO users(`FName`,`LName`,`uname`,`password`,`gender`,`age`,`email`,`weight`,`passwd_enc`) VALUES('".$firstName."','".$lastName."','".$username."','".$passwd."','".$gender."',".$age.",'".$email."','".$weight."',PASSWORD('".$passwd."'));";
	
	if ($con->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
	$_SESSION['user']=$username;
	$_SESSION['userId']=$con->insert_id;
	
	
	$sql1="INSERT INTO allergies(`user`) VALUES('".$_SESSION['userId']."');"; //Γεμιζει τον πινακα αλλεργιες ωστε οταν τις ενημερωνει στην σελιδα allergies.php να κανει update
	$sql2="INSERT INTO medhistory(`user`) VALUES(".$_SESSION['userId'].");";
	$result2=$con->query($sql2); // Θα δημιουργει μια μονο γραμμη στο medhistory με πολλα history
	for($x=1;$x<6;$x++){ //Θα δημιουργει 5 γραμμες με αλλεργιες για τον χρηστη. Μια γραμμη για καθε αλλεργια.
		$result=$con->query($sql1);
	}
	header("Location:startup.php");
}


?>