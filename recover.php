<?php 

ini_set("error_reporting" , 0);
session_start();
include("db/dbconnection.php");


$query = mysql_query("SELECT * FROM settings WHERE id = '1'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	


$sqll = mysql_query("SELECT * FROM temp_key WHERE recover_key='$_GET[id]'");
	
	while($arrow = mysql_fetch_array($sqll))
{
	$rkey = $arrow[recover_key];
	$ruserid = $arrow[member_id];
}

if(isset($_POST['Password']))
{
mysql_query("UPDATE members_table SET password='$_POST[Password]' WHERE roll_no='$_POST[Username]'");
 mysql_query("DELETE FROM temp_key WHERE recover_key='$_GET[id]'");


		header("Location: index.php?recoverdone=yes");


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
              <h1>Reset Form</h1>
              <div>
                <input type="text" name="Username" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $ruserid; ?>"  class="form-control" placeholder="User ID" required="" readonly="" />
				 <input type="hidden" name="rk" value="<?php echo $rkey; ?>"  class="form-control" placeholder="User ID" required="" />
              </div>
              <div>
                <input type="Password" name="Password" class="form-control" placeholder="New Password" required="" />
              </div>
              <div>
<div>
			  <button class="btn btn-default submit"  name="recover">Recover</button>
                          </div>          
             </div>

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
      </div>
    </div>
  </body>
</html>
