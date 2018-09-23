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
<table width="180" border="0" cellpadding="0" cellspacing="0">
  <tr>  
    <td><select name="subject_name_1" size="15" multiple onChange="javascript:select_option_add(this.value,0);" style="width:160px;height:220px;">
      <option>--------选择--------</option>
      <?php if ($id<>'') {
$sort_check="select * from sort_info_manage where sort_id='$id'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
while ($rs_sort=mysqli_fetch_object ($rs_sort_check)) { ?>
      <option value="<?=$rs_sort->id?>,<?=$rs_sort->sort_title?>"<?php if ($subject_name_1==$rs_sort->id) { ?> selected<?php } ?>><?=$rs_sort->sort_title?></option>
      <?php } } ?>
    </select></td>
  </tr>
</table>
</body>
</html>