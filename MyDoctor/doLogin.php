<?php
@session_start();
$u=$_POST['username'];
$p=$_POST['passwd'];
//$id="";
require_once("dbconnect.php");
 
/*if($p=="123" && $u="admin"){
	$_SESSION['user']=$u;
	header("Location:startup.php");
}*/
//print "\n\$u=".$u."&\$p=".$p;


if(($u==null || $u=='') && ($p==null || $p=='')){ //Δεν αφήνει τον χρήστη να κάνει login χωρίς να συμπληρώσει την login form.
	header("Location:login.php");
}else{
	//--------------Κρυπτογραφώ το password που δίνει ο χρήστης----------------
	$sql2="SELECT PASSWORD('".$p."')";
	$result2=$con->query($sql2);
	$row2=$result2->fetch_row();
	$p_encrypted=$row2[0];
	//------------------------------
	
	$sql="SELECT * FROM users WHERE uname=? AND passwd_enc=PASSWORD(?)";
	$stmt=$con->prepare($sql);
	$stmt->bind_param('ss',$u,$p);
	$stmt->execute();

	$result=$stmt->get_result();
	$row=$result->fetch_assoc();
	if($row['uname']==$u && $row['passwd_enc']==$p_encrypted){
		$_SESSION['user']=$u;
		$_SESSION['userId']=$row['id'];
		header("Location:startup.php");
	}
	else{
		header("Location:login.php");
		print "Wrong username or password. Try again!!!";
	}
	$stmt->close();
}

?>