<?php
$con = mysql_connect("localhost","seato_db","seato@123456");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("seato_hall", $con);
?>
