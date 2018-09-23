<?php
ob_start();
session_start();
require("../conn.php");
require('login_user_check.php');
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
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
}
-->
</style></head><body><div align="center">
<script language="javascript">
function user_form_check() {
if (user_form.now_password.value=='') { alert('请输入旧密码!'); user_form.now_password.focus(); return false; }
if (user_form.new_password.value=='') { alert('请输入新密码!'); user_form.new_password.focus(); return false; }
if (user_form.new_password_1.value=='') { alert('请再次输入新密码!'); user_form.new_password_1.focus(); return false; }
if (user_form.new_password.value!=user_form.new_password_1.value) { alert('两次输入密码必须相同!'); user_form.new_password_1.focus(); return false; }
}
</script>
<?php switch($_GET['disp_type']) { case 'web_content': 
$web_info="select * from web_info_manage";
$rs_web_info=mysqli_query ($conn, $web_info);
if ($rs_web=mysqli_fetch_object ($rs_web_info)) { ?><form name="web_set_form" method="post" action="web_set_action.php?type_action=edit" enctype="multipart/form-data">
      <table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="20" colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="right">网站名称：</td>
          <td>&nbsp;</td>
          <td height="30" colspan="2" align="left"><input name="web_name" type="text" style="width:700px;" value="<?=$rs_web->web_title?>"></td>
        </tr>
        <tr>
          <td width="197" height="40" align="right">网站标题：</td>
          <td width="19">&nbsp;</td>
          <td height="30" colspan="2" align="left"><input name="web_name_1" type="text" id="web_name_1" style="width:700px;" value="<?=$rs_web->web_title_1?>"></td>
        </tr>
        <tr>
          <td height="80" align="right">网站关键词：        </td>
          <td height="30">&nbsp;</td>
          <td colspan="2" align="left"><textarea name="description" id="description" style="width:700px;height:60px;font-size:12px;"><?=$rs_web->web_keywords?></textarea></td>
        </tr>
        <tr>
          <td height="80" align="right">网站描述：        </td>
          <td height="30">&nbsp;</td>
          <td height="30" colspan="2" align="left"><textarea name="keywords" id="keywords" style="width:700px;height:60px;font-size:12px;"><?=$rs_web->web_description?></textarea></td>
        </tr>
        <tr>
          <td height="40" align="right">联系地址：</td>
          <td height="30">&nbsp;</td>
          <td height="30" colspan="2" align="left"><input name="address" type="text" id="address" style="width:700px;" value="<?=$rs_web->address_info?>"></td>
        </tr>
        <tr>
          <td height="40" align="right">联系电话：</td>
          <td height="30">&nbsp;</td>
          <td height="30" colspan="2" align="left"><input name="tel" type="text" id="tel" style="width:700px;" value="<?=$rs_web->tel_number?>"></td>
        </tr>
        <tr>
          <td height="20" align="right">客服QQ一：</td>
          <td height="30">&nbsp;</td>
		  <?php $qq_number=$rs_web->qq_info; ?>
          <td height="30" colspan="2" align="left"><input name="qq_number_1" type="text" id="qq_number_1" style="width:700px;" value="<?=substr($qq_number,0,strpos($qq_number,','))?>"></td>
        </tr>
        <tr>
          <td height="20" align="right">客服QQ二：</td>
          <td height="30">&nbsp;</td>		  
		  <?php $qq_number=substr($qq_number,strpos($qq_number,',')+1,strlen($qq_number)); ?>
          <td height="30" colspan="2" align="left"><input name="qq_number_2" type="text" id="qq_number_2" style="width:700px;" value="<?=substr($qq_number,0,strpos($qq_number,','))?>"></td>
        </tr>
        
		
		
		
		
		
		
		
		
		<!--
		<tr>
          <td height="30" align="right">上传LOGO：</td>
          <td>&nbsp;</td>
          <td width="379" align="left"><input name="file_info" type="file">　
            　尺寸：310 * 80</td>		  
		  <td width="375" align="left"><img src="../<?=$rs_web->logo_info?>" width="310" height="80"></td>
        </tr>-->
        <tr><td colspan="4" style="height:10px;"></td></tr>
        <tr>
          <td height="20" align="right">网站底部信息：</td>
          <td>&nbsp;</td>		  
      
	  
	  
	  
	  
	  
	  
	  <td colspan="2" align="left"><textarea name="content" id="editor_id" style="width:700px;height:300px;visibility:hidden;"><?=$rs_web->bottom_info?></textarea><script charset="utf-8" src="editor/kindeditor.js"></script>
                <script charset="utf-8" src="editor/lang/zh_CN.js"></script>
                <script charset="utf-8" src="editor/plugins/code/prettify.js"></script>
            <script>KindEditor.ready(function(K) {
			var editor = K.create('textarea[name="content"]', {
				cssPath : 'editor/plugins/code/prettify.css',
				uploadJson : 'editor/php/upload_json.php',
				fileManagerJson : 'editor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=info_form]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=info_form]')[0].submit();
					});
				} }); prettyPrint(); });</script></td>
        </tr>
        <tr align="center">
          <td height="60" colspan="4">
            <input name="imageField" type="image" src="../images/submit.jpg" width="60" height="30" border="0">
          </td>
        </tr>
        <tr align="center">
          <td height="30" colspan="4">&nbsp;</td>
        </tr>
      </table>
</form>
<?php } 
break; case 'password_edit': ?><form name="user_form" method="post" action="web_set_action.php?type_action=password_edit" onSubmit="return user_form_check()">
<table width="700" border="0" cellpadding="0" cellspacing="0" class="news_css">
  <tr>
    <td width="750" height="30" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" style="font-size:12px;line-height:160%;"> 旧　密　码：<input name="now_password" type="password" style="width:200px;height:20px;line-height:20px;">
    </td>
  </tr>
  <tr>
    <td height="40" align="center" style="font-size:12px;line-height:160%;"> 新　密　码：<input name="new_password" type="password" style="width:200px;height:20px;line-height:20px;"></td>
  </tr>
  <tr>
    <td height="40" align="center" style="font-size:12px;line-height:160%;"> 再次新密码：<input name="new_password_1" type="password" style="width:200px;height:20px;line-height:20px;"></td>
  </tr>
  <tr>
    <td height="40" align="center" style="font-size:12px;line-height:160%;"><input type="submit" name="Submit" value="修改"></td>
  </tr>
  <tr>
    <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
  </tr>
</table>
</form>
<?php } ?>
</div>
</body>
</html>
