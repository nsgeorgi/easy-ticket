<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php
	include "defines.php";
	
	$con=mysql_connect(HOST,USER,PASS) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB,$con) or die("Failed to connect to MySQL: " . mysql_error());
	

$error='';

	
	if(isset($_POST['email'])) {	
		session_start();
		if(!empty($_POST['email'])){
			$query = mysql_query("SELECT *  FROM login WHERE email = '$_POST[email]'");
			$row = mysql_fetch_array($query);			
			if(!empty($row['username'])){
				// Email send process 
				$encrypt = $row['password'];
				$loginInfo=' Όνομα χρήστη  : '.$row['username']. " \n" . " \n ".'Κάντε κλικ στον παρακάτω σύνδεσμο για να αλλάξετε τον κωδικό σας : http://www.easy-ticket.gr/reset.php?encrypt='.$encrypt.'&username='.$row['username'].'&action=reset   ';
				$to = $row['email'];
				$subject = "Easy-Ticket Password";
				$headers = "From: Easy-Ticket <support@easy-ticket.gr>"; // Replace the email sender 
				$body = "Γειά σας,\n\n Τα στοιχεία εισόδου στον λογαριασμό σας είναι:\n".$loginInfo;
				if (mail($to, $subject, $body,$headers)) {
					echo("<p>Το email στάλθηκε με επιτυχία!</p>");
				} else {
					//echo("<p>Αποτυχία αποστολής email...</p>");
					$error="Αποτυχία αποστολής email...";
				}				 
			}else{
				//echo "<p>To email που καταχωρήσατε δεν υπάρχει. Προσπαθήστε ξανά</p>";
				$error ="To email που καταχωρήσατε δεν υπάρχει. Προσπαθήστε ξανά";
			}
		}else{
		//	echo "<p>Δεν έχετε συμπληρώσει κάποιο email</p>";
			$error = "Δεν έχετε συμπληρώσει κάποιο email";
		}
	}



// Redirection needs absolute domain and phisical dir
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

/* The header() function sends a HTTP message 
   The 303 code asks the server to use GET
   when redirecting to another page */
header('HTTP/1.1 303 See Other');
 
 
if ($error != '') {  
   // Back to register page
   $next_page = 'forgot.php';    // public service einai !!
   // Add error message to the query string
   $query_string .= '?error=' . $error;
   // This message asks the server to redirect to another page
   header('Location: http://' . $server_dir . $next_page . $query_string);
}
// If Ok then go to confirmation
else $next_page = 'forgot_succ.php';     //queue.php




//Redirect to confirmation page

header('Location: http://' . $server_dir . $next_page . $query_string );

	?>






</body>
</html>