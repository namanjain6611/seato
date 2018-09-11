


						<?php 
						error_reporting(0);


include("../db/dbconnection.php");

 $busnum=$_GET['seats'];

$result = mysql_query("SELECT * FROM class_hall WHERE id='$busnum'");
while($row = mysql_fetch_array($result))
	{
		$numofseats=$row['seat_no'];
		$busid=$row['id'];
		}
						$buseat=$numofseats;
				
								 $femi ="array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,00,0,00,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,00,0,00,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,00,0,00,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
								
							 $date = $_POST['date'];
							 $var = $date;
$date = str_replace('/', '-', $var);
$date1=date('Y-m-d', strtotime($date));
			

							$query = "select * from seat where date = '$date1' AND bus_id='$busid'";
							$result = mysql_query($query);
							if ( mysql_num_rows($result) == 0 )
							{
				
								for($i=1; $i<$buseat; $i++)
								{
								
								
							
											echo "<li>";
											echo "<span class='glyphicon-class'>";
												echo "<img src='../images/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
												echo "Seat  ".$i;
												echo "</span>";
										
										echo "</li>";
								
														
								}
							}
							else
							{
								$seats = $femi;
								while($row = mysql_fetch_array($result))
								{
									$pnr = explode("-", $row['PNR']);
									$pnr[3] = intval($pnr[3]) - 1;
									$seats[$pnr[3]] = 1;
								}
								for($i=1; $i<$buseat; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a  class='thumbnail' title='Booked'>";
												echo "<img src='../images/available.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch' disabled/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a  class='thumbnail' title='Available'>";
												echo "<img src='../images/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
								}									
								
							}
						?>
                        <label>
                        <input type="hidden" name="busno" value="<?php echo $buseat;?>" />
                        <input type="hidden" name="busid" value="<?php echo $busid;?>" />

                        <input name="doj" type="hidden" id="doj" value="<?php echo $date1;?>" />
                        </label>
                        <ul class="thumbnails">
        </ul>
        <center>
        <table width="257" border="0">
          <tr>
            <td width="49"><img src="../images/available.png" width="32" height="32" /></td>
            <td width="156">Avaliable Seat </td>
            <td width="38">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="../images/occupied.png" width="32" height="32" /></td>
            <td>Booked Seat </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 Seat.');
				return false;
			}
		</script>
        <br />
          <br />
          <button type="submit" class="btn btn-info"> <i class="icon-ok icon-white"></i> Submit </button>
          <button type="reset" class="btn"> 
          <div align="justify"><i class="icon-refresh icon-black"></i> Clear </div>
          </button>
          <a href="./index.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
        </center>
    