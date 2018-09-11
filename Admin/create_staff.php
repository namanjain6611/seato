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


if(isset($_POST["createss"]))
{


$file_ext=strtolower(end(explode('.',$_FILES['pic']['name'])));
$pic = rand(1000,100000)."-".$_FILES['pic']['name'];
    $pic_loc = $_FILES['pic']['tmp_name'];
     $folder="../images/";
     if(move_uploaded_file($pic_loc,$folder.$pic))
     {
        ?><script>alert('successfully uploaded');</script><?php
     }
     else
     {
        ?><?php
     }



$sql="INSERT INTO members_table(roll_no,username,password,f_name,l_name,state,city,Country,course_code,branch_code,email,m_type,pics,a_year)
VALUES
('$_POST[roll1]','$_POST[username1]','$_POST[password1]','$_POST[fname1]','$_POST[lname1]','$_POST[state1]','$_POST[city1]','$_POST[country1]','$_POST[course1]','$_POST[branch1]','$_POST[email1]','2','$pic','$_POST[year1]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
 $success ="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Well done! You successfully Added a Staff record to the Database .</div>";


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

    <title><?php echo $display['site_name'] ?> | Admin Add Student Recod</title>
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
<script>

function sync(){

var fname = document.getElementById('fname');
var fname1= document.getElementById('fname1');
fname1.value=fname.value;

var lname = document.getElementById('lname');
var lname1= document.getElementById('lname1');
lname1.value=lname.value;

var email = document.getElementById('email');
var email1= document.getElementById('email1');
email1.value=email.value;


var city = document.getElementById('city');
var city1= document.getElementById('city1');
city1.value=city.value;

var state = document.getElementById('state');
var state1= document.getElementById('state1');
state1.value=state.value;


var country = document.getElementById('country');
var country1= document.getElementById('country1');
country1.value=country.value;



var roll = document.getElementById('roll');
var roll1= document.getElementById('roll1');
roll1.value=roll.value;



var bookID = document.getElementById('bookID');
var course1= document.getElementById('course1');
course1.value=bookID.value;


var catID = document.getElementById('catID');
var branch1= document.getElementById('branch1');
branch1.value=catID.value;

var year = document.getElementById('year');
var year1= document.getElementById('year1');
year1.value=year.value;



var username = document.getElementById('username');
var username1= document.getElementById('username1');
username1.value=username.value;

var password = document.getElementById('password');
var password1= document.getElementById('password1');
password1.value=password.value;


}


</script>
        <!-- page content -->
       
    <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Student Record</h3>
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
<?php echo $success; ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Record <small>Sessions</small></h2>
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


                    <!-- Smart Wizard -->
                    
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Personal Details</small>
                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>College /Programme Detail</small>
                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Login/ User Details</small>
                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Profile Upload</small>
                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <form class="form-horizontal form-label-left">

 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="fname" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">
							  
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="lname" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">                            </div>
                          </div>
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="email" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">

                   </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="female"> Female
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                          </div>
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">City <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="city" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">State <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="state" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">                            </div>
                          </div>
						   <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Country <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="country" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">                            </div>
                          </div>
						  
						  </div>

                        </form>

                      <div id="step-2">
                        <h2 class="StepTitle">Step 2 College Details</h2>
                        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                      <<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Roll Number<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="roll" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">
							  
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">College Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
							<select name='catID' id='catID' required="required" onchange="sync()" class="form-control col-md-7 col-xs-12"><option value=''>Select</option>
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
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
 <select name='bookID' id='bookID' onchange="sync()" class="form-control col-md-7 col-xs-12" required ></select>
                          </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Admitted Year <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="year" class="date-picker form-control col-md-7 col-xs-12" required="required" onkeyUp='sync()' type="text">
                            </div>
                          </div>
					

                    </form>
                        
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle">Step 3 Login/User Details</h2>
                        <form id="demo-form2" data-parsley-validate=""  class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" id="username" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">  
                 </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<input type="password" maxlength="10" id="password" required="required" onkeyUp='sync()'  class="form-control col-md-7 col-xs-12">                        </div>
                      </div>
                     </form>
                        
                      </div>
                      <div id="step-4">
                        <h2 class="StepTitle">Step 4 Upload Profile Picture</h2>
                       <form id="demo-form2" method="post" action="" data-parsley-validate=""  enctype="multipart/form-data" class="form-horizontal form-label-left" >

                      <div class="form-group">
                       
                      
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <div align="center">
  <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
						    
  <img id="blah" height="150" width="150" src="#"/>

	<input type="hidden" name="fname1" id="fname1">

<input type="hidden" name="lname1" id="lname1">

<input type="hidden" name="email1" id="email1">

<input type="hidden" name="state1" id="state1">

<input type="hidden" name="city1" id="city1">

<input type="hidden" name="country1" id="country1">  
<input type="hidden" name="roll1" id="roll1">

<input type="hidden" name="branch1" id="branch1">
<input type="hidden" name="year1" id="year1">

<input type="hidden" name="course1" id="course1">  
<input type="hidden" name="username1" id="username1">

<input type="hidden" name="password1" id="password1">     
						    <input type='file' onchange="readURL(this);" name="pic" class="date-picker form-control col-md-7 col-xs-12" required="required" />
						    
						    
					        </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-10">
                          <button type="submit" name="createss" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                      </div>

                    </div>
                    <!-- End SmartWizard Content -->





                    <!-- Tabs -->
                    <!-- End SmartWizard Content -->
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
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

	
  </body>
</html>