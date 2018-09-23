<?php 
$ip_value='localhost';
$database_user='root';
$database_password='';
$database_name='xuanke';


$conn = mysqli_connect($ip_value,$database_user,$database_password);
mysqli_query($conn, "set names 'gb2312'") or die(mysqli_error($sql)); 
mysqli_select_db($conn, $database_name) or die ("no database");

function str_sql($str)
{
$str=str_replace("'","",$str);
//$str=str_replace(""","",$str);
$str=str_replace("|","",$str);
$str=str_replace("&","",$str);
$str=str_replace("=","",$str);
$str=str_replace("|","",$str);
$str=str_replace(CHR(13),"<br>",$str);
$str=str_replace(CHR(10),"",$str);
return $str;
}
?>