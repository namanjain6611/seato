<?php
ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");



//collect the passed id
$id = $_POST['cattID'];
$a_year = $_POST['yearadd'];
			
//run a prepared statement 
$result = mysql_query("SELECT * FROM time_table WHERE course_id='$id' AND year='$a_year'");
echo '<option value="">Select Exam/Course ';
								;
								echo '</option>';
//loop through all returned rows
while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['course_code'];
								echo '</option>';
							}
					

?>