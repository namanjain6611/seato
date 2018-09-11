<?php
ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");



//collect the passed id
$id = $_POST['cattID'];
$a_year = $_POST['yearadd'];
$shiftday = $_POST['shiftday'];
			
//run a prepared statement 
 $newmail = mysql_num_rows(mysql_query("SELECT * FROM seat WHERE date='$a_year' AND shift_day='$shiftday' AND roll_no='$id'"));

echo "<input type='hidden' name='alrean' value='$newmail'>";
//loop through all returned rows

					

?>