<?php 
if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || 
   $_SERVER['HTTPS'] == 1) ||  
   isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&   
   $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
{
   $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header('HTTP/1.1 301 Moved Permanently');
   header('Location: ' . $redirect);
   exit();
}

ini_set("error_reporting" , 0);
session_start();
include("db/dbconnection.php");


$query = mysql_query("SELECT * FROM settings WHERE id = '1'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	


if(isset($_SESSION[studentsid]))
{
	header("Location: AccountsOverview.php?seg=setSegCSMR");
}



if(isset($_GET['recoverdone']))
{

$error="<div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-in ui-pnotify-fade-in' aria-live='assertive' aria-role='alertdialog' style='display: none; width: 300px; right: 10px; top: 10px;'><div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'><div class='ui-pnotify-closer' aria-role='button' tabindex='0' title='Close' style='cursor: pointer; visibility: visible;'><span class='glyphicon glyphicon-remove'></span></div><div class='ui-pnotify-sticker' aria-role='button' aria-pressed='false' tabindex='0' title='Stick' style='cursor: pointer; visibility: visible;'><span class='glyphicon glyphicon-pause' aria-pressed='false'></span></div><div class='ui-pnotify-icon'><span class='glyphicon glyphicon-ok-sign'></span></div><h4 class='ui-pnotify-title'>Success</h4><div class='ui-pnotify-text' aria-role='alert'>Your Password has been change succefully your, login now with your user Id and Password!</div></div></div>";



}


if(isset($_POST['recover']))
{


include("send.php");

}
if(isset($_POST['submi']))
{

$student = mysql_query("SELECT * FROM members_table WHERE roll_no='$_POST[Username]' AND password='$_POST[Password]' AND m_type='3'");
$admin = mysql_query("SELECT * FROM members_table WHERE username='$_POST[Username]' AND password='$_POST[Password]' AND m_type='1'");
$staff = mysql_query("SELECT * FROM members_table WHERE username='$_POST[Username]' AND password='$_POST[Password]' AND m_type='2'");


if(mysql_num_rows($student) == 1)
	{
while($recarr = mysql_fetch_array($student))
		{
			
		$_SESSION[studentid] = 	$recarr[id];
		$_SESSION[lastlogin] = 	$recarr[lastlogin];	
		$_SESSION[college_id] = 	$recarr[branch_code];
		$_SESSION[student_pix] = 	$recarr[pics];		
		$_SESSION[course_code] = 	$recarr[course_code];	
		$_SESSION[year] = 	$recarr[a_year];		
		$_SESSION[student_name] = 	$recarr[f_name]. " ". $recarr[l_name];
		}
		$_SESSION["username"] =$_POST["username"];
		$m = date("Y-m-d H:i:s");
mysql_query("UPDATE members_table SET lastlogin='$m' WHERE id='$_SESSION[studentid]'");
		header("Location: Student");
		
	
	
	}
	else if(mysql_num_rows($admin) == 1 )
	{
while($recarr = mysql_fetch_array($admin))
		{
			
		$_SESSION[adminid] = 	$recarr[id];
		$_SESSION[lastlogin] = 	$recarr[lastlogin];	
		$_SESSION[college_id] = 	$recarr[branch_code];
		$_SESSION[student_pix] = 	$recarr[pics];		
		$_SESSION[course_code] = 	$recarr[course_code];		
		$_SESSION[student_name] = 	$recarr[f_name]. " ". $recarr[l_name];
		}
		$_SESSION["username"] =$_POST["username"];
		$m = date("Y-m-d H:i:s");
mysql_query("UPDATE members_table SET lastlogin='$m' WHERE id='$_SESSION[studentid]'");
		header("Location: Admin");	
	
}
else if(mysql_num_rows($staff) == 1 )
	{
while($recarr = mysql_fetch_array($staff))
		{
			
		$_SESSION[staffid] = 	$recarr[id];
		$_SESSION[lastlogin] = 	$recarr[lastlogin];	
		$_SESSION[college_id] = 	$recarr[branch_code];
		$_SESSION[staff_pix] = 	$recarr[pics];		
		$_SESSION[course_code] = 	$recarr[course_code];		
		$_SESSION[staff_name] = 	$recarr[f_name]. " ". $recarr[l_name];
		}
		$_SESSION["username"] =$_POST["username"];
		$m = date("Y-m-d H:i:s");
mysql_query("UPDATE members_table SET lastlogin='$m' WHERE id='$_SESSION[studentid]'");
		header("Location: Staff");	
	
}
	else if(mysql_num_rows($resulti) == 1 & $code ==1)
	{
	header("Location: suspended.php");
	
	
}
else

{

$error="<div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-in ui-pnotify-fade-in ui-pnotify-move' aria-live='assertive' aria-role='alertdialog' style='display: none; width: 300px; right: 10px; top: 5px; cursor: auto;'><div class='alert ui-pnotify-container alert-danger ui-pnotify-shadow' role='alert' style='min-height: 16px;'><div class='ui-pnotify-closer' aria-role='button' tabindex='0' title='Close' style='cursor: pointer; visibility: hidden;'><span class='glyphicon glyphicon-remove'></span></div><div class='ui-pnotify-sticker' aria-role='button' aria-pressed='false' tabindex='0' title='Stick' style='cursor: pointer; visibility: hidden;'><span class='glyphicon glyphicon-pause' aria-pressed='false'></span></div><div class='ui-pnotify-icon'><span class='glyphicon glyphicon-warning-sign'></span></div><h4 class='ui-pnotify-title'>Oh No!</h4><div class='ui-pnotify-text' aria-role='alert'>User ID or Pass does not match our Record in Database, Please Provide a valid Data.</div></div></div>";
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $display['site_name'] ?></title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
  <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
	
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
<?php echo $error;?>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="Username" onKeyUp="this.value=this.value.toUpperCase();"  class="form-control" placeholder="User ID" required="" />
              </div>
              <div>
                <input type="password" name="Password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
			  <input name="submi" value="Login" class="btn btn-default submit" type="submit">
          
                <a class="reset_pass" href="#signup">Lost your password?</a>              </div>

              <div class="clearfix"></div>

              <div class="separator">
                              </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="images/logo.png" width="90" height="80"> <?php echo $display['site_name'] ?>	</h1>
                  <p>©2017 All Rights Reserved.  Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Forgot Password</h1>
              <div>
                <input type="text" name="userid" class="form-control" placeholder="User ID" required="" />
              </div>
              <div>
			  <button class="btn btn-default submit"  name="recover">Recover</button>
                          </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="images/logo.png" width="90" height="80"> <?php echo $display['site_name'] ?>	</h1>
                  <p>©2017 All Rights Reserved.Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
