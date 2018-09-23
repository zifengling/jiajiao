<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script src="jquery_ad.js"></script>
<script language="javascript">function login_form_check() {
if (login_form.username.value=='') { alert('请输入用户名!'); login_form.username.focus(); return false; }
if (login_form.userpassword.value=='') { alert('请输入密码!'); login_form.userpassword.focus(); return false; }
if (login_form.code.value=='') { alert('请输入验证码!'); login_form.code.focus(); return false; }
}

var city_xmlHttp
function city_list(page)
{
var url='city_list_select.php?page='+page;
if (window.ActiveXObject)
{
city_xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")	
}
else if (window.XMLHttpRequest)
{
city_xmlHttp=new XMLHttpRequest()
}
city_xmlHttp.open("GET",url,true)
city_xmlHttp.onreadystatechange=city_stateChanged
city_xmlHttp.send(null)
}

function city_stateChanged()
{
if (city_xmlHttp.readyState==4 || city_xmlHttp.readyState=="complete")
{
document.getElementById("city_list_sort").innerHTML=city_xmlHttp.responseText
}
}

function table_city_on() { 
var selects=document.getElementsByTagName('select');
for (i=0;i<selects.length;i++) { selects[i].style.display='none'; }
background_city.style.display=''; table_city.style.display=''; city_list(1);
}
function table_city_off() { 
var selects=document.getElementsByTagName('select');
for (i=0;i<selects.length;i++) { selects[i].style.display=''; }
background_city.style.display='none'; table_city.style.display='none'; }

function qq_service_on() { qq_service_1.style.display='none'; qq_service_2.style.display=''; }
function qq_service_off() { qq_service_1.style.display=''; qq_service_2.style.display='none'; }

$(function(){ var top = $('#block').offset().top;
//var top = $('#qq_service_1').offset().top;
	$(window).scroll(function () {
		$(document).scrollTop() > top ? $('#block').addClass('sticky') : $('#block').removeClass('sticky');
		//$(document).scrollTop() > top ? $('#qq_service_1').addClass('sticky') : $('#block').removeClass('sticky');
    });
});
</script>
<div style="width:100%;height:2000px;background-color:#000000;filter:alpha(opacity=20,style=2);-moz-opacity:0;opacity:0.3;position:absolute;left:0px;top:0px;z-index:150;display:none;" id="background_city"></div>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr><td height="80" align="center">
<?php

$web_info="select * from web_info_manage";
$rs_web_info = mysqli_query ($conn, $web_info);
$rs_web=mysqli_fetch_object ($rs_web_info); $qq_number=$rs_web->qq_info; ?>  <table width="970" height="90" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">      
  <tr><td width="310"><img src="images/logo.jpg" width="310" height="80"></td>

		<form action="login_action.php?type_action=login" name="login_form" method="post" onSubmit="return login_form_check()"><td width="660" align="center"><?php if ($_SESSION['login_user_name']!='') { ?>尊敬的 <?=$_SESSION['login_user_name']?> 用户，欢迎您来到本站。<a href="teacher_manage.php?disp_type=add"><font color="#0000FF">进入系统</font></a>　<a href="login_action.php?type_action=reset_login"><font color="#FF0000">退出系统</font></a><?php } else { ?>
          <table width="660" border="0" cellpadding="0" cellspacing="0" class="news_css">
          <tr>
            <td width="340" align="right">　　用户名：
              <input name="username" type="text" id="username" style="width:80px;height:16px;">　密码：
              <input name="userpassword" type="password" id="userpassword" style="width:80px;height:16px;"></td>
            <td width="20">&nbsp;</td>
            <td width="100"><label for="code">验证码：</label>
              <input type="text" name="code" id="textfield" style="width:32px;" /></td>
            <td width="90"><a href="javascript:refresh_code();"><img id="imgcode" src="VerifyCode.php" alt="验证码" border="0" /></a></td>
            <td width="120"><input name="imageField" type="image" src="images/login.jpg" width="40" height="26" border="0">　<a href="register.php" target="_blank"><img src="images/register.jpg" width="40" height="26" border="0"></a> </td>
          </tr></table>
          <label for="code"></label><?php } ?></td></form></tr></table></td>  
  </tr>  <tr>    <td height="40" align="center" bgcolor="#2F9CFF"><table width="970" height="40" border="0" cellpadding="0" cellspacing="0" class="link_css">
      <tr align="center">	  
        <td width="98"<?php if (trim(strpos($_SERVER['SCRIPT_NAME'],'index.php'))!='') { ?> bgcolor="#1059E0"<?php } ?>><a href="index.php">首页</a></td>
		<td width="109"<?php if (trim(strpos($_SERVER['SCRIPT_NAME'],'teacher_list.php'))!='' && $_GET['occupation_value']=='' && $_GET['state_value']!=2) { ?> bgcolor="#1059E0"<?php } ?>><a href="teacher_list.php">教师信息</a></td>
		<td width="109"<?php if ($_GET['state_value']==2) { ?> bgcolor="#1059E0"<?php } ?>><a href="teacher_list.php?state_value=2">课程信息</a></td>        
      </tr>
    </table></td>
  </tr>
  <tr><td style="height:10px;"></td></tr>
</table>
<div style="position:absolute;left:0px;top:180px;" align="left">
<div id="block"><table width="50" border="0" cellpadding="0" cellspacing="0" onMouseMove="javascript:qq_service_on();" id="qq_service_1">
  <tr>  
    <td><img src="images/qq_service.jpg" width="50" height="160"></td>
  </tr>
</table>
<table width="120" border="0" cellpadding="0" cellspacing="0" style="position:absolute;left:15px;display:none;" class="news_css" id="qq_service_2">
  <tr><td><img src="images/qq_service_top.jpg" width="120" height="50"></td></tr>  
<?php $web_info="select * from web_info_manage";
$rs_web_info=mysqli_query ($conn, $web_info);
if ($rs_web=mysqli_fetch_object ($rs_web_info)) { $qq_number=$rs_web->qq_info;
for ($i=1;$i<=10;$i++) {
$qq_value=substr($qq_number,0,strpos($qq_number,','));
if ($qq_value!='') { ?>
  <tr><td height="40" align="center" background="images/qq_service_middle.jpg"><a href="http://wpa.qq.com/msgrd?V=1&Uin=<?=$qq_value?>&Site=&Menu=yes" target=blank><IMG alt=QQ在线客服,QQ:<?=$qq_value?> src="http://wpa.qq.com/pa?p=1:<?=$qq_value?>:1" border=0></a></td>
  </tr>
<?php } $qq_number=substr($qq_number,strpos($qq_number,',')+1,strlen($qq_number)); } } ?>  
  <tr>
    <td height="30" align="center" background="images/qq_service_middle.jpg"><a href="javascript:qq_service_off();">关闭在线客服</a></td>
  </tr>
  <tr>
    <td height="15"><img src="images/qq_service_bottom.jpg" width="120" height="15"></td>
  </tr>
</table>
</div></div>