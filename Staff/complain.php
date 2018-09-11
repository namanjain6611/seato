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

if(isset($_GET['message_id'])){
mysql_query("UPDATE complain SET msg_read='1' WHERE  id='$_GET[message_id]' AND reply_to='$_SESSION[staffid]' OR assign_to='$_SESSION[staffid]'");
}




if(isset($_POST['send']))
{
$m = date("Y-m-d H:i:s");
mysql_query("insert into complain(member_id,reply_to,reply_from,message,date,msg_sub) values('$_SESSION[staffid]','1','$_SESSION[staffid]','$_POST[contentn]','$m','$_POST[from]')");


$error="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Message has be sent .</div>";


}
if(isset($_POST['reply']))
{
$m = date("Y-m-d H:i:s");

mysql_query("insert into complain(member_id,reply_to,reply_from,message,date,msg_sub) values('$_SESSION[staffid]','$_POST[msto]','$_SESSION[staffid]','$_POST[content]','$m','$_POST[subject]')");


$error="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Message has be sent .</div>";


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
                <h3>Inbox <small>Mail</small></h3>
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
<?php echo $error; ?>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inbox Design<small>User Mail</small></h2>
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
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        <button id="compose" class="btn btn-sm btn-success btn-block" type="button">Write Complain</button>
                        <?php
 $inbox = mysql_query("SELECT * FROM complain WHERE reply_to='$_SESSION[staffid]' OR reply_from='$_SESSION[staffid]' OR assign_to='$_SESSION[staffid]' AND send_del='0' ORDER BY `complain`.`date` DESC");
while($row = mysql_fetch_array($inbox, MYSQL_BOTH))
{
$datetime=$row['date'];
?>
						
						<a href="?message_id=<?php echo $row['id'];?>">
                          <div class="mail_list">
                            <div class="left">
                              <i class="<?php $read= $row['msg_read'];   if($read==0){echo"fa fa-circle";} else{echo "fa fa-circle-o";}?>"></i> <i class="fa fa-edit"></i>
                            </div>
                            <div class="right">
                              <h3><?php   $dfrom = mysql_query("SELECT * FROM members_table WHERE  id='$row[member_id]' ORDER BY `members_table`.`id` DESC");

while($rvow = mysql_fetch_array($dfrom, MYSQL_BOTH))
{
echo $rvow['f_name'] ;
echo ",  ";
echo $rvow['l_name'] ;
}

?><small><?php 
$time=strtotime($datetime);
echo date("h:i A",$time);
?></small></h3>
                              <p><?php echo substr($row['message'], 0, 100)?>...</p>
                            </div>
                          </div><?php }?>
                        </a>
                        <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
                      
					  <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
  
                      <div class="col-sm-9 mail_view">
                        <div class="inbox-body"><?php
 $inbox_contect = mysql_query("SELECT * FROM complain WHERE id='$_GET[message_id]' ORDER BY `complain`.`date` DESC");
while($rows = mysql_fetch_array($inbox_contect, MYSQL_BOTH))
{
?>
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              <div class="btn-group">
                                <button id="repcompose" onClick="showDiv()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply </button>
                             
                                <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                            
                              </div>
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> 8:02 PM 12 FEB 2014</p>
                            </div>
                            <div class="col-md-12">
                              <h4> <?php echo $rows['msg_sub'];?></h4>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12"> 
                                <strong> <?php   $dfrom = mysql_query("SELECT * FROM members_table WHERE  id='$rows[reply_from]' ORDER BY `members_table`.`id` DESC");

while($rvow = mysql_fetch_array($dfrom, MYSQL_BOTH))
{
echo $rvow['f_name'] ;
echo " ";
echo $rvow['l_name'] ;
}
?></strong>
                                <span> (<?php   $dfrom = mysql_query("SELECT * FROM members_table WHERE id='$rows[reply_from]' ORDER BY `members_table`.`id` DESC");

while($rvow = mysql_fetch_array($dfrom, MYSQL_BOTH))
{
echo $rvow['email'] ;

}
?>)</span> to
                                <strong>me</strong>
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                            </div>
                          </div>
						  
                          <div class="view-mail"> <p>
						  
						  <script>
							 function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}

</script>

                           <?php echo $rows['message'];?>
                          </p><div id="welcomeDiv"  style="display:none;" class="answer_list" >
						  
						  
						  <script>
function process() {
  document.getElementById("hidden").value = document.getElementById("content").innerHTML;
  return true;
}
</script>
 
<form method="post" action="" onSubmit="javascript: return process();">
  <input type="hidden" id="hidden" name="content" >

  <input type="hidden" id="from" name="from" value="<?php echo $rows['reply_from'];?>" >
  <input type="hidden" id="subject" name="subject" value="<?php echo $rows['msg_sub'];?>" >
  <input type="hidden" id="msto" name="msto" value="<?php echo $rows['reply_from'];?>" >

<div contenteditable="true" id="content" id="editor" class="editor-wrapper"></div>


		  <button class="btn btn-sm btn-primary" name="reply" type="submit"><i class="fa fa-reply"></i> Send Reply</button>
</form>
</div>
</div>
                         
                              </li>
                   
                              </li>

                            </ul>
                          </div>
                        <?php }?>
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
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


						  <script>
function processn() {
  document.getElementById("hiddenn").value = document.getElementById("contentn").innerHTML;
  return true;
}
</script>
 
<form method="post" action="" onSubmit="javascript: return processn();">
    <!-- compose -->
    <div class="compose col-md-6 col-xs-12">
      <div class="compose-header">
        New Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a data-edit="fontSize 5">
                  <p style="font-size:17px">Huge</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 3">
                  <p style="font-size:14px">Normal</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 1">
                  <p style="font-size:11px">Small</p>
                </a>
              </li>
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
            <div class="dropdown-menu input-append">
              <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
              <button class="btn" type="button">Add</button>
            </div>
            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
          </div>
        </div>

  <input type="hidden" id="hiddenn" name="contentn" >

  <input type="text" class="form-control" required  placeholder="Subject Of Complain" id="from" name="from" value="<?php echo $rows['reply_from'];?>" >
<p>
<div contenteditable="true" id="contentn" id="editor"  class="editor-wrapper"></div></p>

      </div>

      <div class="compose-footer">
        <button id="send" name="send" class="btn btn-sm btn-success" type="submit">Send</button>
      </div>
    </div>
	</form>
    <!-- /compose -->

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>