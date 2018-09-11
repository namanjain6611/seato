<?php 


ini_set("error_reporting" , 0);
include("../db/dbconnection.php");



 $useract = mysql_query("SELECT * FROM settings WHERE id='1'");
while($row = mysql_fetch_array($useract, MYSQL_BOTH))
{
$is_sms=$row['is_sms'];
$is_email=$row['is_email'];
$site_contact=$row['site_contact'];
$site_url=$row['site_contact'];

}

 $seatid=$_GET['hname'];

 $seatless = mysql_query("SELECT * FROM class_hall WHERE id='$seatid'");
while($rowc = mysql_fetch_array($seatless, MYSQL_BOTH))
{
echo $is_less=$rowc['is_less'];
}



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
$seatypex=3;

//for 1X row check


if($seatype==1)
{
		mysql_query("insert into seat_added(hall_id,e_date,shift) values('$m_id','$hno','$edates')");

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


$n_seat=$n_colum*$n_row;
$numbx=$n_colum-$n_row;

echo	$seatypec=$n_colum/$seatype;

	for($i=0;$i<$seatypec;$i++)
		{
		   echo $bv=$i+1;
		 echo  $nv=$seatypec-3;
/*for First row arrangement 1 class */
if($bv>$nv AND $is_less!=0)
{
    

    $n_rown=$n_row-$is_less;
    for ($x = 0; $x<$n_rown; $x++) 
	{
	 

	$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinn' AND m_type='3' AND a_year='$s3y' AND course_code='$s3b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
	{
	 $joinn=$row['roll_no'];
	 $m_id=$row['id'];
	 $m_email=$row['email'];
	 $m_phone=$row['mobile'];
	 $f_name=$row['f_name'];
	 $rec_sms=$row['rec_sms'];
	 $rec_email=$row['rec_email'];
	
$detained = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$m_id' AND course_id='$sub3'"));

if($detained==1)
{
 echo '<p>'.($snom=$x * $n_colum + $inb). " - " .$joinn.' Detained ';

mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name,is_detain) values('$m_id','$snom','$edates','$shiftday','$hno','$joinn','$sub3','1')");

}

else
{ 
 echo '<p>'.($snom=$x * $n_colum + $inb). " - " .$joinn.'  ';

	if($is_email ==1)
		{
		if($m_email !=="")
			{
			if($rec_email==1)
				{	
				$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");
$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");
				include("../function/send_mail.php");
				}
			}
		}


	if($is_sms ==1)
		{
		if($m_phone !=="")
			{
			if($rec_sms==1)
				{
				$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");
				include("../function/send_sms.php");
				}
			}
		}
		echo '</p>';	
		mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name) values('$m_id','$snom','$edates','$shiftday','$hno','$joinn','$sub3')");
	}

}
	}

}
else
{
    for ($x = 0; $x<$n_row; $x++) 
	{
	 

	$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinn' AND m_type='3' AND a_year='$s3y' AND course_code='$s3b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
	{
	 $joinn=$row['roll_no'];
	 $m_id=$row['id'];
	 $m_email=$row['email'];
	 $m_phone=$row['mobile'];
	 $f_name=$row['f_name'];
	 $rec_sms=$row['rec_sms'];
	 $rec_email=$row['rec_email'];
	
$detained = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$m_id' AND course_id='$sub3'"));

if($detained==1)
{
 echo '<p>'.($snom=$x * $n_colum + $inb). " - " .$joinn.' Detained ';

mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name,is_detain) values('$m_id','$snom','$edates','$shiftday','$hno','$joinn','$sub3','1')");

}

else
{ 
 echo '<p>'.($snom=$x * $n_colum + $inb). " - " .$joinn.'  ';

	if($is_email ==1)
		{
		if($m_email !=="")
			{
			if($rec_email==1)
				{	
				$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");
$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");
				include("../function/send_mail.php");
				}
			}
		}


	if($is_sms ==1)
		{
		if($m_phone !=="")
			{
			if($rec_sms==1)
				{
				$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");
				include("../function/send_sms.php");
				}
			}
		}
		echo '</p>';	
		mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name) values('$m_id','$snom','$edates','$shiftday','$hno','$joinn','$sub3')");
	}

}
	}
	
	  
    
}
	$inb=$inb+1;
	echo"\t --------------";	    
		}
	
}
//end of 1X row arrangement







/*End of 2 X Arrangment*/

