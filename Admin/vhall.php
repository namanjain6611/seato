<?php
include("../db/dbconnection.php");

 $seat_id=$_GET['hname'];

 $edates=$_GET['edates'];
 $shiftday=$_GET['shiftday'];

 
 $result = mysql_query("SELECT * FROM class_hall WHERE id='$seat_id'");
while($row = mysql_fetch_array($result))
	{
		$n_colum=$row['n_colum'];
		$n_row=$row['n_row'];
		$hname=$row['name'];
		$branch_code=$row['college_id'];
		}
$n=1;
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

<table width="257" border="0" align="center">
  <tr>
    <td width="49">&nbsp;</td>
    <td width="156"><div align="center" class="style1">Hall Detail</div></td>
    <td width="38">&nbsp;</td>
  </tr>
  <tr>
    <td width="49" height="48">&nbsp;</td>
    <td width="156">Hall Name /No  </td>
    <td><?php echo $hname;?></td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>Number of Seats </td>
    <td><?php echo $n_colum*$n_row;?>&nbsp;</td>
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
    <td height="53">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
		$time_tableb = mysql_query("SELECT * FROM seat WHERE hall_id='$seat_id' AND date='$edates' AND shift_day='$shiftday' AND number='$n'");
	while($ronw = mysql_fetch_array($time_tableb, MYSQL_BOTH))
	{
	 $joinn=$ronw['roll_no'];
	  $detainz=$ronw['is_detain'];
	 
	 	
		 echo "<div align='center'>";
		 if($detainz==1)
		 {
echo"<span class='style2'>Detained</span>";
	echo $joinn;
		}
		else
		{
		echo $joinn;

		}
		}
				
	 
	 
        echo "</td>";
      }
      echo "</tr>";
  }
  echo "</table>";
?>