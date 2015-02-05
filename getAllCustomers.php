<?php


$con = $con = mysql_connect("localhost","root","aafreen");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("TestDatabase", $con);

$result = mysql_query("SELECT * FROM Customer");

while($row = mysql_fetch_assoc($result))
  {
	$output[]=$row;
  }

print(json_encode($output));

mysql_close($con);


?>