<?php 

ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");
if(!($_SESSION["adminid"]))
{
		header("Location: ../index.php");
}

if(isset($_POST['update'])) 
{

mysql_query("UPDATE settings SET site_name='$_POST[sitename]' WHERE  id='1'");
mysql_query("UPDATE settings SET site_full_name='$_POST[sfname]' WHERE  id='1'");
mysql_query("UPDATE settings SET dev_name='$_POST[dname]' WHERE  id='1'");
mysql_query("UPDATE settings SET dev_web='$_POST[dweb]' WHERE  id='1'");

  $success ="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Profile Details Updated Successfully </div>" ;
}



if(isset($_POST['smsupdate'])) 
{

mysql_query("UPDATE settings SET sms_user='$_POST[sms_user]' WHERE  id='1'");
mysql_query("UPDATE settings SET sms_pass='$_POST[sms_pass]' WHERE  id='1'");
mysql_query("UPDATE settings SET sms_api='$_POST[sms_api]' WHERE  id='1'");
mysql_query("UPDATE settings SET is_email='$_POST[is_email]' WHERE  id='1'");
mysql_query("UPDATE settings SET is_sms='$_POST[is_sms]' WHERE  id='1'");
mysql_query("UPDATE settings SET site_contact='$_POST[site_contact]' WHERE  id='1'");

  $success ="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Profile Details Updated Successfully </div>" ;
}




 $useract = mysql_query("SELECT * FROM settings WHERE id='1'");
while($row = mysql_fetch_array($useract, MYSQL_BOTH))
{
$site_name=$row['site_name'];
$site_full_name=$row['site_full_name'];
$dev_name=$row['dev_name'];
$dev_web=$row['dev_web'];
$is_sms=$row['is_sms'];
$is_email=$row['is_email'];
$sms_user=$row['sms_user'];
$sms_api=$row['sms_api'];
$sms_pass=$row['sms_pass'];
$site_contact=$row['site_contact'];


}




$query = mysql_query("SELECT * FROM settings WHERE id = '1'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	

if(isset($_GET['delete']))
{
 mysql_query("DELETE FROM faq WHERE id = '$_GET[delete]'");

$error="<div class='alert alert-danger alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Well done! You successfully Delete an FAQ record to From the Database .</div>";

}









if(!empty($_FILES['uploadpix'])) 
{

$file_ext=strtolower(end(explode('.',$_FILES['uploadpix']['name'])));

$allowed = array('jpg','png','gif');
if( ! in_array( $file_ext, $allowed ) )

{
 $success ="<div class='alert alert-danger alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Error:</strong> Only Images are Allowed .</div>" ;
}

else{

$pic = rand(1000,100000)."-".$_FILES['uploadpix']['name'];
    $pic_loc = $_FILES['uploadpix']['tmp_name'];
     $folder="../images/";
     if(move_uploaded_file($pic_loc,$folder.$pic))
     {
	 
       $success ="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Profile Pix uploaded Successfully </div>" ;
     }
     else
     {
	 
     }
mysql_query("UPDATE settings SET site_logo='$pic' WHERE  id='1'");


}
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
	  
    <title><?php echo $display['site_name'] ?> | </title>

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
            
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Design <small>different form elements</small></h2>
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
 <form id="demo-form2" data-parsley-validate="" method="post" enctype="multipart/form-data"  class="form-horizontal form-label-left"  >


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Name <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
 <input type="text" id="sfname" name="sfname" value="<?php echo $site_full_name;?>" required="required" class="form-control col-md-7 col-xs-12">                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Disabled Input </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
    <input type="text" id="sitename" name="sitename" value="<?php echo $site_name;?>" required="required" class="form-control col-md-7 col-xs-12">                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Read-Only Input</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
<input id="dname" name="dname" value="<?php echo $dev_name;?>" readonly="" class="form-control col-md-7 col-xs-12" type="text" >                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
 <input id="dweb" name="dweb" class="form-control col-md-7 col-xs-12" readonly="" value="<?php echo $dev_web;?>" type="text" >                        </div>
                      </div>
					    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="uploadpix" name="uploadpix" class="date-picker form-control col-md-7 col-xs-12"  type="file">
                       </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                       
						   <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="update" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

               


              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sms / Email <small>settings</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" method="post" action="">

                
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Allow Sms Sending </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <label>
												 <input type="hidden" name="is_sms" class="js-switch" value="0"  /> 

                              <input type="checkbox" name="is_sms" class="js-switch" value="1"  <?php echo ($is_sms==1 ? 'checked' : '');?> /> 
                            </label>
                          </div>
                      </div>
					           <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Allow Email Sending </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <label>
						 <input type="hidden" name="is_email" class="js-switch" value="0"  /> 
                              <input type="checkbox" name="is_email" class="js-switch" value="1" <?php echo ($is_email==1 ? 'checked' : '');?> /> 
                            </label>
                          </div>
                          
                       
                  
                      </div>

      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Site contact email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="email" name="site_contact" class="form-control" value="<?php echo $site_contact;?>" required placeholder="Contact Email">
                        </div>
                      </div>
	
	      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sms Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="sms_user" value="<?php echo $sms_user;?>"  placeholder="Clickatell Username">
                        </div>
                      </div>
					        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sms Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" class="form-control"  name="sms_pass" value="<?php echo $sms_pass;?>"  placeholder="Clickatell Password">
                        </div>
                      </div>
      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sms Api</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control"  name="sms_api" value="<?php echo $sms_api;?>"  placeholder="Clickatell API Key">
                        </div>
                      </div>
					  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" name="smsupdate" class="btn btn-success">Submit</button>
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
