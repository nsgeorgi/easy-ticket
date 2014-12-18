<!--Boutsikas Christos--> 
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Είσοδος</title>
	</head>
	<h3>Είσοδος Χρήστη</h3>
	<form action="" method = "post">
		<label for="username">Όνομα χρήστη :</label> <input type="username" id="username" name="username" placeholder="username"><br /><br />
		<label for="password">Κωδικός :</label> <input id="password" name="password" placeholder="**********" needs autocomplete="off" type="password"><br /><br />
		<!--Fill the new register page--> 
		<a href="">Δεν έχεις εγγραφεί ακόμη;</a><br /><br /> 
		<a href="forgot.php">Ξέχασες τον κωδικό;</a><br /><br />
		<button type = "submit">Login</button>
	</form>

        <?php
	include "defines.php";

	$con=mysql_connect(HOST,USER,PASS) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB,$con) or die("Failed to connect to MySQL: " . mysql_error());
	if(!empty($_POST['username'])  && !empty($_POST['password'])){
		session_start();		
		$query = mysql_query("SELECT *  FROM login where username = '$_POST[username]' AND password = '$_POST[password]'");
		$row = mysql_fetch_array($query);
		if(!empty($row['username']) AND !empty($row['password'])){
			echo "<p>Είσοδος επιτυχής</p>";
			$username=$row['username'];
			$_SESSION['loginUser']= $username;
 			$_SESSION['loggedIn'] = 1;
			//echo "<p>".$_SESSION['login_user']."</p>";
		}else{
		// Check what is the wrong input 
			$query2 = mysql_query("SELECT *  FROM login where username = '$_POST[username]'");
			$row2 = mysql_fetch_array($query2);
			if(!empty($row2['username'])){
				echo "<p>Λάθος κωδικός. Προσπαθήστε ξανά</p>";
			}else{
				echo "<p>Ο λογαριασμός με username: ".$_POST['username']." δεν υπάρχει. Δοκιμάστε ξανά.</p>";
			}
				
		}
	}
	?>

</html>

