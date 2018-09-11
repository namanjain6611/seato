<?php 


ini_set("error_reporting" , 0);
include("../db/dbconnection.php");

 $seat_id=$_GET['seats'];
 echo $hno=$_GET['hname'];
echo"\n\n --------------";
echo $seatype=$_GET['seatype'];

echo"\n\n --------------";
echo $edates=$_GET['edates'];

echo"\n\n --------------";
echo $shiftday=$_GET['shiftday'];


 $result = mysql_query("SELECT * FROM class_hall WHERE id='$hno'");
while($row = mysql_fetch_array($result))
	{
		 $n_colum=$row['n_colum'];
		 $n_row=$row['n_row'];
		 $hname=$row['name'];
		 $branch_code=$row['college_id'];
		}
$inb=1;
$inbn=2;
$inbm=3;


//for 1X row check


if($seatype==1)
{

	

echo"\n\n --------------";
echo $n_colum;
echo"\n\n --------------";
echo $n_row;
echo"\n\n --------------";
echo $hname;


echo"\n\n --------------";
echo $s3b=$_GET['bookxIDD'];

echo"\n\n --------------";
echo $s3y=$_GET['yearaddxx'];

echo"\n\n --------------";
echo $sub3=$_GET['boonknID'];

echo"\n\n --------------";
 $rno3=$_GET['bookkxIDD'];


echo $last3chars = substr($rno3, 3);  
	

	
$seatypec=1;
echo"<p>-------------- <p>";
echo $sco=$last3chars-1;

$subm = substr($rno3,0,3);
echo"<p>-------------- <p>";

echo $joinn= $subm.$sco;

echo"<p>-------------- <p>";
$n_seat=$n_colum*$n_row;
$numbx=$n_colum-$n_row;



for($i=0;$i<$n_row;$i++){




//for First row arrangement

for ($x = $numbx; $x<$n_colum; $x++) {

	$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinn' AND m_type='3' AND a_year='$s3y' AND branch_code='$s3b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
	{
	echo $joinn=$row['roll_no'];

	}


    echo '<p> each insert '.($a=$x * $n_colum + $inb).'</p>';

	}
	$inb=$inb+1;
	
	echo"\n\n -------------- eee";
	}
		echo"<p>-------------- <p>";

 echo $a; 





}


//end of 1X row arrangement









if($seatype==2)
{


echo"\n\n --------------";
echo $n_colum;
echo"\n\n --------------";
echo $n_row;
echo"\n\n --------------";
echo $hname;


echo"\n\n --------------";
echo $s3b=$_GET['bookxIDD'];

echo"\n\n --------------";
echo $s3y=$_GET['yearaddxx'];

echo"\n\n --------------";
echo $sub3=$_GET['boonknID'];

echo"\n\n --------------";
 $rno3=$_GET['bookkxIDD'];
 
 echo"\n\n --------------";
echo $s2b=$_GET['bookxID'];

echo"\n\n --------------";
echo $s2y=$_GET['yearaddx'];

echo"\n\n --------------";
echo $sub2=$_GET['ebookkxID'];

echo"\n\n --------------";
echo $rno2=$_GET['bookkxID'];

echo"<p>-------------- <p>";


echo $last3chars = substr($rno2, 3);  
echo"<p>-------------- <p>";

echo $last3charsn = substr($rno3, 3);  
	


echo"<p>-------------- <p>";
echo $sco=$last3chars-1;

$subm = substr($rno3,0,3);
echo"<p>-------------- <p>";

echo $joinn= $subm.$sco;

echo"<p>-------------- <p>";
$n_seat=$n_colum*$n_row;
$numbx=$n_colum-$n_row;


echo"<p>-------------- <p>";
echo $scon=$last3charsn-1;

$submn = substr($rno2,0,3);
echo"<p>-------------- <p>";

echo $joinnn= $submn.$scon;

echo"<p>-------------- <p>";


$n_seat=$n_colum*$n_row;
$numbx=$n_colum-$n_row;

$seatypec=$n_row/$seatype;

for($i=0;$i<$seatypec;$i++){

//for First row arrangement

for ($x = $numbx; $x<$n_colum; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinnn' AND m_type='3' AND a_year='$s2y' AND course_code='$s2b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
	{
	echo $joinnn=$row['roll_no'];

	}
	
    echo '<p> each insert '.($a=$x * $n_colum + $inb).'</p>';
	$mc++;
	}
	$inb=$inb+2;
	
	echo"\n\n -------------- eee";
	
//end First row arrangement




//for Second row arrangement

for ($x = $numbx; $x<$n_colum; $x++) {

$time_tablev = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinn' AND m_type='3' AND a_year='$s3y' AND course_code='$s3b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($rovw = mysql_fetch_array($time_tablev, MYSQL_BOTH))
	{
	echo $joinn=$rovw['roll_no'];

	}
	


    echo '<p> each insertc '.($a=$x * $n_colum + $inbn).'</p>';
	}
	$inbn=$inbn+2;
	
	echo"\n\n -------------- eee";
	
		echo"<p>-------------- <p>";

 }

 echo $a; 
//end First row arrangement


echo"\n\n --------------";
echo $s3b=$_GET['bookxIDD'];

echo"\n\n --------------";
echo $s3y=$_GET['yearaddxx'];

echo"\n\n --------------";
echo $sub3=$_GET['boonknID'];

echo"\n\n --------------";
echo $rno3=$_GET['bookkxIDD'];

}


