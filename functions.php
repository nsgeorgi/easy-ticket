<?php

function checkuser($fuid,$funame,$ffname,$femail){
	echo 'EIMAI VLAAAKAASSS' ;
	include "defines.php";
$con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
  mysqli_query($con,"SET NAMES 'utf8'");
  $query = "select * from users where username='$ffname'";
    $res = mysqli_query($con, $query) ;
	//	$check = mysql_query("select * from users where username='$ffname'");
	//$check = mysql_num_rows($check);
	if (true) { // if new user . Insert a new record	
	 $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$ffname', '$ffname', '$femail', '$ffname','$ffname' )";	
	//$query = "INSERT INTO users (username,email) VALUES ('$ffname','$femail')";
	 $res = mysqli_query($con, $query) ;	
	} else {   // If Returned user . update the user record		
	$query = "UPDATE users SET  username='$ffname'where email='$femail' ";
	 $res = mysqli_query($con, $query) ;
	}
}?>
