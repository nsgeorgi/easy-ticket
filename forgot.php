<!--Boutsikas Christos--> 
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Υπενθύμιση κωδικού πρόσβασης</title>
	</head>

	<?php
	include "defines.php";
	
	$con=mysql_connect(HOST,USER,PASS) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB,$con) or die("Failed to connect to MySQL: " . mysql_error());
	?>

	<h3>Διαδικασία επαλήθευσης λογαριασμού</h3>
	<body>
	<p>Εισάγετε το email που έχετε καταχωρημένο στο λογαριασμό σας ώστε να σας στείλουμε τα στοιχεία εισόδου<p>
	<form action="" method = "post">
		<label for="email">Διεύθυνση email :</label> <input type="text" id="email" name="email"><br /><br />
		<button type = "submit2">Αποστολή email</button>
	</form>

	<?php
	
	if(isset($_POST['email'])) {	
		session_start();
		if(!empty($_POST['email'])){
			$query = mysql_query("SELECT *  FROM login WHERE email = '$_POST[email]'");
			$row = mysql_fetch_array($query);			
			if(!empty($row['username'])){
				// Email send process 
				$loginInfo="Όνομα χρήστη : ".$row['username']."   Κωδικός : ".$row['password'];			
				$to = $row.['email'];
				$subject = "Easy-Ticket Password";
				$headers = "From: webmaster@example.com"; // Replace the email sender 
				$body = "Γειά σας,\n\nτα στοιχεία εισόδου στον λογαριασμό σας είναι:\n".$loginInfo;
				if (mail($to, $subject, $body,$headers)) {
					echo("<p>Το email στάλθηκε με επιτυχία!</p>");
				} else {
					echo("<p>Αποτυχία αποστολής email...</p>");
				}				 
			}else{
				echo "<p>To email που καταχωρήσατε δεν υπάρχει. Προσπαθήστε ξανά</p>";
			}
		}else{
			echo "<p>Δεν έχετε συμπληρώσει κάποιο email</p>";
		}
	}

	?>


	<a class="button" href="loginhome.php">Πίσω </a>


</html>
