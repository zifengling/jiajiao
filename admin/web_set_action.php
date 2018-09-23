<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><?php
require("../conn.php");
ob_start();
session_start();
switch ($_GET['type_action']) {
case "edit":
$id=str_sql($_GET['id']);
$web_name=str_sql($_POST['web_name']);
$web_name_1=str_sql($_POST['web_name_1']);
$keywords=str_sql($_POST['keywords']);
$description=str_sql($_POST['description']);
$address=str_sql($_POST['address']);
$tel=str_sql($_POST['tel']);
$qq_number_1=str_replace(',','',str_sql($_POST['qq_number_1']));
$qq_number_2=str_replace(',','',str_sql($_POST['qq_number_2']));
$qq_number_3=str_replace(',','',str_sql($_POST['qq_number_3']));
$qq_number_4=str_replace(',','',str_sql($_POST['qq_number_4']));
$qq_number_5=str_replace(',','',str_sql($_POST['qq_number_5']));
$qq_number_6=str_replace(',','',str_sql($_POST['qq_number_6']));
$qq_number_7=str_replace(',','',str_sql($_POST['qq_number_7']));
$qq_number_8=str_replace(',','',str_sql($_POST['qq_number_8']));
$qq_number_9=str_replace(',','',str_sql($_POST['qq_number_9']));
$qq_number_10=str_replace(',','',str_sql($_POST['qq_number_10']));
$qq_number=$qq_number_1.','.$qq_number_2.','.$qq_number_3.','.$qq_number_4.','.$qq_number_5.','.$qq_number_6.','.$qq_number_7.','.$qq_number_8.','.$qq_number_9.','.$qq_number_10.',';

$file_info=str_sql($_FILES['file_info']['name']);
if ($file_info!='') { 
$file_value=substr($file_info,strlen($file_info)-4,4);
if ($file_value=='.jpg' || $file_value=='.JPG' || $file_value=='.gif' || $file_value=='.GIF') {













move_uploaded_file($_FILES['file_info']['tmp_name'],'../upload/'.$_FILES['file_info']['name']);
$rand_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
rename('../upload/'.$_FILES['file_info']['name'],'../upload/'.$rand_number.$_FILES['file_info']['name']);

$file_web_url='upload/'.$rand_number.$_FILES['file_info']['name'];
} else { ?><script language="javascript">alert('您的相片只能上传.jpg和.gif格式的图片!');history(-1);</script><?php exit; } }
$content=$_POST['content'];
if ($file_info!='') {

$news_edit="update web_info_manage set web_title='$web_name',web_title_1='$web_name_1',web_keywords='$keywords',web_description='$description',address_info='$address',tel_number='$tel',qq_info='$qq_number',logo_info='$file_web_url',bottom_info='$content'";
} else {
$news_edit="update web_info_manage set web_title='$web_name',web_title_1='$web_name_1',web_keywords='$keywords',web_description='$description',address_info='$address',tel_number='$tel',qq_info='$qq_number',bottom_info='$content'"; 

}




mysqli_query ($conn, $news_edit);
?>
<script language="javascript">
alert('修改成功!');
location.href='web_set_manage.php?disp_type=web_content';
</script>
<?php break; case 'password_edit':
if ($_POST['now_password']!='' && $_POST['new_password']!='' && $_POST['new_password_1']!='' && $_POST['new_password']==$_POST['new_password_1']) {
$now_password=str_sql($_POST['now_password']);
$new_password=str_sql($_POST['new_password']);
$user_check="select * from user_info_manage where user_password='$now_password' and user_level='admin_user'";
$rs_user_check=mysqli_query ($user_check);
if (mysqli_fetch_object ($rs_user_check)) {
$password_update="update user_info_manage set user_password='$new_password' where user_level='admin_user'";
mysqli_query ($conn, $password_update); ?>
<script language="javascript">alert('修改密码成功!');history.go(-1);</script><?php } else { ?><script language="javascript">alert('请输入正确的旧密码!');history.go(-1);</script><?php } } } ?>