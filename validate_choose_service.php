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
 
 
// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');
 
 
if ($error != '') {  
   // Back to register page
   $next_page = 'choose_service.php';    // public service einai !!
   // Add error message to the query string
   $query_string .= '&error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
}
// If Ok then go to confirmation
else $next_page = 'customer.php';     //queue.php
 
 
 
if  (isset($_POST['service']) )   {
$_SESSION['service']   = $_POST['service'];
}
$service = $_SESSION['service']   ;
   $con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
  mysqli_query($con,"SET NAMES 'utf8'");
    $query = "select * from `$service` WHERE line='1' ORDER BY number DESC ";
	$res = mysqli_query($con, $query) ;
$num_results = mysqli_num_rows($res); 
 


   $t=date("H:i:s", time());
$row = mysqli_fetch_array($res);
$time2=$row['time'];
 // $my_time1 = strtotime("+5 minutes", strtotime($time2));
// $time1 = strtotime($time2);
$time1 = strtotime("+5 minutes", strtotime($time2));
$current_time = strtotime($t);
$diff=$time1 -$current_time ;
$diff=(int)($diff / 60) ;
    
	//Redirect to confirmation page
 $query_string .= '?service=' . $service;
 $query_string3 .= '&num_results=' . $num_results;
 $query_string4 .= '&diff=' . $diff;
header('Location: http://' . $server_dir . $next_page . $query_string . $query_string3 . $query_string4);
	
    ?>
<body>
</body>
</html>