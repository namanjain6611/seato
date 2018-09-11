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
	  
    <title><?php echo $display['site_name'] ?> |  Search Seat</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
                <h3>Personal Setting</h3>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
			  <?php echo $success;?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Settings <small>.</small></h2>
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
                    <form id="demo-form2" method="get" action="seat_view.php?" data-parsley-validate class="form-horizontal form-label-left">

     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">College Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
 <select name='bookID' id='bookID' class="form-control col-md-7 col-xs-12" required ></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">year Of Admission
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Subject
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name='bookknID' id='bookknID' onChange="sync()" class="form-control col-md-7 col-xs-12" required  ></select>
                        </div>
                      </div>
					    <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Roll number
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
    			  <select name='bookkID' id='bookkID' onChange="sync()" class="form-control col-md-7 col-xs-12" required ></select>
				  <div id="alreana"></div>

                        </div>
                      </div>
                  
                 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="update" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
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
