<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
include('defines.php');
$page = $_SERVER['PHP_SELF'];
$sec = "60";
date_default_timezone_set('Europe/Athens');
$username=$_SESSION['login_user']?>





<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="C:\xampp\htdocs\Templates\dw.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta name="description" content="To   Easy Ticket  είναι ένα πρόγραμμα, το οποίο έχει ως σκοπό να αποφορτίζει τις ουρές αναμονής σε διάφορες υπηρεσίες, όπως η Εφορία ή ένα νοσοκομείο. Παρέχει στον ενδιαφερόμενο χρήστη, τη δυνατότητα να λαμβάνει σειρά στην ουρά είτε από κάποιο μηχάνημα της υπηρεσίας, είτε ηλεκτρονικά, από τον προσωπικό υπολογιστή του μέσω Internet, χωρίς να βρίσκεται απαραίτητα στο χώρο της υπηρεσίας. Ενημερώνει το χρήστη για την κατάσταση της ουράς κάθε χρονική στιγμή και προσφέρει μία εκτίμηση του χρόνου που θα χρειαστεί να περιμένει μέχρι να εξυπηρετηθεί. " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Customer</title>
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


<div  align="right"  >
<span> Welcome <?php echo $username; ?> ! </span> </br>
<a class="links" id="logout"  href="logout.php">Log Out <?php/* echo $username; */?></a></div>


<div align="center">
  <p><!-- Begin DWUser_EasyRotator -->
<script type="text/javascript" src="http://c520866.r66.cf2.rackcdn.com/1/js/easy_rotator.min.js"></script>
<div mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" mmTranslatedValueHiliteColor="HILITECOLOR=%22Dyn%20Untranslated%20Color%22" mmTranslatedValueDynAttrs="DynAttrs=data-ertid" class="dwuserEasyRotator" style="width: 1000px; height: 417px; position:relative; text-align: left;" data-erconfig="{autoplayEnabled:false, lpp:'102-105-108-101-58-47-47-47-67-58-47-85-115-101-114-115-47-78-105-99-107-47-68-111-99-117-109-101-110-116-115-47-69-97-115-121-82-111-116-97-116-111-114-80-114-101-118-105-101-119-47-112-114-101-118-105-101-119-95-115-119-102-115-47', wv:1}" data-ername="eeee" data-ertid="{awl2764tt9713363865141}">
  <div data-ertype="content" style="display: none;"><ul data-erlabel="Main Category">
	<li>
		 <img class="main" src="thief.jpg" alt="Waiting to be served? Not anymore!" /> <img class="thumb" src="thief.jpg" /> 
		
		<span class="title">Waiting to be served? Not anymore!</span>
		<span class="desc">Manage your customer flow and improve the service your customers receive before they ever arrive to your location.</span>
	</li>
	<li>
		<img class="main" src="queue.jpg" alt="Waiting to be served? Not anymore!" /> <img class="thumb" src="queue.jpg" /> 
		<span class="title">Waiting to be served? Not anymore!</span>
		<span class="desc">Manage your customer flow and improve the service your customers receive before they ever arrive to your location.</span>
	</li>
	<li>
     <img class="main" src="Aug-25_13.jpg" alt="Waiting to be served? Not anymore!" /> <img class="thumb" src="Aug-25_13.jpg" /> 
		<span class="title">Waiting to be served? Not anymore!</span>
		<span class="desc">Manage your customer flow and improve the service your customers receive before they ever arrive to your location.</span>
	</li>
