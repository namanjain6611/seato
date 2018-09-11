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
                <h3>Time Table</h3>
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

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Upcoming Exam Time Table <small>Student</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                     
Print Your exam Time table to know the date and shedule of ur exams and date with seat allocated To you.
                    </p>
									

                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
<th width="11%">Hall Name / No</th>
						<th width="10%">No Of Seat</th>
						<th width="13%">No Of Column</th>
                          <th width="13%">Hall Location</th>
						   <th width="10%">Exam date</th>
						    <th width="16%">Shift</th>
						 
						  <th width="27%">Action</th>                        
                        
                        </tr>
                      </thead>


                      <tbody><?php
$time_table = mysql_query("SELECT * FROM class_hall ORDER BY `class_hall`.`id` ASC");while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
?>
                        <tr><form name="checkn<?php echo $row['id'];?>" onSubmit="return validate<?php echo $row['id'];?>()" action="seat_views.php?sid=<?php echo $row['name'];?>" method="get">
						 <td><?php echo $row['name'];?></td>
						 <td><?php echo $row['seat_no'];?></td>
						  <td><?php echo $row['n_colum'];?></td>
                
<td><?php $branch_code=$row['college_id'];  $branch_code = mysql_query("SELECT * FROM college WHERE id='$branch_code'");
while($rowx = mysql_fetch_array($branch_code, MYSQL_BOTH))
{
echo $college_name=$rowx['college_name'];
}
?></td>


<script type="text/javascript">
$(function() {

	  
 $("#shiftday<?php echo $row['id'];?>").bind("change", function() {
      var status = $("#edate<?php echo $row['id'];?>").val();
	   var yearadd = $("#shiftday<?php echo $row['id'];?>").val();
	    var shiday = $("#shiday<?php echo $row['id'];?>").val();
		
	   
    $.ajax({
      type: "POST",
      url: "seatcheck.php",
      data: {'cattID': status, 'yearadd': yearadd,'shiday': shiday},
         success: function(html) {
             $("#bookkID<?php echo $row['id'];?>").html(html);
         }
     });
 });
			
 
});
</script>

<script type="text/javascript">
<!--
function validate<?php echo $row['id'];?>(){
    if ((document.checkn<?php echo $row['id'];?>.bookkID<?php echo $row['id'];?>.value<1)){
        alert("No Seat Assign Yet, First Assign Seat before Viewing")
        return false
    }
    else
        return true
}
//-->
</script>




<td><input name="edates"  id="edate<?php echo $row['id'];?>" class="form-control col-md-7 col-xs-12"  value="" required type="date">
<input name="shiday"  id="shiday<?php echo $row['id'];?>" class="form-control col-md-7 col-xs-12"  value="<?php echo $row['id'];?>" required type="hidden"></td>
<td><select name="shiftday" id="shiftday<?php echo $row['id'];?>" class="form-control col-md-7 col-xs-12" required>
<option value="">Select Shift</option>
<option value="1">First</option>
<option value="2">Second</option>
     <input type="hidden" name="hname" id="hname" value="<?php echo $row['id'];?>">     
</select> </div></td>
                         
<td><select name='bookkID' style="visibility: hidden" id='bookkID<?php echo $row['id'];?>' onChange="sync()" class="form-control col-md-7 col-xs-12" required ></select><button id="send" type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> View Seats</button></td>
                         
                        </tr></form><?php }?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12"></div>
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