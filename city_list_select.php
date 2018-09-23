<?php require("conn.php");
ob_start();
session_start();
header("Content-Type: text/html; charset=GB2312"); 
$id=str_sql($_GET['id']); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>无标题文档</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head><body>
<table width="970" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:1px #BFEBFF solid;line-height:20px;" class="news_css">
  <tr bgcolor="#E6F7FF">
    <td width="20" height="30" style="font-size:14px;font-weight:bold;">&nbsp;</td>
    <td width="910" style="font-size:14px;font-weight:bold;">城市选择</td>
    <td width="40" class="news_css"><a href="javascript:table_city_off();">关闭</a></td>
  </tr>
  <?php $sort_check="select * from sort_info_manage where sort_id='province' order by order_id";
$rs_sort_check=mysqli_query ($conn, $sort_check);
     if (mysqli_num_rows($rs_sort_check)/10>intval(mysqli_num_rows($rs_sort_check)/10)) { $rows_count=intval(mysqli_num_rows($rs_sort_check)/10)+1; } else { $rows_count=intval(mysqli_num_rows($rs_sort_check)/10); }
	 $page=$_GET['page'];	
	 if($page==0 || $page=='') { $page=1; }
	 if($page>$rows_count) { $page=$rows_count; }
	 if($rows_count<1) { $rows_count=1; }
	 if(mysqli_fetch_object($rs_sort_check)) { 
	 if(mysqli_data_seek($rs_sort_check,($page-1)*10)) {
	 for ($i=1;$i<=10;$i++) {
	 if ($rs_sort_list=mysqli_fetch_object ($rs_sort_check)) { 
	 $id=$rs_sort_list->id; ?>
  <tr>
    <td style="font-size:14px;">&nbsp; </td>
    <td height="30" align="left" valign="bottom" style="font-size:14px;"><a href="area_select.php?area_name=<?=$rs_sort_list->sort_title?>&id=<?=$rs_sort_list->id?>">
      <?=$rs_sort_list->sort_title?>
    </a></td>
    <td style="font-size:14px;">&nbsp;</td>
  </tr>
  <?php $sort_check_1="select * from sort_info_manage where sort_id='$id' order by order_id";
$rs_sort_check_1=mysqli_query ($conn, $sort_check_1); ?>
  <tr>
    <td>&nbsp;</td>
    <td height="30" align="left"><?php while ($rs_sort_list_1=mysqli_fetch_object ($rs_sort_check_1)) { ?>
	
	
        <a href="area_select.php?area_name=<?=$rs_sort_list->sort_title?>（<?=$rs_sort_list_1->sort_title?>）&id=<?=$id?>,<?=$rs_sort_list_1->id?>"><?=$rs_sort_list_1->sort_title?></a> 　
        <?php } } ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <?php } } ?>
  <tr align="center">
    <td colspan="3"><a href="javascript:city_list(1);">第一页</a>　　　<a href="javascript:city_list(<?=$page-1?>);">上一页</a>　　　　　　
        <?=$page?>
      　　　　　　 共
      <?=$rows_count?>
      页　　　　　<a href="javascript:city_list(<?=$page+1?>);">下一页</a>　　　<a href="javascript:city_list(<?=$rows_count?>);">最后一页</a></td>
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="3">暂无记录!</td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>