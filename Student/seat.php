<?php 

ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");
if(!($_SESSION["studentid"]))
{
		header("Location: ../index.php");
}

$query = mysql_query("SELECT * FROM settings WHERE id = '1'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	


$vid=$_GET['vid'];

$detained = mysql_num_rows(mysql_query("SELECT * FROM  detain_list WHERE member_id='$_SESSION[studentid]' AND course_id='$vid'"));
if($detained>=1)
{
$emsg="<div class='alert alert-info alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Sorry!</strong> You have been Detain, You can not Participate in the Subject.
                  </div>";
				  }

$result = mysql_query("SELECT * FROM seat WHERE ex_name='$vid' AND userid='$_SESSION[studentid]'");
while($row = mysql_fetch_array($result))
	{
		$snom=$row['number'];
		$hname=$row['hall_id'];
		
	}

$resultb = mysql_query("SELECT * FROM class_hall WHERE id='$hname'");
while($row = mysql_fetch_array($resultb))
	{
		$hname=$row['name'];
		$branch_code=$row['college_id'];
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

    <title><?php echo $display['site_name'] ?> | Student Dashboard</title>

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
                <h3>Seat Location</h3>
              </div>




           <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Details	</h2>
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
				  
				  <?php if($detained>=1){
				 echo $emsg; } elseif($snom>0) {?>
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
    <td>Seat No: </td>
    <td><?php echo $snom;?>&nbsp;</td>
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
</table><?php }else{?>
<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Sorry!</strong> No seat has Been Allocated or Assigned to your Yet, Please Check back After Sometime.
                  </div>
				  <?php }?>
                  </div>
                </div>
              </div>
                    <!-- end of accordion -->


                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="clearfix"></div>
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

    <div id="custom_notifications" class="custom-notifications dsp_none">
      <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
      </ul>
      <div class="clearfix"></div>
      <div id="notif-group" class="tabbed_notifications"></div>
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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>