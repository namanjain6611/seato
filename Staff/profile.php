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

 $oldem = mysql_query("SELECT * FROM members_table WHERE id='$_SESSION[staffid]'");
while($rowb = mysql_fetch_array($oldem, MYSQL_BOTH))
{
$emailn=$rowb['email'];
$mobileidn=$rowb['mobile'];

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
mysql_query("UPDATE members_table SET pics='$pic' WHERE  id='$_SESSION[staffid]'");
if($emailn==$_POST[emailid])
{
$m = date("Y-m-d H:i:s");

mysql_query("insert into notifications(member_id,date,n_head,msg) values('$_SESSION[staffid]','$m','Profile Updated','The Student Profile was Succefully Updated')");
}

}
}


if(!empty($_POST['emailid'])) 
{
$m = date("Y-m-d H:i:s");
mysql_query("UPDATE members_table SET email='$_POST[emailid]' WHERE  id='$_SESSION[staffid]'");


if($emailn!=$_POST[emailid])
{
mysql_query("insert into notifications(member_id,date,n_head,msg) values('$_SESSION[staffid]','$m','Profile Updated','The Student Profile was Succefully Updated')");
}
  $success ="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Profile Details Updated Successfully </div>" ;
}

if(!empty($_POST['mobileid'])) 
{
$m = date("Y-m-d H:i:s");
mysql_query("UPDATE members_table SET mobile='$_POST[mobileid]' WHERE  id='$_SESSION[staffid]'");


if($mobileidn!=$_POST[mobileid])
{
mysql_query("insert into notifications(member_id,date,n_head,msg) values('$_SESSION[staffid]','$m','Profile Updated','The Student Profile was Succefully Updated')");
}
  $success ="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Profile Details Updated Successfully </div>" ;
}


if(!empty($_POST['password'])) 
{
mysql_query("UPDATE members_table SET password='$_POST[password]' WHERE  id='$_SESSION[staffid]'");
mysql_query("insert into notifications(member_id,date,n_head,msg) values('$_SESSION[staffid]','$m','Profile Password Changed','The Student Profile Password was Succefully Updated')");

  $success ="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Profile Details Updated Successfully </div>" ;
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

    <title><?php echo $display['site_name'] ?> | Profile Settings</title>

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
                <h3>User Profile</h3>
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
			  <?php echo $success; ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                       
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img src="../images/<?php echo $_SESSION[staff_pix
];?>" alt="Avatar" width="220" height="220" class="img-responsive avatar-view" title="Change the avatar">                        </div>
                      </div>
                      <h3><?php echo $_SESSION['student_name'];?></h3>
<?php
 $useract = mysql_query("SELECT * FROM members_table WHERE id='$_SESSION[staffid]'");
while($row = mysql_fetch_array($useract, MYSQL_BOTH))
{
$state=$row['state'];
$country=$row['country'];
$city=$row['city'];
$course_code=$row['course_code'];
$branch_code=$row['branch_code'];
$f_name=$row['f_name'];
$l_name=$row['l_name'];
$email=$row['email'];
$mobileid=$row['mobile'];

}
 $course_co = mysql_query("SELECT * FROM course WHERE course_id='$course_code'");
while($row = mysql_fetch_array($course_co, MYSQL_BOTH))
{
$course_name=$row['course_name'];
}
$branch_co = mysql_query("SELECT * FROM college WHERE id='$branch_code'");
while($row = mysql_fetch_array($branch_co, MYSQL_BOTH))
{
 $college_name=$row['college_name'];
  $college_name_web=$row['college_name_web'];
}
?>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $city;?>, <?php echo $state;?>, <?php echo $country;?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $course_name;?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://<?php echo $college_name_web;?>" target="_blank"><?php echo $college_name;?></a>
                        </li>
                      </ul>

              <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                      <!-- start skills -->

                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                  

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                         
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
							<?php
 $notification = mysql_query("SELECT * FROM notifications WHERE member_id='$_SESSION[staffid]' ORDER BY `notifications`.`id` DESC limit 5");
while($row = mysql_fetch_array($notification, MYSQL_BOTH))
{
$datetime=$row['date'];
?>
                            <ul class="messages">
                              <li><?php $time=strtotime($datetime);
$mothin=date("M",$time);
$dayt=date("d",$time)
?>
                                <img src="../images/<?php echo $_SESSION[staff_pix
];?>" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info"><?php echo $dayt?></h3>
                                  <p class="month"><?php echo $mothin?></p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading"><?php echo $row['n_head'];?></h4>
                                  <blockquote class="message"><?php echo substr($row['msg'], 0, 100)?>....</blockquote>
                                  <br />
                                  <p class="url">
                                  
                                  </p>
                                </div>
                           
                             
                              </li><?php }?>

                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Project Name</th>
                                  <th>Client Company</th>
                                  <th class="hidden-phone">Hours Spent</th>
                                  <th>Contribution</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>New Company Takeover Review</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">18</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>New Partner Contracts Consultanci</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">13</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Partners and Inverstors report</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">30</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>New Company Takeover Review</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">28</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                           <div class="col-md-12 col-sm-12 col-xs-12">
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
                    <br>
                    <form id="demo-form2" data-parsley-validate="" method="post"  enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" value="<?php echo $f_name;?>" readonly="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" value="<?php echo $l_name;?>" readonly="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male" data-parsley-multiple="gender"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female" data-parsley-multiple="gender"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <input type="text" id="emailid" name="emailid" required="required" value="<?php echo $email;?>" class="form-control col-md-7 col-xs-12">
						
                        </div>

                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <input type="text" id="mobileid" name="mobileid" required="required" placeholder="Mobile Number With Country code e.g +91" value="<?php echo $mobileid;?>" class="form-control col-md-7 col-xs-12">
						
                        </div>

                      </div>
					                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">College <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <input type="text" id="last-name" name="last-name" required="required" value="<?php echo $college_name;?>" readonly="" class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Program <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <input type="text" id="last-name" name="last-name" required="required" value="<?php echo $course_name;?>" readonly="" class="form-control col-md-7 col-xs-12">
					
						  
                        </div>
                      </div>
					                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
                          <input id="password" name="password" type="password" placeholder="Leave Blank if No Change is Required" class="date-picker form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Pix <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
                          <input id="uploadpix" name="uploadpix" class="date-picker form-control col-md-7 col-xs-12" type="file">
						  
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
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
	