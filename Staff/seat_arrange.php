	<?php 

ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");

if(!($_SESSION["staffid"]))
{
		header("Location: ../index.php");
}
$query = mysql_query("SELECT * FROM settings WHERE id = '1'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
			
 $hname=$_GET['hname'];
 
 $result = mysql_query("SELECT * FROM class_hall WHERE id='$hname'");
while($row = mysql_fetch_array($result))
	{
		$n_colum=$row['n_colum'];
		$n_row=$row['n_row'];
		$hname=$row['name'];
		$branch_code=$row['college_id'];
		}
$seatpat=$_POST['seatpat'];
$seatpatn=$_POST['seatpat'];
$seatscrip=$_POST['seatpat'];


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $display['site_name'] ?> | Student Dashboard</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<script type="text/javascript" src="../js/saslideshow.js"></script>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="index.php" class="site_title"><img src="../images/<?php echo $display['site_logo'] ?>" width="50" height="45"> <span><?php echo $display['site_name'] ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
          <?php include("view/p_menu.tpl");?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
                      <?php include("view/menu.tpl");?>

            <!-- /sidebar menu -->
 <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
           
          </div>
        </div>

        <!-- top navigation -->
                   <?php include("view/top_nav.tpl");?>

        <!-- /top navigation -->

        <!-- page content -->
       
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12"></div>
            </div>
<div class="x_panel">
                  <div class="x_title">
                    <h2>Seat Setting Style  <small>different form elements</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  <div class="x_content">
                    
                    <div>
                      <div class="starrr stars"></div>
                      The Selected Hall Has the Following Details 
                    </div>

                    <p><strong><?php echo $n_colum;?></strong> Colomns And <strong><?php echo $n_row;?> </strong> Rows and The total Number of <strong><?php echo $n_row*$n_colum;?></strong> Seats Please Select The Pattern of Class Or Branch To be Arrange on The Colums </p>
                 
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" action="" method="post" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Seating Pattern <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="seatpat" onchang="location = this.options[this.selectedIndex].value;"  required="required" class="form-control col-md-7 col-xs-12">
    <option value="">Please select</option>
    <option value="1">1X<?php echo $n_colum;?></option>
	<?php if($even = ($n_colum % 2 == 0) & $n_colum>1)
	{
	?>
    <option value="2">2X<?php echo $n_colum;?></option>
	<?php }?>
  
		 <?php if($even = ($n_colum % 3 == 0))
	{
	?>
    <option value="4">3X<?php echo $n_colum;?></option>
	<?php }?>
	
	
	
</select>​
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div> 
            <div class="row">
			
<?php if($seatscrip==4)
{
?>			
			<script language="javascript" type="text/javascript">
function check()
{

    if (test.yearadd.value == test.yearaddx.value && test.bookID.value == test.bookxID.value) {
    
	alert("SLOT A and B Are the Same");
    return false; 
	}
	  if (test.yearaddx.value == test.yearaddxx.value && test.bookxID.value == test.bookxIDD.value) {
    
	alert("SLOT B and C Are the Same");
    return false; 
	}
  if (test.yearadd.value == test.yearaddxx.value && test.bookID.value == test.bookxIDD.value) {
    
	alert("SLOT A and C Are the Same");
    return false; 
	}
}
</script>

<?php }?>

<?php if($seatscrip<4)
{
?>			
			<script language="javascript" type="text/javascript">
function check()
{


	  if (test.yearaddx.value == test.yearaddxx.value && test.bookxID.value == test.bookxIDD.value) {
    
	alert("SLOT A and B Are the Same");
    return false; 
	}
}
</script>

<?php }?>



                    <form name="test" onSubmit="return check(this);" class="form-horizontal form-label-left input_mask" method="get" action="act.php">
					<input type="hidden" id="seatype" name="seatype" value="<?php echo $seatpatn; ?>">
					<input type="hidden" id="hname" name="hname" value="<?php echo $_GET['hname']; ?>">
					<input type="hidden" id="edates" name="edates" value="<?php echo $_GET['edates']; ?>">
					<input type="hidden" id="shiftday" name="shiftday" value="<?php echo $_GET['shiftday']; ?>">
					
					
					
					
			
			<?php 
			  if($seatpat>=3 )
			  
			  {
			  ?>
              <div class="col-md-6 col-xs-12">
			 
                <div class="x_panel">
                  <div class="x_title">
                    <h2>SLOT A<small>First Row</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />




                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">College Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name='catID' id='catID' required="required"  class="form-control col-md-7 col-xs-12"><option value=''>Select</option>
<?php $result = mysql_query("SELECT * FROM college");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['college_name'];
								echo '</option>';
							}
						?>
     </select>
	 
	 <script type="text/javascript">
$(function() {
 
 $("#catID").bind("change", function() {
     $.ajax({
         type: "GET", 
         url: "change.php",
         data: "catID="+$("#catID").val(),
         success: function(html) {
             $("#bookID").html(html);
         }
     });
 });
			
 
});
</script>
           

<script type="text/javascript">
$(function() {
 var name = $('#add').attr("data_id");

	  
 $("#yearadd").bind("change", function() {
      var status = $("#bookID").val();
	   var yearadd = $("#yearadd").val();
    var name = "Ronny";
    $.ajax({
      type: "POST",
      url: "changes.php",
      data: {'cattID': status, 'yearadd': yearadd},
         success: function(html) {
             $("#bookkID").html(html);
         }
     });
 });
			
 
});
</script>


<script type="text/javascript">
$(function() {
 var name = $('#add').attr("data_id");

	  
 $("#yearadd").bind("change", function() {
      var status = $("#bookID").val();
	   var yearadd = $("#yearadd").val();
    var name = "Ronny";
    $.ajax({
      type: "POST",
      url: "changexam.php",
      data: {'cattID': status, 'yearadd': yearadd},
         success: function(html) {
             $("#bookknID").html(html);
         }
     });
 });
			
 
});
</script>



                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
 <select name='bookID' id='bookID' class="form-control col-md-7 col-xs-12" required ></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Year Of Admission </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						<select name="yearadd" id="yearadd" class="form-control" required> 
						<option value="">Select Sessions</option>     
						<option value="2013" >2013</option>
						<option value="2014" >2014</option>  
						<option value="2015" >2015</option>
						<option value="2016" >2016</option> 
						<option value="2017" >2017</option>
						<option value="2018" >2017</option>
						</select>                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name='bookknID' id='bookknID' onChange="sync()" class="form-control col-md-7 col-xs-12"  ></select>
                        </div>
                      </div>
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Starting Roll.No                          </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
    			  <select name='bookkID' id='bookkID' onChange="sync()" class="form-control col-md-7 col-xs-12" ></select>

                        </div>
                      </div>
                      <div class="ln_solid"></div>
                   
                    
                      </div>
                </div>

              </div><?php }?>
               
            
                 
						<?php
			  if($seatpat>3 OR $seatpat>=2)
			  
			  {
			  ?>
					<div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php if($seatpatn==2) {echo "SLOT A";} else{echo "SLOT B";} ?> <small><?php if($seatpatn==2) {echo "First Row";} else{echo "Second Row";} ?> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <div class="form-horizontal form-label-left input_mask" action="sss">

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">College Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">

<select name='catxID' id='catxID' required="required"  class="form-control col-md-7 col-xs-12"><option value=''>Select</option>
<?php $result = mysql_query("SELECT * FROM college");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['college_name'];
								echo '</option>';
							}
						?> </select>
	 <script type="text/javascript">
