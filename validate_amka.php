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

if(isset($_POST['submit'])) {


	
	if(strlen($_POST['mobile']) != MOBILE_LENGTH && strlen($_POST['mobile']) != 0)
    {
		$error ='Μη εγκύρος αριθμός κινητού, βεβαιωθείτε ότι ο αριθμός του κινητού  που έχετε εισάγει είναι σωστός και προσπαθήστε ξανα';
      echo $error;
   //   return;
    }   

 
	// Build the query string to be attached 
// to the redirected URL

$mobile=$_POST['mobile'];
$username =$_SESSION['login_user'];
$query_string = '?username=' . $username;

// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');

if ($error != '') {
   // Back to register page
   $next_page = 'insert_amka.php';
   // Add error message to the query string
   $query_string = '?error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
}
// If Ok then go to confirmation
else $next_page = 'getnumber.php';






					//-- ELEGXOS YPARKIS IDIOY USERNAME-----

    $con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());

 $service= $_SESSION['service'] ;

 
    $query = "select * from  `$service` where username ='$username' ";

    $res = mysqli_query($con, $query)  ;
   
      $row = mysqli_fetch_array($res);
	  $num_results = mysqli_num_rows($res); 
	  $flag_2=false;
      if( $num_results >0 ) {
		   // $row = mysqli_fetch_array($res);
	 // $num_results = mysqli_num_rows($res); 
		    $now = new DateTime();
			
	  if ($row['time'] < $now->format(' H:i:s') ) { 
	   $query = "Update `$service` set line = 0 where username ='$username' ";
	   $res = mysqli_query($con, $query) or die(mysqli_error());
	   $flag_2=true;
	  }
						// --- ELEGXOS AN TO IDIO AMKA VRISKETAI AKOMA STIN OURA -----
						
						
	  if ($row['line']==1) {
       
         $flag='1';
      }
	  if ($row['attempt']==2) {
		  $flag='2';
	  }
	    if ($row['line']==0  && $row['attempt']!=2 ) { // AN EXEI PAREI THESI KAI EXEI TELEIWSEI
			  $query = "delete  from `$service` where username ='$username'";
	   $res = mysqli_query($con, $query) or die(mysqli_error());
      	$flag_2=true;
      }

  
	} 
	  if($num_results == 0 ||  $flag_2==true ) { 
						
						//-- EFOSON DEN YPARXEI TO AMKA , TO EKXWRW ---
			$attempt=$row['attempt'] +1 ;			
   $query ="SELECT * FROM `$service` ORDER BY number DESC";
$res = mysqli_query($con, $query) or die(mysqli_error());
//echo $result;
//$res->num_rows;
$row=mysqli_fetch_array($res);
$number= $row['number']+1;


							//----- UPDATE THN OURA		--------- auto den xreiazotan giati to update tha ginei stin queue.php alla dn peirazei
 $query = "Update `$service` set line = '0' where time < 'time()' "or die(mysqli_error());
   $res = mysqli_query($con, $query) or die(mysqli_error());
   
   $now = new DateTime();
echo $now->format(' H:i:s');    // MySQL datetime format
echo $now->getTimestamp() ;
					
   $query ="SELECT * FROM `$service`  WHERE line='1' ORDER BY number DESC";
$res = mysqli_query($con, $query) or die(mysqli_error());
   $num_results = mysqli_num_rows($res); 
$row = mysqli_fetch_array($res);

					
					// -------   EAN I OURA EINAI ADEIA TOTE DINW STO PRWTO NOUMERO  + 15 LEPTA -----
					
if ($num_results == 0){ 
//echo " 0 results " ; return ;  
$time = date('H:i:s ', strtotime(' +15 minutes'));

}
			// -------- ALLIWS DINW STO NOUMERO  + 5 LEPTA -------

 else {
 //echo " 1 results " ; return ;
 $time2=$row['time'];
  $my_time1 = strtotime("+5 minutes", strtotime($time2));
 $time = date('H:i:s',$my_time1);
 echo  $time2      ;
 echo  $my_time1      ;
 echo  $time      ;
 }
 
 $line =1;
    $query = "insert into `$service` (username,number,mobile,time,line,attempt) values ('$username', '$number','$mobile','$time','$line','$attempt')" ;
    $res = mysqli_query($con, $query);
    if ($res == FALSE)
    {
      echo $number;
	  echo 'Παρακαλούμε προσπαθήστε ξανα';
      return;
    }
    mysqli_close($con);
    
//$_SESSION['amka_']   = $_POST['amka'];
//$_SESSION['number_rows_']  = $number_rows;
//$_SESSION['my_time_']  = $my_time;
//$_SESSION['line_']  = $line;

}else { 
      //  $flag='2';
	   }
   // echo "Έχετε τον αριθμό $number_rows. Παρακαλούμε να προσέλθετε στη δημόσια υπηρεσία με το ΑΜΚΑ σας $_POST[amka] και την ταυτότητά σας.";
 
  
}
//Redirect to confirmation page

$query_string2 = '&time=' . $time;
$query_string3 = '&number=' . $number;
$query_string4 = '&flag=' . $flag;
header('Location: http://' . $server_dir . $next_page . $query_string . $query_string2 . $query_string3 . $query_string4);
?>
</div>
</body>
</html>