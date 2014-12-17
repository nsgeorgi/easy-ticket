<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "defines.php";
$page = $_SERVER['PHP_SELF'];
$sec = "100";
date_default_timezone_set('Europe/Athens');
session_start();
if (!isset($_GET['amka'])) {  $server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';
  $next_page = 'index.php';
 header('Location: http://' . $server_dir . $next_page ); }
?>

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="C:\xampp\htdocs\Templates\dw.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Easy Ticket</title>
<!-- InstanceEndEditable -->  
<link href="images/delpi.jpg" rel="icon" type="image/png" />
<link rel="stylesheet" href="main.css">
<script>
  <!--  
     if($(window).width() < <?php echo SCREEN_WIDTH ?> )
	       	document.location = "m.index.php";
  -->    
 </script>
<!-- InstanceBeginEditable name="head" -->   

<!-- InstanceEndEditable -->
</head>

<body> 
<div id="container">

<div align="center">
<a href="index.php">
<img src="logo_1163129_web.jpg" alt="asd" width="140" height="68" align="left" />  
</a>  
  <h2 id="title_"><em><strong><em><strong></strong></em>ΚΑΛΩΣΗΡΘΑΤΕ ΣΤΗΝ EASY TICKET ! </strong></em></h2>
</div>
<div id="languages" align="right">
<a href="index.php?lang=en"><img src="images/en.png" /></a>
<a href="index.php?lang=de"><img src="images/de.png" /></a>
<a href="index.php?lang=es"><img src="images/greece.png" /></a>
</div>

<nav align="center"> 
<div id="navigation">
    <ul>
      <li> </li>
      <li></li> 
      <li><a href="index.php"> Αρχική </a></li>
      <li><a href="products.php"> Προιόντα </a></li>
       <li><a href="about.php"> Σχετικά </a></li>
      <li><a href="contact.php"> Επικοινωνία </a>    </li>
      
    </ul>
  
</div>
</nav>
<!-- InstanceBeginEditable name="lol" -->


<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="body" -->



<?php


$service=$_SESSION['service']; 
$amka=$_GET['amka'] ;
$time=$_GET['time'] ;
$number=$_GET['number'] ;

$t=date("H:i:s", time());


$time1 = strtotime($time);
$current_time = strtotime($t);
$diff=$time1 -$current_time ;
$diff=(int)($diff / 60) ;

/*echo(date('m/d/Y H:i:s ',$time1));
echo "  " ;
echo(date('m/d/Y H:i:s ',$current_time));
echo "  " ;  */

echo $diff;
//$interval = $time1->diff($current_time);
echo '<h2 id="title_"><em><strong><em><strong></strong></em> ΥΠΗΡΕΣΙΑ : '; echo $service; echo  '   </strong></em></h2> </br></br>';
echo '<h2 id="title_"><em><strong><em><strong></strong></em> ΑΜΚΑ : '; echo $amka; echo  '   </strong></em></h2> </br></br>';
echo '<h2 id="title_"><em><strong><em><strong></strong></em> ΝΟΥΜΕΡΟ : '; echo $number ; echo  '   </strong></em></h2> </br></br>';
if ( $diff>0   ) { 
echo '<h2 id="title_"><em><strong><em><strong></strong></em> ΜΕΣΟΣ ΧΡΟΝΟΣ ΑΝΑΜΟΝΗΣ : '; echo  $diff ;  echo  ' λεπτά  </strong></em></h2> </br></br> ';
}else {echo '<h2 id="title_"><em><strong><em><strong></strong></em> H σειρά σας πέρασε.'; echo ' </strong></em></h2> </br></br> ' ;}




$con = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
 
	 mysqli_query($con,"SET NAMES 'utf8'");
	$query="SELECT * FROM upiresia	WHERE name='$service' ";
	
 $res = mysqli_query($con, $query) or die(mysqli_error());  
$row = mysqli_fetch_array($res);
?>
<div align="center" >
<?php echo $row['location'] ?>;
</div>



</br> </br></br></br></br>
 <a class="button" href="index.php" style="margin-left:520px; ">Επιστροφή στην αρχική σελίδα </a>


 <!-- InstanceEndEditable -->
  
 



  <script src="js/index.js"></script>
 
   
<div id="footer">
  
<img src="images/copy.png"  alt="asd" width="20" height="10"  />  Copyright &copy; - 2014 Site designed and created by Easy Ticket - All rights reserved</div>
</div>
</div>
</body>
<!-- InstanceEnd --></html>