<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include "defines.php";

$error =  '';


	if (isset($_POST['submit'])) {
	$dbc = mysql_connect(HOST, USER, PASS) or die(mysql_error());
	mysql_select_db(DB);
	
	
	$trimmed = array_map('trim', $_POST);
	// Έλεγχος για το συνθηματικό
	if (preg_match ('/^\w{4,20}$/', $trimmed['pass']) ) {
		if ($trimmed['pass'] == $trimmed['conf_pass']) {
				//echo "1" ;
			$p = mysql_real_escape_string ($trimmed['pass'], $dbc);
		} else {
			$error = 'Το συνθηματικό που πληκτρολογήσατε δεν είναι ίδιο με το παραπάνω συνθηματικό';
		//	echo "2" ;
		}
	} else {
		$error = 'Παρακαλώ εισάγετε έγκυρο συνθηματικό';
		//echo "3" ;
	}
	} 
	
	
	
// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');
 



	
	if ($error=='') { // Αν δεν υπάρχουν σφάλματα
	
		// Καταχώριση του νέου χρήστη στη βάση δεδομένων
			$username=$_GET['username'];
	
		$q = "Update users set password=MD5('$p')  where username='$username' "; // χρήση της συνάρτησης MD5 για το συνθηματικό
		$r = @mysql_query ($q,$dbc); // Εκτέλεση του αιτήματος
		if ($r) { // Αν πήγαν όλα καλά
		$flag='2';
		
			  $query_string .= '?flag=' . $flag;
				$next_page = 'reset_succ.php'; 
			echo '<h1 class= "text">Ευχαριστούμε!</h1>
		<p class= "text">Η διαδικασία απόκτησης νέου κωδικού σας στο σύστημα ολοκληρώθηκε επιτυχώς. </p><p><br /></p>';	
		  echo "<a href=\"index.php\">Αρχική σελίδα</a>";

		} else { // Αν υπάρχουν σφάλματα
		
			$flag='1';
		
			  $query_string .= '?flag=' . $flag;
				$next_page = 'reset.php'; 
			echo '<h3>Σφάλμα</h3>
			<p class="error">Η διαδικασία σας δεν πέτυχε λόγω κάποιου σφάλματος</p>'; 
			
			// Μήνυμα για Αποσφαλμάτωση:
			echo '<p>' . mysql_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // Τέλος του if ($r) IF.
		
		mysql_close($dbc); // Κλείσιμο της σύνδεσης με τη Βάση Δεδομένων

		$next_page = 'reset_succ.php'; 
		
	} else { 
	   // Back to register page
   $next_page = 'reset.php';    // public service einai !!
   // Add error message to the query string
   session_start();
 //  $_SESSION['errors']=$errors;
  //rawurlencode(serialize($errors));
   $query_string .= '?error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
   
   
   
		
	} // Τέλος του if (empty($errors))
	
	mysql_close($dbc); // Κλείσιμο της σύνδεσης με τη Βάση

 
	//Redirect to confirmation page

header('Location: http://' . $server_dir . $next_page . $query_string  );
	

	
	
	
	?> 
</body>
</html>