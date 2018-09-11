<?php
include("../db/dbconnection.php");

 $rnum=$_GET['bookkID'];
  $subname=$_GET['bookknID'];
 
 $resultc = mysql_query("SELECT * FROM seat WHERE roll_no='$rnum' AND ex_name='$subname'");
while($row = mysql_fetch_array($resultc))
	{
		 $hall_id=$row['hall_id'];
		  $edate=$row['date'];
		   $shift_day=$row['shift_day'];
		    $number=$row['number'];
			$is_detain=$row['is_detain'];
		}
 
 $result = mysql_query("SELECT * FROM class_hall WHERE id='$hall_id'");
while($row = mysql_fetch_array($result))
	{
		$n_colum=$row['n_colum'];
		$n_row=$row['n_row'];
		$hname=$row['name'];
		$branch_code=$row['college_id'];
		}
		
		 $detained = mysql_num_rows(mysql_query("SELECT * FROM seat WHERE roll_no='$rnum' AND ex_name='$subname'"));
if($detained<1)
{
echo $emsg="<div class='alert alert-info alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Sorry!</strong> Exam Date and Seat has not been schedule yet check back after sometime .
                  </div>";
				  }else{

?>

<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.style2 {color: #FF0000}
-->
</style>

<table width="335" border="0" align="center">
  <tr>
    <td width="29">&nbsp;</td>
    <td width="173"><div align="center" class="style1">Hall Detail</div></td>
    <td width="119">&nbsp;</td>
  </tr>
  <tr>
    <td width="29" height="48">&nbsp;</td>
    <td width="173">Hall Name /No  </td>
    <td><?php echo $hname;?></td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>Hall Location  </td>
    <td><?php   $branch_code = mysql_query("SELECT * FROM college WHERE id='$branch_code'");
while($rowx = mysql_fetch_array($branch_code, MYSQL_BOTH))
{
echo $college_name=$rowx['college_name'];
}
?>&nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>Exam Date </td>
    <td><?php   echo $edate;
?>
      &nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>Shift Type </td>
    <td><?php   if($shift_day=1)
	{
	echo "First Shit";
	
	}
	else
	{
	echo "Second Shit";
	}
?>
      &nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>Seat Number  </td>
    <td><?php   if($is_detain==1)
	{
	echo "<span class='style2'>Student is Detained</span>";
	}
	else {
	echo "<span class='style2'>";
	echo $number;
	echo" </span>";
	}
?>
      &nbsp;</td>
  </tr>
</table>

<?php
   $col = $n_colum; //Dynamic number for rows
   $row = $n_row; // Dynamic number for columns
   echo "<table border='0' class='table' >";
  
   for($i=0;$i<$row;$i++){
     echo "<tr>";
      for($j=0;$j<$col;$j++){
        echo "<td>";
	
											
												echo "<div align='center'><img src='../images/available.png' width='41' height='41' alt='Available Seat'/></div>";
												
						
									
										
        echo "<div align='center'>Seat ";
		echo $n=$i*$col+$j+1;	
		$time_tableb = mysql_query("SELECT * FROM seat WHERE hall_id='$hall_id' AND number='$n' AND roll_no='$rnum'");
	while($ronw = mysql_fetch_array($time_tableb, MYSQL_BOTH))
	{
	 $joinn=$ronw['roll_no'];
	  $detainz=$ronw['is_detain'];
	 
	 	
		 echo "<div align='center'>";
		 if($detainz==1)
		 {
echo"<span class='style2'>Detained</span>";
		}
		else
		{
		echo"<span class='style2'>";
		echo $joinn;
echo"</span>";
		}
		}
				
	 
	 
        echo "</td>";
      }
      echo "</tr>";
  }
  echo "</table>";
}?>