if($seatype==2)
{

	mysql_query("insert into seat_added(hall_id,e_date,shift) values('$m_id','$hno','$edates')");

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

$seatypec=$n_colum/$seatype;

for($i=0;$i<$seatypec;$i++){

//for First row arrangement

for ($x = 0; $x<$n_row; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinnn' AND m_type='3' AND a_year='$s2y' AND course_code='$s2b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
	{
	$joinnn=$row['roll_no'];
	 $m_id=$row['id'];
	 $m_email=$row['email'];
	 $m_phone=$row['mobile'];
	 $f_name=$row['f_name'];
	 $rec_sms=$row['rec_sms'];
	 $rec_email=$row['rec_email'];

$detained2 = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$m_id' AND course_id='$sub2'"));

if($detained2==1)
{
    echo '<p> Y - '.($anc=$x * $n_colum + $inb). " - " .$joinnn.' Detained </p>';

mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name,is_detain) values('$m_id','$anc','$edates','$shiftday','$hno','$joinnn','$sub2','1')");

}


else
{ 
 echo '<p> Y - '.($snom=$x * $n_colum + $inb). " - " .$joinnn.'  ';

	if($is_email ==1)
		{
		if($m_email !=="")
			{
			if($rec_email==1)
				{		
				$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub2'");
				include("../function/send_mail.php");
				}
			}
		}


	if($is_sms ==1)
		{
		if($m_phone !=="")
			{
			if($rec_sms==1)
				{
				$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub2'");
				include("../function/send_sms.php");
				}
			}
		}
		echo '</p>';	
		mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name) values('$m_id','$snom','$edates','$shiftday','$hno','$joinnn','$sub2')");
	}


	


	}
	
	$mc++;
	}
	$inb=$inb+2;
	
	echo"\n\n --------------";
/*End First row arrangement for 2 X */




/*Begining of Second Row Arrangement for 2 X*/

for ($x = 0; $x<$n_row; $x++) 

{
$time_tablev = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinn' AND m_type='3' AND a_year='$s3y' AND course_code='$s3b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	
	while($rovw = mysql_fetch_array($time_tablev, MYSQL_BOTH))
	{
	 $joinn=$rovw['roll_no'];
	 $m_id=$rovw['id'];
	 $m_email=$rovw['email'];
	 $m_phone=$rovw['mobile'];
	 $f_name=$rovw['f_name'];
	 $rec_sms=$rovw['rec_sms'];
	 $rec_email=$rovw['rec_email'];
$detained = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$m_id' AND course_id='$sub3'"));

if($detained==1)
{
 echo '<p> X -'.($snom=$x * $n_colum + $inb). " - " .$joinn.' Detained ';

mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name,is_detain) values('$m_id','$snom','$edates','$shiftday','$hno','$joinn','$sub3','1')");

}

else
{ 
 echo '<p> X - '.($snom=$x * $n_colum + $inbn). " - " .$joinn.'  ';
$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");

	if($is_email ==1)
		{
		if($m_email !=="")
			{
			if($rec_email==1)
				{				
				include("../function/send_mail.php");
				}
			}
		}


	if($is_sms ==1)
		{
		if($m_phone !=="")
			{
			if($rec_sms==1)
				{
				include("../function/send_sms.php");
				}
			}
		}
		echo '</p>';	
		mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name) values('$m_id','$snom','$edates','$shiftday','$hno','$joinn','$sub3')");
	}

}
	}
	$inbn=$inbn+2;
	echo"\t --------------";
	}

/*End of Second Row Arrangement for 2 X*/



}

/*End of 2 X Arrangment*/









if($seatype==4)
{

	mysql_query("insert into seat_added(hall_id,e_date,shift) values('$m_id','$hno','$edates')");
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



echo"\n\n --------------";
echo $s1b=$_GET['bookID'];

echo"\n\n --------------";
echo $s1y=$_GET['yearadd'];

echo"\n\n --------------";
echo $sub1=$_GET['bookknID'];

echo"\n\n --------------";
echo $rno1=$_GET['bookkID'];



echo $last3chars = substr($rno3, 3);  
echo"<p>-------------- <p>";

echo $last3charsn = substr($rno2, 3);  
	
echo"<p>-------------- <p>";

echo $last3charsnx = substr($rno1, 3);  
	


echo"<p>-------------- <p>";
echo $sco=$last3chars-1;

$subm = substr($rno3,0,3);
echo"<p>-------------- <p>";

echo $joinn= $subm.$sco;

echo"<p>-------------- <p>";



echo"<p>-------------- <p>";
echo $scox=$last3charsx-1;

$submx = substr($rno1,0,3);
echo"<p>-------------- <p>";

echo $joinnx= $submx.$scox;

echo"<p>-------------- <p>";




echo"<p>-------------- <p>";
echo $scon=$last3charsn-1;

$submn = substr($rno2,0,3);
echo"<p>-------------- <p>";

echo $joinnn= $submn.$scon;

echo"<p>-------------- <p>";


$n_seat=$n_colum*$n_row;
$numbx=$n_colum-$n_row;

echo $seatypecx=$n_colum/$seatypex;

for($i=0;$i<$seatypecx;$i++){


//for First row arrangement

for ($x = 0; $x<$n_row; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinnx' AND m_type='3' AND a_year='$s1y' AND course_code='$s1b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
	{
	$joinnx=$row['roll_no'];
	 $m_id=$row['id'];
	 $m_email=$row['email'];
	 $m_phone=$row['mobile'];
	 $f_name=$row['f_name'];
	 $rec_sms=$row['rec_sms'];
	 $rec_email=$row['rec_email'];
	 
	 $detained2 = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$m_id' AND course_id='$sub1'"));
	 if($detained2==1)
{
    echo '<p> Z - '.($anc=$x * $n_colum + $inb). " - " .$joinnx.' Detained </p>';

mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name,is_detain) values('$m_id','$anc','$edates','$shiftday','$hno','$joinnx','$sub1','1')");

}
else{

 echo '<p> Z - '.($snom=$x * $n_colum + $inb). " - " .$joinnx.'  ';
$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub1'");
$yesub1=1;
	if($is_email ==1)
		{
		if($m_email !=="")
			{
			if($rec_email==1)
				{				
				    
				include("../function/send_mail.php");
				}
			}
		}


	if($is_sms ==1)
		{
		if($m_phone !=="")
			{
			if($rec_sms==1)
				{
				include("../function/send_sms.php");
				}
			}
		}
		echo '</p>';	
		mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name) values('$m_id','$snom','$edates','$shiftday','$hno','$joinnx','$sub1')");
	}

}

}
	$inb=$inb+3;
	
	echo"\n\n --------------";
	
