<?php
ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");



//collect the passed id
$id = $_POST['cattID'];
$a_year = $_POST['yearadd'];
			
//run a prepared statement 
$result = mysql_query("SELECT * FROM members_table WHERE course_code='$id' AND a_year='$a_year'");
echo '<option value="">Select Roll Number ';
								;
								echo '</option>';
//loop through all returned rows
while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['roll_no'].'">';
								echo $row['roll_no'];
								echo '</option>';
							}
					

?>