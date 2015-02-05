<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

include "session.php";
$page = $_SERVER['PHP_SELF'];
$sec = "60";
date_default_timezone_set('Europe/Athens');


if (empty($_SESSION['logged_in_service'])) {  $server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';
  $next_page = 'public_service.php';
 header('Location: http://' . $server_dir . $next_page );  }

 $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
        }
?>
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/dw.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta name="description" content="To   Easy Ticket  είναι ένα πρόγραμμα, το οποίο έχει ως σκοπό να αποφορτίζει τις ουρές αναμονής σε διάφορες υπηρεσίες, όπως η Εφορία ή ένα νοσοκομείο. Παρέχει στον ενδιαφερόμενο χρήστη, τη δυνατότητα να λαμβάνει σειρά στην ουρά είτε από κάποιο μηχάνημα της υπηρεσίας, είτε ηλεκτρονικά, από τον προσωπικό υπολογιστή του μέσω Internet, χωρίς να βρίσκεται απαραίτητα στο χώρο της υπηρεσίας. Ενημερώνει το χρήστη για την κατάσταση της ουράς κάθε χρονική στιγμή και προσφέρει μία εκτίμηση του χρόνου που θα χρειαστεί να περιμένει μέχρι να εξυπηρετηθεί. " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
 <title>Queue</title>
 <!-- InstanceEndEditable -->  
 
<link rel="shortcut icon" href="images/favic.ico" type="image/x-icon">
<link rel="icon" href="images/favic.ico" type="image/x-icon">
 <link rel="stylesheet" href="main.css">


<script>
    
     if($(window).width() < <?php echo SCREEN_WIDTH ?> )
	       	document.location = "m.index.php";
      
 </script>
<!-- InstanceBeginEditable name="head" -->
 <!-- InstanceEndEditable -->
</head>

<body> 
<div id="container">
 
<div align="center">
<a href="index.php">
<img src="logo_1163129_web.jpg" alt="asd" width="140" height="40" align="left" />  
</a>  
  <h2 id="title_"><em><strong><em><strong></strong></em>ΚΑΛΩΣΗΡΘΑΤΕ ΣΤΗΝ EASY TICKET ! </strong></em></h2>
</div>
<div id="languages" align="right">
<a href="index.php?lang=en"><img src="images/en.png" /></a>
<a href="index.php?lang=de"><img src="images/de.png" /></a>
<a href="index.php?lang=es"><img src="images/greece.png" /></a>
</div>


<div id="navigation" align="center">
    <ul>
    
      <li><a href="index.php"> Αρχική </a></li>
      <li><a href="products.php"> Προιόντα </a></li>
       <li><a href="about.php"> Σχετικά </a></li>
      <li><a href="contact.php"> Επικοινωνία </a>    </li>
      
    </ul>
  
</div>

<!-- InstanceBeginEditable name="lol" -->

<?php $username=$_SESSION['login_user_service']  ; ?>
<div  align="right"  >
<span> Welcome <?php echo $username; ?> ! </span> </br>
<a class="links" id="logout"  href="logout.php">Log Out <?php/* echo $username; */?></a></div>



<div align="center">
 <p><!-- Begin DWUser_EasyRotator --> 
  
 <!-- End DWUser_EasyRotator -->
 </p>
 <!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="body" -->
 <?php 
 
 function to_utf16($text) {
	$out="";
	$text=mb_convert_encoding($text,'UTF-16','UTF-8');
	for ($i=0;$i<mb_strlen($text,'UTF-16');$i++)
		$out.= bin2hex(mb_substr($text,$i,1,'UTF-16'));
	return $out;
}
 


 function lol($data){ 
    $mb_hex = ''; 
    for($i = 0 ; $i<mb_strlen($data,'UTF-8') ; $i++){ 
        $c = mb_substr($data,$i,1,'UTF-8'); 
        $o = unpack('N',mb_convert_encoding($c,'UCS-4BE','UTF-8')); 
        $mb_hex .= sprintf('%04X',$o[1]); 
    } 
    return $mb_hex; 
 }

 
 
  if (isset($_GET['username']) )  { 
 $_SESSION['login_user_service']   = $_GET['username'];
  $username=$_GET['username'] ;
   } else  {
	   $username=$_SESSION['login_user_service'];
	     }

  if (isset($_GET['service'] ) )  { 
  $_SESSION['service_']   = $_GET['service'] ;
  $service=$_GET['service'] ;
   } else  {
	  $service=$_SESSION['service_'];
	     }


	//SESSION
