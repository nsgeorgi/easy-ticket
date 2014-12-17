<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "defines.php";
$page = $_SERVER['PHP_SELF'];
$sec = "100";
date_default_timezone_set('Europe/Athens');
session_start() ;

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

 <div id="message" name="message">
  
  
  
  
					
<?php						//------ ELEGXOS AMKA //


$error = '';
$service= $_SESSION['service'] ;
if(isset($_POST['submit'])) {


  if(isset($_POST['amka'])) {
    $_POST['amka']=preg_replace("/[^0-9]/", "", $_POST['amka']);

    if(strlen($_POST['amka']) != AMKA_LENGTH)
    {
		$error = 'Μη εγκύρος ΑΜΚΑ, βεβαιωθείτε οτι ο ΑΜΚΑ που έχετε εισάγει είναι σωστός και προσπαθήστε ξανα <br />'; 
      echo $error;
    //  return;
    }
	
/*	if(strlen($_POST['mobile']) != MOBILE_LENGTH || strlen($_POST['mobile']) != 0)
    {
      echo 'Μη εγκύρος αριθμός κινητού, βεβαιωθείτε ότι ο αριθμός του κινητού  που έχετε εισάγει είναι σωστός και προσπαθήστε ξανα';
      return;
    }   */

    $day = substr($_POST['amka'], 0, 2);
    $month =substr($_POST['amka'], 2, 2);
    $year =substr($_POST['amka'], 4, 2);

    if(!checkdate($month,$day, $year)) { 
	$error = 'Μη εγκύρος ΑΜΚΑ, βεβαιωθείτε οτι ο ΑΜΚΑ που έχετε εισάγει είναι σωστός και προσπαθήστε ξανα <br />'; 
      echo $error;
    // return;
    }
		
	
	// Build the query string to be attached 
// to the redirected URL
$amka=$_POST['amka'];
$query_string = '?amka=' . $amka;

// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');

if ($error != '') {  
   // Back to register page
   $next_page = 'customer.php';
   // Add error message to the query string
   $query_string .= '&error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
}
// If Ok then go to confirmation
else $next_page = 'getnumber.php';






					//-- ELEGXOS YPARKIS IDIOY AMKA -----

    $con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());

 
    $query = "select * from `$service` where amka ='$_POST[amka]'";

    $res = mysqli_query($con, $query) or die(mysqli_error());
   
      $row = mysqli_fetch_array($res);
	  $num_results = mysqli_num_rows($res); 
	  
      if($num_results > 0) {
		  $error = 'O AMKΑ που πληκτρολογήσατε έχει πάρει θέση στην ουρά. <br />'; 
	echo $error;
	$t=date("H:i:s", time());
	
$my_time    =   strtotime($row['time']);
$current_time   =   strtotime($t);
/*
if($my_time > $current_time )
{
   echo "den perase i seira  !!";
}   
else { echo "  perase i seira  !!"; } 
return ;  */
	  if ($my_time < $current_time ) { 
	    $attempt= $row['attempt'];
 	   $query = "Update  `$service` set line = 0 where amka ='$_POST[amka]' "or die(mysqli_error());
	   $res = mysqli_query($con, $query) or die(mysqli_error());
$next_page1 = 'second_attempt.php';
   // Add error message to the query string
  // $query_string1 .= '&=attempt' . $attempt;
  $query_string1 = '&attempt=' . $attempt;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page1 . $query_string . $query_string1);
  return ;	  }
	  
	  }
	 	if($num_results == 0) {  $error = 'O AMKΑ που πληκτρολογήσατε δεν έχει πάρει θέση στην ουρά. <br />'; 
	echo $error;
	 echo '<br /> 
    <a class="button" href="already_number.php">Πίσω </a> ';
 
	return;
	  
	   		
	  }
$time=$row['time'];
$number=$row['number'];
    mysqli_close($con);
    
//$_SESSION['amka_']   = $_POST['amka'];
//$_SESSION['number_rows_']  = $number_rows;
//$_SESSION['my_time_']  = $my_time;
//$_SESSION['line_']  = $line;


   // echo "Έχετε τον αριθμό $number_rows. Παρακαλούμε να προσέλθετε στη δημόσια υπηρεσία με το ΑΜΚΑ σας $_POST[amka] και την ταυτότητά σας.";
 
  }
}
//Redirect to confirmation page

$query_string1 = '&time=' . $time;
$query_string3 = '&number=' . $number;
header('Location: http://' . $server_dir . $next_page . $query_string . $query_string1 . $query_string3);
?>
  </div>

</body>
</html>