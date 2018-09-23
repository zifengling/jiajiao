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
<select name="city_name"<?php if ($_GET['submit_action']=='1') { ?> style="width:<?php if ($_GET['len_value']=='1') { ?>80<?php } else { ?>92<?php } ?>px;height:21px;margin-top:-1px;margin-left:-1px;"<?php } ?>>
<?php
if ($id<>'') {
$sort_check="select * from sort_info_manage where sort_id='$id'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
while ($rs_sort=mysqli_fetch_object ($rs_sort_check)) { ?><option value="<?=$rs_sort->id?>"<?php if ($rs_sort->id==$_GET['city_id']) { ?> selected<?php } ?>><?=$rs_sort->sort_title?></option>
<?php } } else { ?><option value="">选择</option><?php } ?>
</select>
</body>
</html>