<?php 
ob_start(); 
session_start();
require('login_user_check.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>无标题文档</title>


<link href="../css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../images/manage_top.jpg);
}
-->
</style></head>
<body>
<img src="../images/manage_logo.jpg" width="140" height="60" style="margin-left:40px;">
<table width="970" height="60" border="0" cellpadding="0" cellspacing="0" style="left:220px;top:0px;position:absolute;z-index:20;" class="news_css">
  <tr align="right">
    <td height="30" colspan="13"><a href="../login_action.php?type_action=reset_login">退出系统</a></td>
  </tr>
  <tr>
  
  
    <td width="70" height="30" align="center" background="../images/manage_top_link.jpg"><a href="manage_left.php?disp_type=web_set" target="left_link">系统设置</a></td>
    <td width="20">&nbsp;</td>
    <td width="70" align="center" background="../images/manage_top_link.jpg"><a href="manage_left.php?disp_type=teacher_user" target="left_link">教员管理</a></td>
    <td width="20">&nbsp;</td>
    <td width="70" align="center" background="../images/manage_top_link.jpg"><a href="manage_left.php?disp_type=news" target="left_link">资讯管理</a></td>
    <td width="20" align="center">&nbsp;</td>
    <td width="70" align="center" background="../images/manage_top_link.jpg"><a href="manage_left.php?disp_type=link" target="left_link">友情链接</a></td>
    <td width="20" align="center">&nbsp;</td>
    <td width="70" align="center" background="../images/manage_top_link.jpg"><a href="buy.php" target="info">购买正版</a></td>
    <td width="540" align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
