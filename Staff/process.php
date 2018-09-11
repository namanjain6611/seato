<?php 

ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");


$m = date("Y-m-d H:i:s");
mysql_query("insert into complain(reply_to,message,date,msg_sub) values('1','$_POST[contentn]','$m','$_POST[nform]')");


$error="<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                            <strong>Success:</strong> Well done! You successfully Added an Exam record to the Database .</div>";



echo $_POST['contentn'];

?>