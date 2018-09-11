<?php

ini_set("error_reporting" , 0);
session_start();
include("db/dbconnection.php");

    $random=rand(0,100000000000);
    $md5=md5("$random");
    $base=base64_encode($md5);
    $dst=md5("$base");

$sqll = mysql_query("SELECT * FROM members_table WHERE roll_no='$_POST[userid]'");
	
	while($arrow = mysql_fetch_array($sqll))
{
$email = $arrow[email];
}



$to  = $email; // note the comma

// subject
$subject = 'Password Reset';

// message
$message = "
<div dir='ltr'><br /><br /><br /><br /><u></u>
<div dir='ltr' style='margin: 0; padding: 0;'>
<table id='m_5073934744646125577email_table' style='border-collapse: collapse;' border='0' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td id='m_5073934744646125577email_content' style='font-family: Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif; background: #ffffff;'>
<table style='border-collapse: collapse;' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='line-height: 20px;' colspan='3' height='20'>&nbsp;</td>
</tr>
<tr>
<td style='line-height: 1px;' colspan='3' height='1'>&nbsp;</td>
</tr>
<tr>
<td>
<table style='border-collapse: collapse; border: solid 1px white; margin: 0 auto 5px auto; padding: 3px 0; text-align: center; width: 430px;' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='width: 15px;' width='15px'>&nbsp;</td>
<td style='line-height: 0px; width: 400px; padding: 0 0 15px 0;'>
<table style='border-collapse: collapse;' border='0' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='width: 100%; text-align: left; height: 33px;'><img style='border: 0;' src='http://seato.gq/images/logo.png' height='33' /></td>
</tr>
</tbody>
</table>
</td>
<td style='width: 15px;' width='15px'>&nbsp;</td>
</tr>
<tr>
<td style='width: 15px;' width='15px'>&nbsp;</td>
<td style='border-top: solid 1px #c8c8c8;'>&nbsp;</td>
<td style='width: 15px;' width='15px'>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table style='border-collapse: collapse; margin: 0 auto 0 auto;' border='0' width='430' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td>
<table style='border-collapse: collapse; margin: 0 auto 0 auto; width: 430px;' border='0' width='430px' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='display: block; width: 15px;' width='15'>&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td>
<table style='border-collapse: collapse;' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td>
<table style='border-collapse: collapse;' border='0' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='display: block; width: 20px;' width='20'>&nbsp;&nbsp;&nbsp;</td>
<td>
<table style='border-collapse: collapse;' border='0' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>
<p style='padding: 0; margin: 10px 0 10px 0; color: #565a5c; font-size: 18px;'>Hi ".$_POST['userid'].",</p>
<p style='padding: 0; margin: 10px 0 10px 0; color: #565a5c; font-size: 18px;'>We got a request to reset your Seato password.</p>
</td>
</tr>
<tr>
<td style='line-height: 10px;' colspan='1' height='10'>&nbsp;</td>
</tr>
<tr>
<td>
<table style='border-collapse: collapse;' border='0' width='390' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='border-collapse: collapse; border-radius: 3px; text-align: center; display: block; border: solid 1px #009fdf; padding: 10px 16px 14px 16px; margin: 0 2px 0 auto; min-width: 80px; background-color: #47a2ea;'><center><span style='font-size: medium;'><span style='font-family: Helvetica Neue,Helvetica,Roboto,Arial,sans-serif; white-space: nowrap; font-weight: bold; vertical-align: middle; color: #fdfdfd; font-size: 16px; line-height: 16px;'><a href='http://seato.gq/recover.php?id=".$dst."'>Reset&nbsp;Password</span></span></center></td></a></button>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style='line-height: 10px;' colspan='1' height='10'>&nbsp;</td>
</tr>
<tr>
<td>
<p style='padding: 0; margin: 10px 0 10px 0; color: #565a5c; font-size: 18px;'>If you ignore this message, your password will not be changed. If you didn't request a password reset, <a style='color: #3b5998; text-decoration: none;' href='https://instagram.com/accounts/password/report/imqcw9/' target='_blank' rel='noreferrer'>let us know</a>.</p>
</td>
</tr>
</tbody>
</table>
</td>
<td style='display: block; width: 20px;' width='20'>&nbsp;&nbsp;&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>

</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td style='line-height: 20px;' colspan='3' height='20'>&nbsp;</td>
</tr>
</tbody>
</table>
</tr>
</tbody>
</table>
</div>
</div>
";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: TMU <service@flexten.xyz>' . "\r\n";



if ($email!="") {


// Mail it
mysql_query("INSERT into temp_key (recover_key, member_id) values('$dst','$_POST[userid]')"); 

mail($to, $subject, $message, $headers);


$error="<div class='ui-pnotify  ui-pnotify-fade-normal ui-pnotify-move ui-pnotify-in ui-pnotify-fade-in' aria-live='assertive' aria-role='alertdialog' style='display: none; width: 300px; right: 10px; top: 10px;'><div class='alert ui-pnotify-container alert-success ui-pnotify-shadow' role='alert' style='min-height: 16px;'><div class='ui-pnotify-closer' aria-role='button' tabindex='0' title='Close' style='cursor: pointer; visibility: visible;'><span class='glyphicon glyphicon-remove'></span></div><div class='ui-pnotify-sticker' aria-role='button' aria-pressed='false' tabindex='0' title='Stick' style='cursor: pointer; visibility: visible;'><span class='glyphicon glyphicon-pause' aria-pressed='false'></span></div><div class='ui-pnotify-icon'><span class='glyphicon glyphicon-ok-sign'></span></div><h4 class='ui-pnotify-title'>Success</h4><div class='ui-pnotify-text' aria-role='alert'>A Recovery Link has been sent to your registered email link to your userid, Please Follow the steps to Recover ur passowrd!</div></div></div>";



// Print the table
}
?>

