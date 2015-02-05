<?php
require 'src/facebook.php';  // Include facebook SDK file
//require 'functions.php';  // Include functions
$facebook = new Facebook(array(
  'appId'  => '881077061932130',   // Facebook App ID 
  'secret' => '1795a9647fd96bdba1d3d3c95d218b3b',  // Facebook App Secret
  'cookie' => true,	
));
$user = $facebook->getUser();

if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  	    $fbid = $user_profile['id'];                 // To Get Facebook ID
 	    $fbuname = $user_profile['username'];  // To Get Facebook Username
 	    $fbfullname = $user_profile['name']; // To Get Facebook full name
	    $femail = $user_profile['email'];    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
	    $_SESSION['USERNAME'] = $fbuname;
            $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
			$_SESSION['login_user']= $fbfullname; // Initializing Session
  $_SESSION['logged_in'] = 1;
			  $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
          // checkuser($fbid,$fbuname,$fbfullname,$femail);    // To update local DB
		//   echo 'EIMAI VLAAAKAASSS' ;
	include "defines.php";
$con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
  mysqli_query($con,"SET NAMES 'utf8'");
  $dbc = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB);
  $query = "select * from users where username='$ffname'";
    $res = @mysqli_query( $query,$dbc) ;
	//	$check = mysql_query("select * from users where username='$ffname'");
	//$check = mysql_num_rows($check);
	if (!$res) { // if new user . Insert a new record	
	// $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$fbfullname', '$fbfullname', '$femail', '$fbfullname','$fbfullname' )";	
	//$query = "INSERT INTO users (username,email) VALUES ('$ffname','$femail')";
	 $res = @mysqli_query($con, $query) ;	
	} else {   // If Returned user . update the user record		
	//$query = "UPDATE users SET  username='$ffname'where email='$femail' ";
	 $res = @mysqli_query($con, $query) ;
	}
  } catch (FacebookApiException $e) {
    error_log($e);
   $user = null;
  }
}
if ($user) {
	header("Location: choose_service.php");
} else {
 $loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'email', // Permissions to request from the user
		));
	
 header("Location: ".$loginUrl);
}

?>
