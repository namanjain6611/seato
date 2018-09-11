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


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $display['site_name'] ?> | Student Admit Card</title>

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
                <h3>Upcoming Exams</h3>
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

<div class="x_panel">
               


                    <div class="table-responsive">
<div align="center">
  <table width="1021" border="0">
    <tr>
      <td width="297" rowspan="4"><div align="left"><img src="../images/img.jpg" alt="..." width="100" height="100" >&nbsp;</div></td>
      <td width="416"><div align="center"><strong>School Name </strong></div></td>
      <td width="294" rowspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="32"><div align="center"><strong>ADMIT CAR </strong></div></td>
      </tr>
    <tr>
      <td height="23"><div align="center"><strong>Even Semmester Examination </strong></div></td>
      </tr>
    <tr>
      <td height="46"><div align="center"><strong>Session 2016-17 </strong></div></td>
      </tr>
  </table>
  <table width="1018" border="0">
  <tr>
    <td width="205"><span class="style11"><strong>Name Of Examination </strong></span></td>
    <td width="439"><span class="style11"><strong>:</strong></span></td>
    <td width="347">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style11"><strong>Semester</strong></span></td>
    <td><span class="style11"><strong>:</strong></span></td>
    <td rowspan="7"><div align="right"><img src="../images/img.jpg" alt="..." width="150" height="150"></div></td>
  </tr>
  <tr>
    <td><span class="style11"><strong>Enrolment No. </strong></span></td>
    <td><span class="style11"><strong>:</strong></span></td>
  </tr>
  <tr>
    <td><span class="style11"><strong>Student's Name </strong></span></td>
    <td><span class="style11"><strong>:</strong></span></td>
  </tr>
  <tr>
    <td><span class="style11"><strong>Father's Name </strong></span></td>
    <td><span class="style11"><strong>:</strong></span></td>
  </tr>
  <tr>
    <td><span class="style11"><strong>Mother's Name </strong></span></td>
    <td><span class="style11"><strong>:</strong></span></td>
  </tr>
  <tr>
    <td><span class="style11"><strong>Examination Centre </strong></span></td>
    <td><span class="style11"><strong>:</strong></span></td>
  </tr>
  <tr>
    <td><span class="style11"><strong>Examination</strong></span></td>
    <td><span class="style11"><strong>:</strong></span></td>
  </tr>
</table>
 </p>
</div>
  </div>
							
						
                  </div>
                </div>


<div class="x_panel">
                  <div class="x_title">
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


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>                            </th>
                            <th class="column-title">S/No</th>
                            <th class="column-title">Course Code </th>
                            <th class="column-title">Subject Name</th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Category </th>
                            
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>                            </th>
                          </tr>
                        </thead>

                              
                              
                        <tbody>  <?php
 $time_table = mysql_query("SELECT * FROM time_table WHERE college_id='1' AND course_id='2' ORDER BY `time_table`.`date` ASC limit 2");
while($row = mysql_fetch_array($time_table, MYSQL_BOTH))
{
?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>                            </td>
                            <td class=" ">S/No</td>
                            <td class=" ">Course Code </td>
                            <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                           
                          </tr>
                          

                          </tr> <?php }?>
                        </tbody>
                      </table>
                    
                    </div>
							
						
                  </div>
                </div>


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12"></div>

              <div class="col-md-12 col-sm-12 col-xs-12"></div>

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