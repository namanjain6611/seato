<?php
ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");



//collect the passed id
$id = $_GET['catID'];
			
			
	
//run a prepared statement 
$resulti = mysql_query("SELECT * FROM time_table WHERE id='$id'");
while($rowt = mysql_fetch_array($resulti))
							{
							   $ayear=$rowt['year'];
							$course_id=$rowt['course_id'];
							
							}
					

$result = mysql_query("SELECT * FROM members_table WHERE course_code='$course_id' AND a_year='$ayear'");
echo '<option value="">Select Roll Number ';

//loop through all returned rows
while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['roll_no'];
								echo " - ";
						echo $row['f_name'];
						echo " ".$row['l_name'];
								echo '</option>';
							}
					

?>