$(function() {
 
 $("#catxID").bind("change", function() {
     $.ajax({
         type: "GET", 
         url: "changex.php",
         data: "catID="+$("#catxID").val(),
         success: function(html) {
             $("#bookxID").html(html);
         }
     });
 });
			
 
});
</script>
           

<script type="text/javascript">
$(function() {
 var name = $('#add').attr("data_id");

	  
 $("#yearaddx").bind("change", function() {
      var status = $("#bookxID").val();
	   var yearadd = $("#yearaddx").val();
    var name = "Ronny";
    $.ajax({
      type: "POST",
      url: "changesx.php",
      data: {'cattID': status, 'yearadd': yearadd},
         success: function(html) {
             $("#bookkxID").html(html);
         }
     });
 });
			
 
});
</script>

<script type="text/javascript">
$(function() {
 var name = $('#add').attr("data_id");

	  
 $("#yearaddx").bind("change", function() {
      var status = $("#bookxID").val();
	   var yearadd = $("#yearaddx").val();
    var name = "Ronny";
    $.ajax({
      type: "POST",
      url: "changexam.php",
      data: {'cattID': status, 'yearadd': yearadd},
         success: function(html) {
             $("#ebookkxID").html(html);
         }
     });
 });
			
 
});
</script>


                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
 <select name="bookxID" id="bookxID" class="form-control col-md-7 col-xs-12" required=""></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Year Of Admission </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						<select name="yearaddx" id="yearaddx" class="form-control" required=""> 
						<option value="">Select Sessions</option>     
						<option value="2013">2013</option>
						<option value="2014">2014</option>  
						<option value="2015">2015</option>
						<option value="2016">2016</option> 
						<option value="2017">2017</option></select>                          
                        </div>
                      </div>
					                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name='ebookkxID' id='ebookkxID' onChange="sync()" class="form-control col-md-7 col-xs-12"  ></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Starting Roll.No
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="bookkxID" id="bookkxID" onChange="sync()" class="form-control col-md-7 col-xs-12"></select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                   	
					  
					  
					  

                    
                  </div>
                </div>

              </div>
                  </div>
				  
				  
                 <?php }?>
					
					<?php 
			  if($seatpat>3 OR $seatpat>2 OR $seatpat>=1)
			  
			  {
			  ?>
					<div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php if($seatpatn>=4) {echo "SLOT C";} elseif($seatpatn>=2){echo "SLOT B";} else{echo "SLOT A";} ?><small><?php if($seatpatn>=4) {echo "Third Row";} elseif($seatpatn>=2){echo "Second Row";} else{echo "First Row";} ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <div class="form-horizontal form-label-left input_mask" action="sss">

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">College Name	</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                       <select name='catxIDD' id='catxIDD' required="required"  class="form-control col-md-7 col-xs-12"><option value=''>Select</option>
<?php $result = mysql_query("SELECT * FROM college");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['college_name'];
								echo '</option>';
							}
						?> </select>
	 <script type="text/javascript">
