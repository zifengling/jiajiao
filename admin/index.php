<?php
ob_start();
session_start();
//require("user_check.php");
require("../conn.php");
if ($_GET['type_action']=='login') {
$username=str_sql($_POST['username']);
$userpassword=str_sql($_POST['userpassword']);
$user_check="select * from user_info_manage where user_name='$username' and user_password='$userpassword' and user_level='admin_user'";
$rs_user_check=mysqli_query ($conn, $user_check);
if (mysqli_fetch_object ($rs_user_check)) { $_SESSION['login_user_level']='admin_user'; ?><script language="javascript">location.href='main.php';</script><?php } else { ?><script language="javascript">alert('请输入正确的用户名或密码!');history.go(-1);</script><?php exit; } } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>管理员登录</title>
<link href="../css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head><body><div align="center">
<br>
<form name="user_form" method="post" action="index.php?type_action=login" onSubmit="return user_form_check()">
<table width="400" border="0" cellpadding="0" cellspacing="0" style="border:1px #9DC3EA solid;" class="news_css">
  <tr>
    <td width="750" height="30" align="center" bgcolor="#F4FAFF" style="font-size:14px;">管理员登录</td>
  </tr>
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td height="40" align="center" style="font-size:12px;line-height:160%;"> 用户名：
      <input name="username" type="text" id="username" style="width:200px;height:20px;line-height:20px;" value="admin">
    </td>
  </tr>
  <tr>
    <td height="40" align="center" style="font-size:12px;line-height:160%;"> 密　码：
      <input name="userpassword" type="password" id="userpassword" style="width:200px;height:20px;line-height:20px;" value="admin"></td>
  </tr>    
  <tr>
    <td height="60" align="center" style="font-size:12px;line-height:160%;"><input type="submit" name="Submit" value="登录" style="width:90px;height:30px;"></td>
  </tr>
</table>
</form>
</div>
</body>
</html>