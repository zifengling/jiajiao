<?php
require("conn.php");
ob_start();
session_start(); 
setcookie('area_name',$_GET['area_name']);
setcookie('area_id',$_GET['id']);
?><script language="javascript">location.href='<?=$_SERVER['HTTP_REFERER']?>';</script>