$(function() {
 
 $("#catxIDD").bind("change", function() {
     $.ajax({
         type: "GET", 
         url: "changex.php",
         data: "catID="+$("#catxIDD").val(),
         success: function(html) {
             $("#bookxIDD").html(html);
         }
     });
 });
			
 
});
</script>
           

<script type="text/javascript">
$(function() {
 var name = $('#add').attr("data_id");

	  
 $("#yearaddxx").bind("change", function() {
      var status = $("#bookxIDD").val();
	   var yearadd = $("#yearaddxx").val();
    var name = "Ronny";
    $.ajax({
      type: "POST",
      url: "changesx.php",
      data: {'cattID': status, 'yearadd': yearadd},
         success: function(html) {
             $("#bookkxIDD").html(html);
         }
     });
 });
			
 
});
</script>

<script type="text/javascript">
$(function() {
 var name = $('#add').attr("data_id");

	  
 $("#yearaddxx").bind("change", function() {
      var status = $("#bookxIDD").val();
	   var yearadd = $("#yearaddxx").val();
    var name = "Ronny";
    $.ajax({
      type: "POST",
      url: "changexam.php",
      data: {'cattID': status, 'yearadd': yearadd},
         success: function(html) {
             $("#boonknID").html(html);
         }
     });
 });
			
 
});
</script>


                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
 <select name="bookxIDD" id="bookxIDD" class="form-control col-md-7 col-xs-12" required=""></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Year Of Admission </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						<select name="yearaddxx" id="yearaddxx" class="form-control" > 
						<option value="">Select Sessions</option>     
						<option value="2013">2013</option>
						<option value="2014">2014</option>  
						<option value="2015">2015</option>
						<option value="2016">2016</option> 
						<option value="2017">2017</option></select>                          
                        </div>
                      </div>
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name='boonknID' id='boonknID' onChange="sync()" class="form-control col-md-7 col-xs-12"  ></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="bookkxIDD" id="bookkxIDD" onChange="sync()" class="form-control col-md-7 col-xs-12" ></select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
						   <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                </div>
				</div>
                </div>
				</div>
				   <?php }?>
                </div>
				</div>
                </div>

              
    
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           <?php echo $display['dev_name'] ?> <a href="http://<?php echo $display['dev_web'] ?>"> <?php echo $display['dev_web'] ?></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