//end of 1X row arrangement



















if($seatype==3)
{

echo"\n\n --------------";
echo $n_colum;
echo"\n\n --------------";
echo $n_row;
echo"\n\n --------------";
echo $hname;




$n_seat=$n_colum*$n_row;
$numbx=$n_colum-$n_row;

$seatypec=$n_row/$seatype;

for($i=0;$i<$seatypec;$i++){

//for First row arrangement

for ($x = $numbx; $x<$n_colum; $x++) {

    echo '<p> each insert '.($a=$x * $n_colum + $inb).'</p>';
	$mc++;
	}
	$inb=$inb+3;
	
	echo"\n\n -------------- eee";
	
//end First row arrangement




//for Second row arrangement

for ($x = $numbx; $x<$n_colum; $x++) {

    echo '<p> each insertc '.($a=$x * $n_colum + $inbn).'</p>';
	}
	$inbn=$inbn+3;
	
	echo"\n\n -------------- eee";
	
		echo"<p>-------------- <p>";
		
		
		
//for Third row arrangement

for ($x = $numbx; $x<$n_colum; $x++) {

    echo '<p> 3rd insert '.($a=$x * $n_colum + $inbm).'</p>';
	}
	$inbm=$inbm+3;
	
	echo"\n\n -------------- eee";
	
		echo"<p>-------------- <p>";

 }

 echo $a; 
//end First row arrangement


echo"\n\n --------------";
echo $s3b=$_GET['bookxIDD'];

echo"\n\n --------------";
echo $s3y=$_GET['yearaddxx'];

echo"\n\n --------------";
echo $sub3=$_GET['boonknID'];

echo"\n\n --------------";
echo $rno3=$_GET['bookkxIDD'];

}


//end of 1X row arrangement





















if($seatype==4)
{
echo"\n\n --------------";
echo $s1b=$_GET['bookID'];

echo"\n\n --------------";
echo $s1y=$_GET['yearadd'];

echo"\n\n --------------";
echo $sub1=$_GET['bookknID'];

echo"\n\n --------------";
echo $rno1=$_GET['bookkID'];


echo"\n\n --------------";
echo $s2b=$_GET['bookxID'];

echo"\n\n --------------";
echo $s2y=$_GET['yearaddx'];

echo"\n\n --------------";
echo $sub2=$_GET['ebookkxID'];

echo"\n\n --------------";
echo $rno2=$_GET['bookkxID'];




echo"\n\n --------------";
echo $s3b=$_GET['bookxIDD'];

echo"\n\n --------------";
echo $s3y=$_GET['yearaddxx'];

echo"\n\n --------------";
echo $sub3=$_GET['boonknID'];

echo"\n\n --------------";
echo $rno3=$_GET['bookkxIDD'];

}






?>