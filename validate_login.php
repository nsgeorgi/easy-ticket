<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "defines.php";
$page = $_SERVER['PHP_SELF'];
$sec = "100";
date_default_timezone_set('Europe/Athens');
session_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

	<?php 
	
	
 	$error='';
	
	$errflag = false;
 
	
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);

	if($username == '') {
		$error = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$error = 'Password missing';
		$errflag = true;
	}
 
 
// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');
 
 
if ($error != '') {  
   // Back to register page
   $next_page = 'public_service.php';    // public service einai !!
   // Add error message to the query string
   $query_string .= '&error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
}
// If Ok then go to confirmation
else $next_page = 'queue.php';     //queue.php
 
 
 $con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
//	 mysqli_query($con,"SET NAMES 'utf8'");
	$query="SELECT * FROM login WHERE username='$username' AND password='$password'";

 $result = mysqli_query($con, $query);
	//$result  $num_results > 0
	if($result) {
		 $row = mysqli_fetch_array($result);
	  $num_results = mysqli_num_rows($result);
		if($num_results > 0) {
			$service=$row['service'];
		$query_string = '?service=' . $service;
		$query_string3 = '&username=' . $username;
			$_SESSION['login_user']=$username; // Initializing Session
  $_SESSION['logged_in'] = 1;
			  $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
		
			
			
		}else {
			$next_page = 'public_service.php';
			$error = 'user name and password not found';
			$query_string = '?error=' . $error;
			
			$errflag = true;
		
		}
	}else {
		$next_page = 'public_service.php';
		
	}
    
	//Redirect to confirmation page

header('Location: http://' . $server_dir . $next_page . $query_string . $query_string3);
	
    ?>
<body>
</body>
</html>