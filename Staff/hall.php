<?php 

ini_set("error_reporting" , 0);
session_start();
include("../db/dbconnection.php");

if(isset($_POST["submit"]))
{ 
 
echo $filename=$_FILES["file"]["name"];
$ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
 
//we check,file must be have csv extention
if($ext=="csv")
{
  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            $sql = "INSERT into tname(name,email,address) values('$emapData[0]','$emapData[1]','$emapData[2]')";
            mysql_query($sql);
         }
         fclose($file);
         echo "CSV File has been successfully Imported.";
}
else {
    echo "Error: Please Upload only CSV File";
}
 
 
}
?>

<form enctype="multipart/form-data" method="post" action="">
<table border="1">
<tr >
<td colspan="2" align="center"><strong>Import CSV file</strong></td>
</tr>
<tr>
<td align="center">CSV File:</td><td><input type="file" name="file" id="file"></td></tr>
<tr >
<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
</tr>
</table>
</form>