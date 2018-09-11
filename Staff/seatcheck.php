<?php
ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");



//collect the passed id
$id = $_POST['cattID'];
$a_year = $_POST['yearadd'];
$shiday = $_POST['shiday'];
			
//run a prepared statement 
 $newmail = mysql_num_rows(mysql_query("SELECT * FROM seat WHERE date='$id' AND shift_day='$a_year' AND hall_id='$shiday'"));

echo "<option name='xa$shiday' value='$newmail'>$newmail</option>";
//loop through all returned rows

					

?>