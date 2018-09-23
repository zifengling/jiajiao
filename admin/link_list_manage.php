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
<script language="javascript">function del_confirm(page,id) { if (confirm('真的要删除吗?')) { location.href='link_action.php?type_action=del&submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&page='+page+'&id='+id; } }</script>
<?php switch ($_GET['disp_type']) { 
	   case 'list':
	   $submit_action=str_sql($_GET['submit_action']);
	   if ($_POST['search_value']!='') { $search_value=str_sql($_POST['search_value']); } else { $search_value=str_sql($_GET['search_value']); } ?>
<table width="970" border="0" cellpadding="0" cellspacing="0" class="link_css" style="border:0px #9DC3EA solid;">
  <tr>
    <td height="50" align="center" style="font-size:12px;"><input type="button" value="添加" onClick="javascript:location.href='link_list_manage.php?disp_type=add&submit_action=<?=$submit_action?>';"></td>
  </tr>
</table>
<?php
	  $list="select * from link_info_data where sort_id='$submit_action'";
	  if ($search_value!='') { $list=$list." and url_title='$search_value'"; }
	  $list=$list." order by id desc";   
	  $rs_list=mysqli_query ($conn, $list);
	  if (mysqli_num_rows($rs_list)/20>intval(mysqli_num_rows($rs_list)/20)) { $rows_count=intval(mysqli_num_rows($rs_list)/20)+1; } else { $rows_count=intval(mysqli_num_rows($rs_list)/20); }
	 $page=$_GET['page'];
	 if($page==0 || $page=='') { $page=1; }
	 if($page>$rows_count) { $page=$rows_count; }
	 if($rows_count<1) { $rows_count=1; } 	 
	 if(mysqli_fetch_object($rs_list)) { ?><table width="700" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
          <tr align="center">
            <td width="800" height="30" align="center" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;"><?php if ($_GET['submit_action']==1) { ?>标题<?php } else { ?>图片<?php } ?></td>
            <td width="90" align="center" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">发布日期</td>
            <td width="80" align="center" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">操作</td>
          </tr>
          <tr>
	 <?php 
	 if(mysqli_data_seek($rs_list,($page-1)*20)) {
	 for($i=1;$i<=20;$i++) {
	 if($rs_link_list=mysqli_fetch_object($rs_list)) { ?> 
			<td height="<?php if ($_GET['submit_action']=='1') { ?>30<?php } else { ?>80<?php } ?>" align="left" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;">　<?php if ($_GET['submit_action']=='1') { ?><?=$rs_link_list->url_title?><?php } else { ?><img src="../<?=$rs_link_list->pic_url?>" width="120" height="50"><?php } ?>	</td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><?=$rs_link_list->submit_date?></td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="javascript:del_confirm(<?=$page?>,<?=$rs_link_list->id?>);">删除</a>              <a href="link_list_manage.php?disp_type=edit&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&id=<?=$rs_link_list->id?>&page=<?=$page?>">修改</a></td>
          </tr>		  
	<?php } } } ?></table>	
	<br><span class="news_css"><a href="link_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>">第一页</a>　　　<a href="link_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$page-1?>">上一页</a>　　　　　　<?=$page?>　　　　　　共 <?=$rows_count?> 页　　　　　<a href="link_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$page+1?>">下一页</a>　　　<a href="link_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$rows_count?>">最后一页</a><?php } else { ?><br><br><br><br>暂无记录!<?php } ?></span><br><br>	
	<?php break; case 'add': ?>	
	<form name="form1" method="post" action="link_action.php?type_action=add&submit_action=<?=$_GET['submit_action']?>" enctype="multipart/form-data">	
	<table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css">
      <tr>
        <td height="150" colspan="3">&nbsp;</td>
      </tr>	  
<?php if ($_GET['submit_action']=='1') { ?>
      <tr>
        <td width="200" height="30">链接名称：</td>
        <td width="20">&nbsp;</td>
        <td width="750" align="left"><input name="link_name" type="text" id="link_name" style="width:700px;font-size:12px;"></td>
      </tr>
<?php } else { ?>
	  <tr>
        <td height="30">链接图片：</td>
        <td>&nbsp;</td>
		
		
        <td align="left"><input name="file_info" type="file" style="width:230px;height:20px;border:1px #7E99B2 solid;">　尺寸：120 * 50</td>
      </tr>	
<?php } ?>
      <tr>
        <td height="30">链接网址：</td>
        <td>&nbsp;</td>
        <td align="left"><input name="link_url" type="text" id="link_url" style="width:700px;font-size:12px;"></td>
      </tr>
      <tr align="center">
        <td height="70" colspan="3"><input type="submit" name="Submit" value="添加"></td>
      </tr>
    </table>
	</form>
	<?php break; case 'edit':
	$id=str_sql($_GET['id']);
	if ($id!='') {
	$link_check="select * from link_info_data where id='$id'";
	} else {	
	$sort_id=str_sql($_GET['sort_id']);
	$link_check="select * from link_info_data where sort_id='$sort_id'"; }
	$rs_link_check=mysqli_query ($conn, $link_check);	
	if ($rs_link_info=mysqli_fetch_object ($rs_link_check)) { ?>	
    <form name="user_form" method="post" action="link_action.php?type_action=edit&submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&id=<?=$id?>&page=<?=$_GET['page']?>" onSubmit="return user_form_check()" enctype="multipart/form-data">
	  <table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="150" colspan="4">&nbsp;</td>
        </tr>
        <?php if ($_GET['submit_action']=='1') { ?>
        <tr>
          <td width="200" height="30">链接名称：</td>
          <td width="20">&nbsp;</td>
          <td width="750" colspan="2" align="left"><input name="link_name" type="text" id="link_name" style="width:700px;font-size:12px;" value="<?=$rs_link_info->url_title?>"></td>
        </tr>
        <?php } else { ?>
        <tr>
          <td height="30">链接图片：</td>
          <td>&nbsp;</td>		  
          <td width="450" align="left"><input name="file_info" type="file" style="width:230px;height:20px;border:1px #7E99B2 solid;">
          　尺寸：120 * 50</td>
          <td width="300" align="left"><?php		  
$id=str_sql($_GET['id']);
$file_info_check="select * from link_info_data where id='$id'";
$rs_file_info=mysqli_query ($conn, $file_info_check);
$rs_info=mysqli_fetch_object($rs_file_info);
?>
            <img src="../<?=$rs_info->pic_url?>" width="120" height="50" align="absmiddle">　　
            <?php if ($_GET['file_name']!='') { ?>
文件
<?=$_GET['file_name']?>
上传成功!
<?php } ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td height="30">链接网址：</td>
          <td>&nbsp;</td>
          <td colspan="2" align="left"><input name="link_url" type="text" id="link_url" style="width:700px;font-size:12px;" value="<?=$rs_link_info->url_info?>"></td>
        </tr>
        <tr align="center">
          <td height="70" colspan="4"><input type="submit" name="Submit" value="修改"></td>
        </tr>
      </table>
    </form>	  
	  <?php } } ?>
</div></body></html>