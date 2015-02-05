<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

	<?php
# validate.php

$from = $_POST['from'];
$error = '';

if ($from == '') $error = 'Είναι υποχρεωτικό να συμπληρώσετε το πεδίο του Αποστολέα !<br />';

 // Build the query string to be attached 
// to the redirected URL
$query_string = '?error=' . $error;

// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');

if ($error != '') {
   // Back to register page
   $next_page = 'contact.php';
   // Add error message to the query string
   $query_string .= '&error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
}
// If Ok then go to confirmation
else $next_page = 'contact_succ.php';

/*
Here is where the PHP sql data insertion code will be
*/


//if "from" is filled out, then send email
if (isset($_POST['from']))
  {
  $from = $_POST['from']; // sender
  $message = $_POST['message'];
  $subject=$_POST['subject'];
  // message lines should not exceed 70 characters (PHP rule), so wrap it
  $message = wordwrap($message, 70);
   
 
  mail('nickgeo_@hotmail.com', $subject, $message, "From: $from");  }
  
  






// Redirect to confirmation page
header('Location: http://' . $server_dir . $next_page  . $query_string);
?>

</body>
</html>