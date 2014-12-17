<?php
# register.php

if (!isset($_GET['user_name']))
   $user_name = "";
else
   $user_name = $_GET['user_name'];
   
// We will receive error messages
// from the validation page
if (!isset($_GET['error']))
   $error = '';
else
   $error = $_GET['error'];
?>
<html>
<body>
<h3>Registration Form</h3>
<?php
if ($error != '')
   echo '<p style="color:red;">', $error, '</p>';
?>

<form method="POST" action="./validate.php">

<p>User Name:
<input type="text" name="user_name"
value="<?php echo $user_name; ?>"></p>

<input type="submit" value="Submit the Registration Form">

</form>
</body>
</html>