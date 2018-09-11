<?php
ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");



//collect the passed id
$id = $_GET['catID'];
			
			
						
			
//run a prepared statement 
$resultni = mysql_query("SELECT * FROM seat_added WHERE id='$id'");
while($rowtn = mysql_fetch_array($resultni))
							{
							$hall_id=$rowtn['hall_id'];
							
							}
							
				
			
//run a prepared statement 
$resulti = mysql_query("SELECT * FROM class_hall WHERE id='$hall_id'");
while($rowt = mysql_fetch_array($resulti))
							{
							$course_id=$rowt['college_id'];
							
							}
					

$result = mysql_query("SELECT * FROM members_table WHERE branch_code='$course_id' AND m_type='2'");
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