</ul>
</div>
  <div data-ertype="layout" data-ertemplatename="NONE" style="">			<div class="erimgMain" style="position: absolute; left:0;right:0;top:0;bottom:0;" data-erConfig="{___numTiles:3, scaleMode:'fillArea', duration:800, imgType:'main', alwaysPreviousButton:true, __loopNextButton:false, __arrowButtonMode:'rollover'}">
				<div class="erimgMain_slides" style="position: absolute; left:0; top:0; bottom:0; right:0;">
					<div class="erimgMain_slide">
						<div class="erimgMain_img" style="position: absolute; left: 0; right: 0; top:0;bottom:0;"></div>
					</div>
				</div>
				<!-- <div class="erimgMain_arrowLeft" style="position:absolute; left: 10px; top: 50%; margin-top: -15px;" data-erConfig="{image:'circleSmall', image2:'circleSmall'}"></div>
				<div class="erimgMain_arrowRight" style="position:absolute; right: 10px; top: 50%; margin-top: -15px;"></div> -->
			</div>
			<div class="" style="position: absolute; left:0; right:0; bottom: 20px; padding: 7px 200px 7px 20px; background: #000; background:rgba(0,0,0,0.9); color: #FFF; font-family: Georgia, 'Times New Roman', Times, _serif; text-align: left;">
				<p class="erdynamicText" data-erfield="title" style="padding: 0; margin: 0 0 3px 0; font-weight: bold; font-size: 22px; color: #FFF;"></p>
				<p class="erdynamicText" data-erfield="desc" style="padding: 0; margin: 0; font: 12px/16px Arial,_sans; color: #FFF;"></p>
			</div>
			<div class="erdots" style="overflow: hidden; margin: 0; font-size: 10px; font-family: 'Lucida Grande', 'Lucida Sans', Arial, _sans; color: #FFF; position: absolute; right:6px; bottom:30px; width:200px;" data-erConfig="{showText:false}" align="center">
				<div class="erdots_wrap" style="wasbackground-color: #CFC; float: right;" align="left"> <!-- modify the float on this element to make left/right/none=center aligned. -->
					<span class="erdots_btn_selected" style="padding-left: 0; width: 21px; height: 20px; display: inline-block; text-align: center; vertical-align: middle; line-height: 20px; margin: 0 2px 0 0; cursor: default; background: url(http://easyrotator.s3.amazonaws.com/1/i/rotator/dots/export/20_14_wite_65.png) top left no-repeat;">
						&nbsp;
					</span>
					<span class="erdots_btn_normal" style="padding-left: 0; width: 21px; height: 20px; display: inline-block; text-align: center; vertical-align: middle; line-height: 20px; margin: 0 2px 0 0; cursor: pointer; background: url(http://easyrotator.s3.amazonaws.com/1/i/rotator/dots/export/20_14_wite_35.png) top left no-repeat;">
						&nbsp;
					</span>
					<span class="erdots_btn_hover" style="padding-left: 0; width: 21px; height: 20px; display: inline-block; text-align: center; vertical-align: middle; line-height: 20px; margin: 0 2px 0 0; cursor: pointer; background: url(http://easyrotator.s3.amazonaws.com/1/i/rotator/dots/export/20_14_wite_65.png) top left no-repeat;">
						&nbsp;
					</span>
				</div>
			</div><div class="erabout erFixCSS3" style="color: #FFF; text-align: left; background: #000; background:rgba(0,0,0,0.93); border: 2px solid #FFF; padding: 20px; font: normal 11px/14px Verdana,_sans; width: 300px; border-radius: 10px; display:none;"> This <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/" target="_blank">jQuery slider</a> was created with the free <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/" target="_blank">EasyRotator</a> software from DWUser.com. <br />
      <br />
      Use WordPress? The free <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/wordpress/" target="_blank">EasyRotator for WordPress</a> plugin lets you create beautiful <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/wordpress/" target="_blank">WordPress sliders</a> in seconds. <br />
      <br />
      <a style="color:#FFF;" href="#" class="erabout_ok">OK</a> </div>
    <noscript>
      Rotator powered by <a href="http://www.dwuser.com/easyrotator/">EasyRotator</a>, a free and easy jQuery slider builder from DWUser.com.  Please enable JavaScript to view.
    </noscript>
    <script type="text/javascript">/*Avoid IE gzip bug*/(function(b,c,d){try{if(!b[d]){b[d]="temp";var a=c.createElement("script");a.type="text/javascript";a.src="http://easyrotator.s3.amazonaws.com/1/js/nozip/easy_rotator.min.js";c.getElementsByTagName("head")[0].appendChild(a)}}catch(e){alert("EasyRotator fail; contact support.")}})(window,document,"er_$144");</script>
  </div>
</div>
<!-- End DWUser_EasyRotator --></p>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="body" --> 

 



<?php
				//	SEMINA 
 
//include('defines.php');
if  (isset($_GET['service']) )   {
$_SESSION['service']   = $_GET['service'];
}
$service = $_SESSION['service']   ;

$diff   = $_GET['diff'];
$num_results   = $_GET['num_results'];

  

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
	$now = new DateTime();
//	echo $now->format(' H:i:s');
	//echo time() ; 
if   (   strtotime($row['start']) > time() || strtotime($row['end'])  < time()  ) {
	
 echo '<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="bootbox.min.js"></script>
    
    <script type="text/javascript">
        bootbox.alert("H υπηρεσία μας δεν είναι διαθέσιμη αυτή τη στιγμή . Παρακαλώ κοιτάξτε τις ώρες λειτουργίας της υπηρεσίας μας.")

        
    </script> ';
	
}

		// SEMINA 
?>

  
 <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="bootbox.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
	  
  $('#button1').click(function(){
     <?php
	 if   (  strtotime($row['start']) > time() || strtotime($row['end'])  < time()  )   { 
	 echo'window.location = "insert_amka.php" '; 
	
	 }
	 else { echo ' bootbox.alert("Πρέπει να  ολοκληρώσετε τις ρυθμίσεις για να μεταβείτε στην σελίδα! ") ';} ?>
  });
});
  
  
	</script>
    
    
     <script type="text/javascript">
  $(document).ready(function(){
	  
  $('#button2').click(function(){
     <?php
	 if   (   strtotime($row['start']) > time() || strtotime($row['end'])  < time()  )   { 
	 echo'window.location = "validate_already_num.php" '; 
	
	 }
	 else { echo ' bootbox.alert("Πρέπει να  ολοκληρώσετε τις ρυθμίσεις για να μεταβείτε στην σελίδα! ") ';} ?>
  });
});
  
  
	</script>
    
    
    <style>
  body {background-color:black}
  #title_ {width: 100%;
	font-family: "Comic Sans MS", cursive;
	text-align: center;
	background-color: #FFF ;
	color: #000;
	 margin: 0px;
	padding: 0px;
	font-size:28px ;
	border: 8px solid #FFF;
	border-bottom:thin;
	border-bottom-color:#FFF;
   }
</style>
    
 
  <?php
  
  
if (!$num_results) { $diff=15;   $num_results=0;} 
   echo '<h2 id="title_"><em><strong><em><strong></strong></em> Υπηρεσία : '; echo $service; echo  '   </strong></em></h2> </br></br>';
	echo '<h2 id="title_"><em><strong><em><strong></strong></em> Αριθμός πελατών στην ουρά : '; echo $num_results; echo  '   </strong></em></h2> </br></br>';
	 echo '<h2 id="title_"><em><strong><em><strong></strong></em> Mέσος χρόνος αναμονής: '; echo "$diff λεπτά"; echo   '  </strong></em></h2> </br></br>';
	

?>





 <button  id="button1" class="button" style="margin-top:50px; margin-right:50px">Nέο χαρτάκι</button>
 <button  id="button2" class="button" style="margin-top:50px;">Έχω ήδη χαρτάκι</button>

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