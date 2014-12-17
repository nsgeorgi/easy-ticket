<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <script>
  <!-- 
     if($(window).width() < <?php echo SCREEN_WIDTH ?> )
	      	document.location = "m.index.php";
  -->   
 </script>

<?php
echo "test2" ; //TEST2
session_start(); // Starting Session

include "defines.php";
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect(HOST, USER, PASS);
// Selecting Database
$db = mysql_select_db(DB, $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
  $_SESSION['logged_in'] = 1;
header("location: database.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>

</body>
</html>