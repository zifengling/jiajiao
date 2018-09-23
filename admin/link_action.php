<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
require('../conn.php');
ob_start();
session_start();
require('login_user_check.php');
switch ($_GET['type_action']) {
       case "add":
$link_name=str_sql($_POST['link_name']);
$link_url=$_POST['link_url'];
$submit_action=str_sql($_GET['submit_action']);
if ($submit_action=='1') {
if ($link_name=='' || $link_url=='') { ?>
<script language="javascript">alert('请输入所有的内容!'); history.go(-1);</script>
<?php
exit; }
} else {
$file_info=str_sql($_FILES['file_info']['name']);
$link_value=$_POST['link_value'];
if ($file_info=='') { ?><script language="javascript">alert('请点浏览选择您需要上传的图片!');history.go(-1);</script><?php exit; }
if ($link_url=='') { ?><script language="javascript">alert('请输入链接网址!');history.go(-1);</script><?php exit; }
$file_value=substr($file_info,strlen($file_info)-4,4);















if ($file_value=='.jpg' || $file_value=='.JPG' || $file_value=='.gif' || $file_value=='.GIF') {
move_uploaded_file($_FILES['file_info']['tmp_name'],'../upload/'.$_FILES['file_info']['name']);
$rand_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
rename('../upload/'.$_FILES['file_info']['name'],'../upload/'.$rand_number.$_FILES['file_info']['name']);
$file_web_url='upload/'.$rand_number.$_FILES['file_info']['name'];
} else { ?><script language="javascript">alert('对不起，只能上传格式为.gif或.jpg的图片!');history.go(-1);</script><?php exit; }
}
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('Y-m-d');
if ($submit_action=='1') { 
$link_add="insert into link_info_data(url_title,url_info,submit_date,sort_id) values ('$link_name','$link_url','$submit_date','$submit_action')";
} else {
$link_add="insert into link_info_data(pic_url,url_info,submit_date,sort_id) values ('$file_web_url','$link_url','$submit_date','$submit_action')"; }
mysqli_query ($conn, $link_add);
?>
<script language="javascript">alert('添加成功!');location.href='link_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>';</script>
<?php
break;
case 'edit': 
$link_name=str_sql($_POST['link_name']);
$link_url=$_POST['link_url'];
$submit_action=str_sql($_GET['submit_action']);
$id=str_sql($_GET['id']);
if ($submit_action=='1') {
if ($link_name=='' || $link_url=='') { ?>
<script language="javascript">alert('请输入所有的内容!'); history.go(-1);</script>
<?php
exit; }
} else {
$file_info=str_sql($_FILES['file_info']['name']);
$link_value=$_POST['link_value'];
if ($file_info=='') { ?><script language="javascript">alert('请点浏览选择您需要上传的图片!');history.go(-1);</script><?php exit; }
if ($link_url=='') { ?><script language="javascript">alert('请输入链接网址!');history.go(-1);</script><?php exit; }
$file_value=substr($file_info,strlen($file_info)-4,4);
if ($file_value=='.jpg' || $file_value=='.JPG' || $file_value=='.gif' || $file_value=='.GIF') {
move_uploaded_file($_FILES['file_info']['tmp_name'],'../upload/'.$_FILES['file_info']['name']);
$rand_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
rename('../upload/'.$_FILES['file_info']['name'],'../upload/'.$rand_number.$_FILES['file_info']['name']);
$file_web_url='upload/'.$rand_number.$_FILES['file_info']['name'];














} else { ?><script language="javascript">alert('对不起，只能上传格式为.gif或.jpg的图片!');history.go(-1);</script><?php exit; }


}
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('Y-m-d');
if ($submit_action=='1') { 
$link_edit="update link_info_data set url_title='$link_name',url_info='$link_url' where id='$id'";
} else {
$link_edit="update link_info_data set pic_url='$file_web_url',url_info='$link_url' where id='$id'";         }
mysqli_query ($conn, $link_edit);
?>
<script language="javascript">
alert('修改成功!');
<?php if ($sort_id!='') { ?>history.go(-1);<?php } else { ?>location.href='link_list_manage.php?disp_type=list&submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&page=<?=$_GET['page']?>';<?php } ?>
</script>
<?php
break; case 'del':
$id=str_sql($_GET['id']); 
$link_del="delete from link_info_data where id='$id'";
mysqli_query ($conn, $link_del); ?>
<script language="javascript">alert('删除成功!');location.href='link_list_manage.php?disp_type=list&submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&page=<?=$_GET['page']?>';</script>
<?php break; case 'state_edit':
$id=str_sql($_GET['id']);
$position_value=str_sql($_POST['position_value']);
$state_value_1=str_sql($_POST['state_value_1']);
$state_update="update link_info_data set display_position='$position_value',state_info='$state_value_1' where id='$id'";
mysqli_query ($conn, $state_update); ?><script language="javascript">alert('修改成功!');history.go(-1);</script>
<?php } ?>