//end First row arrangement



//for second row arrangement

for ($x = 0; $x<$n_row; $x++) {
$time_table = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinnn' AND m_type='3' AND a_year='$s2y' AND course_code='$s2b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
	{
	$joinnn=$row['roll_no'];
	 $m_id=$row['id'];
	 $m_email=$row['email'];
	 $m_phone=$row['mobile'];
	 $f_name=$row['f_name'];
	 $rec_sms=$row['rec_sms'];
	 $rec_email=$row['rec_email'];
	 
	 $detained2 = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$m_id' AND course_id='$sub2'"));
	 if($detained2==1)
{
    echo '<p> Y - '.($anc=$x * $n_colum + $inbn). " - " .$joinnn.' Detained </p>';

mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name,is_detain) values('$m_id','$anc','$edates','$shiftday','$hno','$joinnn','$sub2','1')");

}
else{
$yesub2=1;
 echo '<p> Y - '.($snom=$x * $n_colum + $inbn). " - " .$joinnn.'  ';
$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub2'");

	if($is_email ==1)
		{
		if($m_email !=="")
			{
			if($rec_email==1)
				{				
				include("../function/send_mail.php");
				}
			}
		}


	if($is_sms ==1)
		{
		if($m_phone !=="")
			{
			if($rec_sms==1)
				{
				include("../function/send_sms.php");
				}
			}
		}
		echo '</p>';	
		mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name) values('$m_id','$snom','$edates','$shiftday','$hno','$joinnn','$sub2')");
	}

}

}	
	$inbn=$inbn+3;
	
	echo"\n\n --------------";
	
//end second row arrangement




//for Third row arrangement

for ($x = 0; $x<$n_row; $x++) {

$time_tablev = mysql_query("SELECT * FROM members_table WHERE roll_no>'$joinn' AND m_type='3' AND a_year='$s3y' AND course_code='$s3b' ORDER BY `members_table`.`roll_no` ASC limit 1");
	while($rovw = mysql_fetch_array($time_tablev, MYSQL_BOTH))
	{
	$joinn=$rovw['roll_no'];
	$m_id=$rovw['id'];
	 $m_email=$rovw['email'];
	 $m_phone=$rovw['mobile'];
	 $f_name=$rovw['f_name'];
	 $rec_sms=$rovw['rec_sms'];
	 $rec_email=$rovw['rec_email'];

$detained3 = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$m_id' AND course_id='$sub3'"));

	if($detained3==1)
{
    echo '<p> X - '.($ancn=$x * $n_colum + $inbm). " - " .$joinn.' Detained </p>';
	mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name,is_detain) values('$m_id','$ancn','$edates','$shiftday','$hno','$joinn','$sub3','1')");

}
else
{ 
    $yesub3=1;
    echo '<p> X - '.($ancn=$x * $n_colum + $inbm). " - " .$joinn.' </p>';
$stid = mysql_query("SELECT * FROM time_table WHERE  id='$sub3'");

	if($is_email ==1)
		{
		if($m_email !=="")
			{
			if($rec_email==1)
				{				
				include("../function/send_mail.php");
				}
			}
		}


	if($is_sms ==1)
		{
		if($m_phone !=="")
			{
			if($rec_sms==1)
				{
				include("../function/send_sms.php");
				}
			}
		}
		echo '</p>';	
		mysql_query("insert into seat(userid,number,date,shift_day,hall_id,roll_no,ex_name) values('$m_id','$ancn','$edates','$shiftday','$hno','$joinn','$sub3')");
	}


	
	}
	
	}
	$inbm=$inbm+3;
	
	echo"\n\n --------------";
	

 }

 echo $a; 

}


//end of 1X row arrangement





















?>