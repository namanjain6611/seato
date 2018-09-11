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

    <title><?php echo $display['site_name'] ?> | Admin Dashboard</title>

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
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count"><?php $m = date("Y-m-d H:i:s");
				   echo $totaluser = mysql_num_rows(mysql_query("SELECT * FROM  members_table WHERE m_type='3' ORDER BY `members_table`.`id` DESC")); ?></div>
                  <h3>No Of Student</h3>
                  <p>.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php $m = date("Y-m-d H:i:s");
				   echo $totaluser = mysql_num_rows(mysql_query("SELECT * FROM  time_table ORDER BY `time_table`.`id` DESC")); ?></div>
                  <h3>Total Time Table</h3>
                  <p>.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php
				   echo $newmail = mysql_num_rows(mysql_query("SELECT * FROM complain WHERE reply_to='1' AND msg_read='0' ")); ?></div>
                  <h3>New Mail</h3>
                  <p>.</p>
                </div>
              </div>
          <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Notifications <small>Events</small></h2>
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
				  <?php
 $notify = mysql_query("SELECT * FROM notifications WHERE n_type='5' ORDER BY `notifications`.`date` ASC");
while($row = mysql_fetch_array($notify, MYSQL_BOTH))
{
?>
<article class="media event">
                      <a class="pull-left date">
                        <p class="month"><?php $time=strtotime($datetime);
echo $mothin=date("M",$time);
$dayt=date("d",$time)
?></p>
                        <p class="day"><?php echo $dayt;?></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="notification?nid=<?php echo $row['id'];?>"><?php echo $row['n_head'];?></a>
                        <p><?php echo substr($row['msg'], 0, 60)?>.....</p>
                      </div>
                    </article>
                    <?php }?>
                
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Upcomming Exams<small></small></h2>
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
                    
					<?php
 $time_table = mysql_query("SELECT * FROM time_table WHERE college_id='$_SESSION[college_id]' AND course_id='$_SESSION[course_code]' AND date>='$m' ORDER BY `time_table`.`date` ASC limit 5");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
?>
					<article class="media event">
                      <a class="pull-left date">
                       <p class="month"><?php $time=strtotime($datetime);
echo $mothin=date("M",$time);
$dayt=date("d",$time)
?></p>
                        <p class="day"><?php echo $dayt;?></p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="notification?nid=<?php echo $row['id'];?>"><?php echo $row['course_code'];?></a>
                        <p><strong><?php echo $row['sub_name'];?></strong> paper Will be writen on <?php echo $row['date'];?>  <a href="seat.php<?php echo $row['id'];?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View seat </a> ......</p>
                      </div>
                    </article>
                    <?php }?>
                     </div>
                  </div>
                </div>
              </div>

            <div class="col-md-4"></div>
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
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
