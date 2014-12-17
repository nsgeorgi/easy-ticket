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


	
	// Build the query string to be attached 
// to the redirected URL
$amka=$_GET['amka'];
$query_string = '?amka=' . $amka;
$time= date('h:i:s',time());
$query_string2 = '&time=' . $time;

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

 
    $query = "delete  from `$service` where amka =$amka";

    $res = mysqli_query($con, $query) or die(mysqli_error());
   
	  
    

 $query ="SELECT * FROM `$service`";
$res = mysqli_query($con, $query) or die(mysqli_error());
//echo $result;
$res->num_rows;
$number=$res->num_rows+1;




					
   $query ="SELECT * FROM `$service` WHERE line='1' ORDER BY number DESC";
$res = mysqli_query($con, $query) or die(mysqli_error());
   $num_results = mysqli_num_rows($res); 
$row = mysqli_fetch_array($res);

					
					// -------   EAN I OURA EINAI ADEIA TOTE DINW STO PRWTO NOUMERO  + 15 LEPTA -----
					
if ($num_results == 0){ 
//echo " 0 results " ; return ;  
$time = date('h:i:s', strtotime(' +15 minutes'));
$query_string2 = '&time=' . $time;
}
			// -------- ALLIWS DINW STO NOUMERO  + 5 LEPTA -------

 else {
 //echo " 1 results " ; return ;
 $time2=$row['time'];
  $my_time1 = strtotime("+5 minutes", strtotime($time2));;
 $time = date('h:i:s',$my_time1);

$query_string2 = '&time=' . $time;
 }
 
 echo $amka;
 echo "  ---  ";
 echo $number;
 echo $time;
 $line =1;
 $attempt=2;
 $mobile="0";
    $query = "insert into `$service` (amka,number,mobile,time,line,attempt) values ('$amka', '$number','$mobile','$time','$line','$attempt');" or die(mysqli_error());
    $res = mysqli_query($con, $query);
    if ($res == FALSE)
    {
      echo 'Παρακαλούμε προσπαθήστε ξανα';
      return;
    }
    mysqli_close($con);
    
//$_SESSION['amka_']   = $_POST['amka'];
//$_SESSION['number_rows_']  = $number_rows;
//$_SESSION['my_time_']  = $my_time;
//$_SESSION['line_']  = $line;


   // echo "Έχετε τον αριθμό $number_rows. Παρακαλούμε να προσέλθετε στη δημόσια υπηρεσία με το ΑΜΚΑ σας $_POST[amka] και την ταυτότητά σας.";
 
  

//Redirect to confirmation page


$query_string3 = '&number=' . $number;
header('Location: http://' . $server_dir . $next_page . $query_string . $query_string2 . $query_string3);
?>
  </div>

</body>
</html>