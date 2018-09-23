<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
require('../conn.php');
ob_start();
session_start();
require('login_user_check.php');
switch ($_GET['type_action']) {
       case "add":
$news_name=str_sql($_POST['news_name']);
$content=$_POST['content'];
if ($news_name=='' && $content=='') { ?>
<script language="javascript">alert('请输入所有的内容!'); history.go(-1);</script>
<?php
exit; }
$submit_action=str_sql($_GET['submit_action']);
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('Y-m-d');
$news_add="insert into news_info_data(news_title,content_info,submit_date,sort_id) values ('$news_name','$content','$submit_date','$submit_action')";
mysqli_query ($conn, $news_add);
?>
<script language="javascript">alert('添加成功!');location.href='news_list_manage.php?disp_type=list&submit_action=<?=$submit_action?>';</script>
<?php
break;
case 'edit': 
$news_name=str_sql($_POST['news_name']);
$content=$_POST['content'];
if ($news_name=='' && $content=='') { ?>
<script language="javascript">alert('请输入所有内容!'); history.go(-1);</script>
<?php
exit; }
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('Y-m-d');







$id=str_sql($_GET['id']);
$sort_id=str_sql($_GET['sort_id']);

if ($sort_id!='') {
$news_edit="update news_info_data set news_title='$news_name',content_info='$content' where sort_id='$sort_id'";
} else {
$news_edit="update news_info_data set news_title='$news_name',content_info='$content' where id='$id'";
}
mysqli_query ($conn, $news_edit);
?>
<script language="javascript">
alert('修改成功!');










<?php if ($sort_id!='') { ?>history.go(-1);<?php } else { ?>location.href='news_list_manage.php?disp_type=list&submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&page=<?=$_GET['page']?>';<?php } ?>
</script>
<?php
break; case 'del':
$id=str_sql($_GET['id']); 
$news_del="delete from news_info_data where id='$id'";
mysqli_query ($conn, $news_del); ?>

<script language="javascript">alert('删除成功!');location.href='news_list_manage.php?disp_type=list&submit_action=<?=$_GET['submit_action']?>&search_value=<?=$_GET['search_value']?>&page=<?=$_GET['page']?>';</script>
<?php break; case 'state_edit':
$id=str_sql($_GET['id']);
$position_value=str_sql($_POST['position_value']);

$state_value_1=str_sql($_POST['state_value_1']);
$state_update="update news_info_data set display_position='$position_value',state_info='$state_value_1' where id='$id'";



mysqli_query ($conn, $state_update); ?><script language="javascript">alert('修改成功!');history.go(-1);</script>
<?php } ?>