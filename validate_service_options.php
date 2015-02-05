<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
session_start();
if(isset($_POST['submit'])) {
	echo " 4 " ;
		include "defines.php";
		
		$error='';
		$people=$_POST['people'];
		$start=$_POST['start'];
		$end=$_POST['end'];
// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');
 
 
if ($error != '') {  
	echo " 3 " ;
   // Back to register page
   $next_page = 'service_options.php';    // public service einai !!
   // Add error message to the query string
   $query_string .= '&error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
}
// If Ok then go to confirmation
else $next_page = 'service_options.php';     //queue.php
 
 
 $con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
//	 mysqli_query($con,"SET NAMES 'utf8'");
 $service=$_SESSION['service_'];
 $username=$_SESSION['login_user_service'];
	//---	tha prepei na valw 	MP5 !! -----
	$new_start=date("H:i", strtotime($start));
$new_end=date("H:i", strtotime($end));
	$query="Update  	upiresia set people='$people' , start='$new_start' , end='$new_end' , date=now() WHERE name='$service' ";

 $result = mysqli_query($con, $query);
 	if ($result) { // Αν πήγαν όλα καλά
	$_SESSION['temp']='1';
		$flag='2';
			echo " 2 " ;
			  $query_string = '?flag=' . $flag;
				//$next_page = 'serc.php';
	}
	
	else {
		
		$flag='1';
		echo " 1 " ;
			  $query_string .= '?flag=' . $flag;
				//$next_page = 'registration_succ.php';
		
		 }

}
	echo " 6 " ;
 
	//Redirect to confirmation page

header('Location: http://' . $server_dir . $next_page . $query_string );


?>




</body>
</html>