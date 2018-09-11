<?php 

ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");

$query = mysql_query("SELECT * FROM settings WHERE id = '1'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
			
$examdate=$_POST['examdate'];			
$fstartroll=$_POST['fstartroll'];			
$sstartroll=$_POST['sstartroll'];
$addyear=$_POST['addyear'];
$fstartroll=$_POST['fstartroll'];			
			
			
			


$n_row=6;
$n_colm=6;
$n_seat=$n_colm*$n_row;
$numx=$n_seat/$n_colm;
$numbx=$n_colm-$numx;
$m1=1;
$m2=2;
$m3=3;
$m4=4;
$m5=5;
$m6=6;
$m7=7;
$m8=8;


$x = 5;
$seat=1;
$mc=0;


//for First row check lenegt
$mcx=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as=$mcx * $n_colm + $m1;
	$mcx++;
	}

//end of First row check lenegt


//for second row check lenegt
$mcx2=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as2=$mcx2 * $n_colm + $m2;
	$mcx2++;
	}
//end of second row check lenegt

//for third row check lenegt
$mcx3=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as3=$mcx3 * $n_colm + $m3;
	$mcx3++;
	}
//end of third row check lenegt


//for fourth row check lenegt
$mcx4=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as4=$mcx4 * $n_colm + $m4;
	$mcx4++;
	}
//end of fourth row check lenegt


//for firth row check lenegt
$mcx5=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as5=$mcx5 * $n_colm + $m5;
	$mcx5++;
	}
//end of firth row check lenegt



//for six row check lenegt
$mcx6=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as6=$mcx6 * $n_colm + $m6;
	$mcx6++;
	}
//end of six row check lenegt

//for seven row check lenegt
$mcx7=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as7=$mcx7 * $n_colm + $m7;
	$mcx7++;
	}
//end of sseven row check lenegt

//for eight row check lenegt
$mcx8=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$as8=$mcx8 * $n_colm + $m8;
	$mcx8++;
	}
//end of eight row check lenegt



//for First row arrangement
if($n_colm>=1){
for ($x = $numbx; $x<$n_colm; $x++) {

$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
echo $x;
}
    echo '<p> each insert '.($a=$mc * $n_colm + $m1).'</p>';
	$mc++;
	}}
 echo $a; 

//end of first row arrangement


//for third row complete check
if($n_colm>=3){
if($a==$as)
{
$mc3=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
}
    echo '<p> each insert '.($an3=$mc3 * $n_colm + $m3).'</p>';
	$mc3++;
	}
 echo $an3;
echo "good";
}}
//end Third row complete check

//for five row complete check
if($n_colm>=5){
if($an3==$as3)
{
$mc5=0;
for ($x = $numbx; $x<$n_colm; $x++) {

$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
}

    echo '<p> each insert '.($an5=$mc5 * $n_colm + $m5).'</p>';
	$mc5++;
	}
 echo $an5;
}}
//end five row complete check


//for seven row complete check
if($n_colm>=7){
if($an5==$as5)
{
$mc7=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
}

    echo '<p> each insert '.($an7=$mc7 * $n_colm + $m7).'</p>';
	$mc7++;
	}
 echo $an7;
echo "good";
}}
//end seven row complete check















if($n_colm>=2){
//for second row arrangement
$mc2=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
}

    echo '<p> each insert '.($a2=$mc2 * $n_colm + $m2).'</p>';
	$mc2++;
	}
 echo $a2; 
}
//end of second row arrangement


//for four row complete check
if($n_colm>=4){
if($a2==$as2)
{
$mc4=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
}

    echo '<p> each insert '.($an4=$mc4 * $n_colm + $m4).'</p>';
	$mc4++;
	}
 echo $an4;
 
echo "<b></b>";
echo "<b></b>";

}}
//end four row complete check

//for six row complete check
if($n_colm>=6){
if($an4==$as4)
{
$mc6=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
}

    echo '<p> each insert '.($an6=$mc6 * $n_colm + $m6).'</p>';
	$mc6++;
	}
 echo $an6;
}}
//end six row complete check


//for eight row complete check
if($n_colm>=8){
if($an6==$as6)
{
$mc8=0;
for ($x = $numbx; $x<$n_colm; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$see' AND m_type='3' ORDER BY `members_table`.`roll_no` ASC limit 1");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
echo $see=$row['roll_no'];
}

    echo '<p> each insert '.($an8=$mc8 * $n_colm + $m8).'</p>';
	$mc8++;
	}
 echo $an8;
echo "good";
}}
//end eight row complete check



?>