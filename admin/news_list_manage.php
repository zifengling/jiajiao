<?php
require("../conn.php");
ob_start();
session_start(); 
require('login_user_check.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
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
</style></head> 
<body><div align="center">
<script language="javascript">function del_confirm(page,id) { if (confirm('真的要删除吗?')) { location.href='news_action.php?type_action=del&submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&page='+page+'&id='+id; } }</script>
<?php switch ($_GET['disp_type']) { 
	   case 'list':
	   $submit_action=str_sql($_GET['submit_action']);
	   if ($_POST['search_value']!='') { $search_value=str_sql($_POST['search_value']); } else { $search_value=str_sql($_GET['search_value']); }
?>
<table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css" style="border:0px #9DC3EA solid;">
  <tr>
    <td height="50" align="center" style="font-size:12px;"><input type="button" value="添加" onClick="javascript:location.href='news_list_manage.php?disp_type=add&submit_action=<?=$submit_action?>';"></td>
  </tr>
</table>
<?php
	  $list="select * from news_info_data where sort_id='$submit_action'";
	  if ($search_value!='') { $list=$list." and news_title='$search_value'"; }
	  $list=$list." order by id desc";	  
	  $rs_list=mysqli_query ($conn, $list);
	  if (mysqli_num_rows($rs_list)/20>intval(mysqli_num_rows($rs_list)/20)) { $rows_count=intval(mysqli_num_rows($rs_list)/20)+1; } else { $rows_count=intval(mysqli_num_rows($rs_list)/20); }
	 $page=$_GET['page'];
	 if($page==0 || $page=='') { $page=1; }
	 if($page>$rows_count) { $page=$rows_count; }
	 if($rows_count<1) { $rows_count=1; } 	 
	 if(mysqli_fetch_object($rs_list)) { ?><table width="970" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
          <tr align="center">
            <td width="800" height="30" align="center" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">标题</td>
            <td width="90" align="center" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">发布日期</td>
            <td width="80" align="center" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">操作</td>
          </tr>
          <tr>
	 <?php 
	 if(mysqli_data_seek($rs_list,($page-1)*20)) {
	 for($i=1;$i<=20;$i++) {
	 if($rs_news_list=mysqli_fetch_object($rs_list)) { ?> 
            <td height="30" align="left" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;">　<a href="../news.php?disp_type=info&id=<?=$rs_news_list->id?>" target="_blank"><?=$rs_news_list->news_title?></a>	</td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><?=$rs_news_list->submit_date?></td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="javascript:del_confirm(<?=$page?>,<?=$rs_news_list->id?>);">删除</a>              <a href="news_list_manage.php?disp_type=edit&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&id=<?=$rs_news_list->id?>&page=<?=$page?>">修改</a></td>
          </tr>		  
	<?php } } } ?></table>				
	<br><span class="news_css"><a href="news_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>">第一页</a>　　　<a href="news_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$page-1?>">上一页</a>　　　　　　<?=$page?>　　　　　　共 <?=$rows_count?> 页　　　　　<a href="news_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$page+1?>">下一页</a>　　　<a href="news_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$rows_count?>">最后一页</a><?php } else { ?><br><br><br><br>暂无记录!<?php } ?></span><br><br>
	<?php break; case 'add': ?><form name="form1" method="post" action="news_action.php?type_action=add&submit_action=<?=$_GET['submit_action']?>">
	<table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css">
      <tr>
        <td width="200" height="70">标题：</td>
        <td width="20">&nbsp;</td>
        <td width="750"><input name="news_name" type="text" id="news_name" style="width:700px;font-size:12px;"></td>
      </tr>
      <tr>
        <td>内容：</td>
        <td>&nbsp;</td>
        <td><textarea name="content" id="editor_id" style="width:700px;height:300px;visibility:hidden;"><?=$rs_web->bottom_info?></textarea>
      <script charset="utf-8" src="editor/kindeditor.js"></script>
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
				}
			});
			prettyPrint(); });</script></td>
      </tr>
      <tr align="center">
        <td height="70" colspan="3"><input type="submit" name="Submit" value="添加"></td>
      </tr>
    </table>
	</form>
	<?php break; case 'edit':
	$id=str_sql($_GET['id']);
	if ($id!='') {
	$news_check="select * from news_info_data where id='$id'";
	} else {	
	$sort_id=str_sql($_GET['sort_id']);
	$news_check="select * from news_info_data where sort_id='$sort_id'"; }
	$rs_news_check=mysqli_query ($conn, $news_check);	
	if ($rs_news_info=mysqli_fetch_object ($rs_news_check)) { ?>	
    <form name="user_form" method="post" action="news_action.php?type_action=edit&<?php if ($_GET['sort_id']!='') { ?>sort_id=<?=$_GET['sort_id']?><?php } else { ?>submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&id=<?=$id?>&page=<?=$_GET['page']?><?php } ?>" onSubmit="return user_form_check()">
	<table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css">
	<tr><td height="50" colspan="3">&nbsp;</td>
	</tr>
	<?php if ($id!='') { ?>
		  <tr>
            <td width="200" height="30">标题：</td>
            <td width="20">&nbsp;</td>
            <td width="750"><input name="news_name" type="text" id="news_name" style="width:700px;font-size:12px;" value="<?=$rs_news_info->news_title?>"></td>
          </tr>
	<?php } ?>
          <tr>
            <td width="200">内容：</td>
            <td width="20">&nbsp;</td>
		    <td width="750"><textarea name="content" id="editor_id" style="width:700px;height:300px;visibility:hidden;"><?=$rs_news_info->content_info?></textarea>
                <script charset="utf-8" src="editor/kindeditor.js"></script>
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
				}
			});
			prettyPrint(); });</script></td>
          </tr>
          <tr align="center">
            <td height="70" colspan="3"><input type="submit" name="Submit" value="修改"></td>
          </tr>
        </table>
  </form>	  
	  <?php } } ?>
</div></body></html>