//$_SESSION['username_']   = $_POST['amka'];
$con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
 
	 mysqli_query($con,"SET NAMES 'utf8'");
	 $query="SELECT * FROM 	upiresia where name='$service' ";
	
	$res = mysqli_query($con, $query) or die(mysqli_error());
	$row = mysqli_fetch_array($res);
	echo 'ΩΡΕΣ ΛΕΙΤΟΥΡΓΙΑΣ: </br> </br> ΩΡΑ ΕΝΑΡΞΗΣ : ' ;
	echo $row['start'] ;
	echo ' </br>  '; 
	echo 'ΩΡΑ ΛΗΞΗΣ : '; 
	echo  $row['end']; 
	echo ' </br> </br> '; 
	echo 'ΑΡΙΘΜΟΣ ΑΤΟΜΩΝ ΓΙΑ ΕΞΥΠΗΡΕΤΗΣΗ : ';
	echo $row['people'];
	echo ' </br> ';  
	$query="SELECT * FROM 	`$service` ";
 $res = mysqli_query($con, $query) or die(mysqli_error());  ?>
 <h2 id="title_"><em><strong><em><strong></strong></em><?php echo $service ?></strong></em></h2>
 </div>
 
 
  <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
 
 

 <table class="table table-striped table-hover"> 
 <tr   >
   <th>Username</th>
   <th>Number</th>
   <th>Mobile</th>
   <th>Time</th>
   <th>Line</th>
 </tr>
 
 
 <tr >
 <td>  Nikos </td>
 <td> 1</td>
 <td> 6983854822   </td>
 <td> 14:10:00   </td>
 <td> NAI  </td>
 
 
 </tr>
  <tr >
 <td> Giwrgos </td>
 <td>  2 </td>
 <td>6983854822 </td>
 <td>14:15:00  </td>
 <td>NAI </td>
 
 
 </tr>
   <tr >
 <td> Giannis</td>
 <td> 3</td>
 <td>  6983854822 </td>
 <td> 14:15:00 </td>
 <td>   NAI </td>
 
 
 </tr>
   <tr >
 <td>  Nikos </td>
 <td> 4 </td>
 <td>6983854822 </td>
 <td> 14:25:00 </td>
 <td> ΟΧΙ </td>
 
 
 </tr>


 <?php  while( $row = mysqli_fetch_array($res)) {  
  echo  " <tr > " ; 
   echo " <td > ";  echo $row['username'] ; echo " </td> " ;
      echo " <td > ";  echo $row['number'] ; echo " </td> " ;	
      echo " <td > ";  echo $row['mobile'] ; echo " </td> " ;
	   echo " <td > ";  echo $row['time'] ; echo " </td> " ;
	    echo " <td > ";  echo $row['line'] ; echo " </td> " ;
 echo " </tr> " ;

 
   $t=date("H:i:s", time());


$time1 = strtotime($row['time']);
$current_time = strtotime($t);
$diff=$time1 -$current_time ;
$diff=(int)($diff / 60) ;
$now = new DateTime();
			
	  if ($diff<0 ) { 
	   $number=$row['number']; 
	  // echo $number;
	   $query = "UPDATE `$service` SET line = '0' WHERE number =$number ";
	   $res1 = mysqli_query($con, $query) ;
	    } 


/*if ($diff==10 ) { 
 $user = "easy_ticket";
    $password = "fMCVdbDKHUUKBN";
    $api_id = "3507465";
    $baseurl ="http://api.clickatell.com";
 $text = urlencode("Efxaristoume pou epileksate tin  Easy Ticket.Sas enimerwnoume oti tha prepei na proselthete stin  $service se $diff lepta.");
    $text1 = "Ευχαριστούμε που επιλέξατε  την Easy Ticket.Σας ενημερώνουμε ότι θα πρέπει να προσέλθετε στην $service σε $diff λεπτά.";
	//$text=lol($text1);
	//echo $text;
	$data1="30";
	$result = $data1 . $row['mobile'];
    $to = $result;
 
    // auth call
    $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
 
    // do auth call
    $ret = file($url);
 
    // explode our response. return string is on first line of the data returned
    $sess = explode(":",$ret[0]);
    if ($sess[0] == "OK") {
 $unicode=1;
        $sess_id = trim($sess[1]); // remove any whitespace
        $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text&unicode=$unicode;";
 
        // do sendmsg call
        $ret = file($url);
        $send = explode(":",$ret[0]);
 
        if ($send[0] == "ID") {
            //echo "successnmessage ID: ". $send[1];
        } else {
          //  echo "send message failed";
        }
    } else {
        //echo "Authentication failure: ". $ret[0];
    }


}
*/







}   
//echo $text;
// unset($_SESSION['logged_in']);
  
echo " </table> " ;  

 ?>  
<style >
#title_{
	width: 100%;
	font-family: "Comic Sans MS", cursive;
	text-align: center;
	background-color: #FFF;
	color: #000;
	margin: 0px;
	padding: 0px;
	font-size: 28px;
	border-bottom-color: #999;
	
	border-bottom-width: thin;

	border-bottom-style: solid;
	

}

#navigation a {
	padding: 15px 25px;
	
	color: #000;
	text-decoration: none;
//	border-radius: 30px;
//	background-color: #666;
	
}

#logout {
	color: #000;
	font-family: "Comic Sans MS", cursive;
	
}

#footer {
	font-size: 14px;
	position: absolute;
	width: 100%;
	/*bottom: -850px; */
	color: #000;
	height: 30px;
	text-align: center;
	
}

</style>
<!-- InstanceEndEditable -->
  
 



  <script src="js/index.js"></script>
  <div class="push">
  </div>
<div id="footer">
   
 Copyright &copy; - 2014 Site designed and created by Easy Ticket - All rights reserved</div>
</div>
</div>



</body>
<!-- InstanceEnd --></html>