<?php
ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");



//collect the passed id
$id = $_GET['catID'];
			
//run a prepared statement 
$result = mysql_query("SELECT * FROM course WHERE branch='$id'");

//loop through all returned rows
while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['course_id'].'">';
								echo $row['course_name'];
								echo '</option>';
							}
					

?>