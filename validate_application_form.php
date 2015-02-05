<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

	<?php 	// Γλυκός Κωνσταντίνος
			// mai1212@uom.edu.gr
			// Σχολείο Ανάπτυξης Ανοικτού Κώδικα ΑΠΘ
			// 18/12/2014
			

//	echo "<h3 class= 'text' >Φόρμα Εγγραφής</h3>";
	include "defines.php";
	if (isset($_POST['submitted'])) {
	$dbc = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB);
		
	$trimmed = array_map('trim', $_POST);
	$errors = array(); 
	
	
	// Αρχικοποίηση ως false
	$fn = $ln = $l=$e = $u = $p = FALSE;
	
	// Έλεγχος για το όνομα
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
		$fn = mysql_real_escape_string ($trimmed['first_name'], $dbc);
	} else {
		$errors[] = 'Παρακαλώ εισάγετε το όνομα';
	}
	
	
	
	// Έλεγχος για το επώνυμο
	if (preg_match ('/^[\+0-9\-\(\)\s]*$/', $trimmed['last_name'])) {
		$ln = mysql_real_escape_string ($trimmed['last_name'], $dbc);
	} else {
		$errors[] = 'Παρακαλώ εισάγετε το ΑΦΜ';
	}
	
	
	// Έλεγχος για την περιοχή
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['location'])) {
		$l = mysql_real_escape_string ($trimmed['location'], $dbc);
	} else {
		$errors[] = 'Παρακαλώ εισάγετε την περιοχή';
	}
	
	
	// Έλεγχος για τη διεύθυνση ηλεκτρονικού ταχυδρομείου
	if (preg_match ('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $trimmed['email'])) {
		
		if ($trimmed['email'] == $trimmed['conf_email']) {
			$e = mysql_real_escape_string ($trimmed['email'], $dbc);
		} else {
			$errors[] = 'Το συνθηματικό που πληκτρολογήσατε δεν είναι ίδιο με το παραπάνω συνθηματικό';
		}
	} else {
		$errors[] = 'Παρακαλώ εισάγετε σωστή διεύθυνση email';
	}
	
	$query = mysql_query("SELECT *  FROM  login WHERE email = '$trimmed[email]'");
	$row = mysql_fetch_array($query);			
			if(!empty($row['email'])){ 
			$errors[] = 'Η διεύθυνση email υπάρχει ήδη.';
			  } 
	
	/*
// include SMTP Email Validation Class
require_once('smtp_validateEmail.class.php');

// the email to validate
$email = $trimmed['email'];
// an optional sender
$sender = 'nickgeo_@hotmail.com';
// instantiate the class
$SMTP_Validator = new SMTP_validateEmail();
// turn on debugging if you want to view the SMTP transaction
$SMTP_Validator->debug = true;
// do the validation
$results = $SMTP_Validator->validate(array($email), $sender);
// view results
echo $email.' is '.($results[$email] ? 'valid' : 'invalid')."\n";

// send email? 
if ($results[$email]) {
  //mail($email, 'Confirm Email', 'Please reply to this email to confirm', 'From:'.$sender."\r\n"); // send email
} else {
	$errors[]='Η διεύθυνση email δεν υπάρχει .';
 // echo 'The email addresses you entered is not valid';
}
	
	*/
	
	// Έλεγχος για το όνομα χρήστη
	if (preg_match ('/^\w{4,20}$/', $trimmed['user_name']) ) {
		$u = mysql_real_escape_string ($trimmed['user_name'], $dbc);
	} else {
	$errors[] = 'Παρακαλώ εισάγετε σωστό όνομα χρήστη';
	}
	
	$query = mysql_query("SELECT *  FROM login WHERE username = '$trimmed[user_name]'");
	$row = mysql_fetch_array($query);			
			if(!empty($row['username'])){
				$errors[] = 'Το όνομα χρήστη υπάρχει ήδη.';
				
				  } 
	
	
	// Έλεγχος για το τηλέφωνο
	if (preg_match ('/^\w{5,15}$/', $trimmed['mobile']) ) {
		
			$p = mysql_real_escape_string ($trimmed['mobile'], $dbc);
	
		
	} else {
		$errors[] = 'Παρακαλώ εισάγετε έγκυρο τηλέφωνο';
	}
	
	$query = mysql_query("SELECT *  FROM login WHERE email= '$trimmed[email]'");
	$row = mysql_fetch_array($query);			
			if(!empty($row['email'])){
				$errors[] = 'Το όνομα χρήστη υπάρχει ήδη.';
				
				  } 
	

// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');
 



	
	if (empty($errors)) { // Αν δεν υπάρχουν σφάλματα
	
		// Καταχώριση του νέου χρήστη στη βάση δεδομένων
		
		
		$q = "INSERT INTO login (username, service,afm,mobile, email,location) VALUES ('$u','$fn', '$ln', '$p','$e', '$l' )"; // χρήση της συνάρτησης MD5 για το συνθηματικό
		$r = @mysql_query ($q,$dbc); // Εκτέλεση του αιτήματος
		if ($r) { // Αν πήγαν όλα καλά
		$flag='2';
		
			  $query_string .= '?flag=' . $flag;
				$next_page = 'application_succ.php'; 
			echo '<h1 class= "text">Ευχαριστούμε!</h1>
		<p class= "text">Η εγγραφή σας στο σύστημα ολοκληρώθηκε επιτυχώς. </p><p><br /></p>';	
		  echo "<a href=\"index.php\">Αρχική σελίδα</a>";

		} else { // Αν υπάρχουν σφάλματα
		
			$flag='1';
		
			  $query_string .= '?flag=' . $flag;
				$next_page = 'application_succ.php'; 
			echo '<h3>Σφάλμα</h3>
			<p class="error">Η εγγραφή σας δεν πέτυχε λόγω κάποιου σφάλματος</p>'; 
			
			// Μήνυμα για Αποσφαλμάτωση:
			echo '<p>' . mysql_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // Τέλος του if ($r) IF.
		
		mysql_close($dbc); // Κλείσιμο της σύνδεσης με τη Βάση Δεδομένων

		$next_page = 'application_succ.php'; 
		
	} else { 
	   // Back to register page
   $next_page = 'application_form.php';    // public service einai !!
   // Add error message to the query string
   session_start();
   $_SESSION['errors']=$errors;
  rawurlencode(serialize($errors));
   $query_string .= '?errors=' . $errors;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
   
   
   
		
	} // Τέλος του if (empty($errors))
	
	mysql_close($dbc); // Κλείσιμο της σύνδεσης με τη Βάση

 
	//Redirect to confirmation page

header('Location: http://' . $server_dir . $next_page . $query_string  );
	


} // Τέλος της κύριας συνθήκης submit
?>


</body>
</html>