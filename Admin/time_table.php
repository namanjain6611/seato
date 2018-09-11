<?php 

ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");
if(!($_SESSION["adminid"]))
{
		header("Location: ../index.php");
}
$query = mysql_query("SELECT * FROM settings WHERE id = '1'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	


if(isset($_POST['sumb']))
{
mysql_query("insert into time_table(course_code,sub_name,course_id,college_id,date,year) values('$_POST[cname]','$_POST[sname]','$_POST[bookID]','$_POST[catID]','$_POST[edate]','$_POST[year]')");


$error="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Well done! You successfully Added an Exam record to the Database .</div>";

}


if(isset($_GET['delete']))
{
 mysql_query("DELETE FROM time_table WHERE id = '$_GET[delete]'");

$error="<div class='alert alert-danger alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Well done! You successfully Delete a Student record to From the Database .</div>";

}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $display['site_name'] ?> | Student Time Table</title>
<script type="text/javascript" src="../js/saslideshow.js"></script>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

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
                <h3>Exam Hall</h3>
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
<?php echo $error; ?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Exam Time Table <small>session</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  
				  <?php if(isset($_GET['edit_hall']))
{?>
				  <div class="x_content">
                    <br>
 <form id="demo-form2" data-parsley-validate="" method="post" action="?" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hall Name/ No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<?php $college = mysql_query("SELECT * FROM college");
while($rowx = mysql_fetch_array($college, MYSQL_BOTH))
{
$hall=$rowx['college_name'];
$seat=$rowx['college_name_web'];

$college=$rowx['college_id'];
}
?>
                          <input type="text" id="cname" name="cname" value="<?php echo $hall;?>" required="required" class="form-control col-md-7 col-xs-12">
						  <input type="hidden" id="hall" name="hall_id" value="<?php echo $_GET['edit_hall']?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No Of Seat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="seat" name="cweb" required="required" value="<?php echo $seat;?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="?" ><button class="btn btn-primary" type="button">Cancel</button></a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="updat" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
                  </div>
				  
				  <?php } else {?>
				  
				  
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">View Time Table</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Create Exam</a>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Course Code</th>
                          <th>Subject Name</th>
                          <th>Date</th>
						   <th>Course</th>
						    <th>Student year</th>
						   <th>College</th>

<th></th>                        
                        </tr>
                      </thead>


                      <tbody><?php
$time_table = mysql_query("SELECT * FROM time_table  ORDER BY `time_table`.`date` ASC");while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
?>
                        <tr>
                          <td><?php echo $row['course_code'];?></td>
                          <td><?php echo $row['sub_name'];?></td>
                          <td><?php echo $row['date'];?></td>
						  <td><?php $course_id=$row['course_id'];
						   $college_id=$row['college_id'];
						   $course_co = mysql_query("SELECT * FROM course WHERE course_id='$course_id'");
while($rowx = mysql_fetch_array($course_co, MYSQL_BOTH))
{
echo $course_name=$rowx['course_name'];
}
$branch_co = mysql_query("SELECT * FROM college WHERE id='$college_id'");
while($rowy = mysql_fetch_array($branch_co, MYSQL_BOTH))
{
 $college_name=$rowy['college_name'];
 
};?></td> <td><?php echo $row['year'];?></td>
						  <td><?php echo $college_name;?></td>
						   <td><script type="text/javascript">
    function confirmation() {
      return confirm('Are you sure you want to do Delete This Record For Database?');
    }
</script>

<a href="?delete=<?php echo $row['id'];?>" onclick="return confirmation()"> <button id="send" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button> </a></td>
                         
                        </tr><?php }?>
                      </tbody>
                    </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
						<h2>Exam  <small>.</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  
				  
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cname" name="cname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Subject Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="sname" name="sname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Exam Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="edate" name="edate" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">College Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name='catID' id='catID' required="required" onChange="sync()" class="form-control col-md-7 col-xs-12"><option value=''>Select</option>
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
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Course Name	<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name='bookID' id='bookID' onChange="sync()" class="form-control col-md-7 col-xs-12" required ></select>
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Student year <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name='year' id='year	' required="required" onChange="sync()" class="form-control col-md-7 col-xs-12"><option value=''>Select</option>
								  <option value="2014">2014</option>
                                   <option value="2014">2015</option>
                                    <option value="2016">2016</option>
                                     <option value="2017">2017</option>
									 <option value="2017">2018</option>
                                  </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><button class="btn btn-primary" type="button">Cancel</button></a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="sumb" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div><?php }?>
                </div>
              </div>
            </div>
                        </div>
                        
                      </div>
                    </div>
</div>
                  </div>
                </div>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>