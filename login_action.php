<?php
require("conn.php");
ob_start();
session_start();
header("Content-Type: text/html; charset=GB2312");
switch ($_GET['type_action']) {
case "user_check":
$form_value=str_sql($_GET['form_value']);
$user_name_check="select * from user_info_manage where user_name='$form_value'";
$rs_user_name=mysqli_query ($conn, $user_name_check);
if (mysqli_fetch_object ($rs_user_name)) { echo '此用户名不可用！'; } else { echo '此用户名可用！'; }
break;
case "login":
$username=str_sql($_POST['username']);
$userpassword=str_sql($_POST['userpassword']);
$code=str_sql($_POST['code']);
$code_value=$_SESSION["VerifyCode"];
if (strtolower($code)!=strtolower($code_value)) { ?><script language="javascript">alert('请输入正确的验证码!');history.go(-1);</script><?php exit; }
$user_check="select * from user_info_manage where user_name='$username' and user_password='$userpassword'";
$rs_user_check=mysqli_query ($conn, $user_check);
if ($rs_user=mysqli_fetch_object ($rs_user_check)) {
$_SESSION['login_user_name']=$rs_user->user_name;
if ($rs_user->user_level=='admin_user') { $_SESSION['login_user_level']='admin_user'; ?>
<script language="javascript">location.href='admin/main.php';</script>
<?php } else { $_SESSION['login_user_type']=$rs_user->user_level;
if ($rs_user->user_level=='教员') {
$integral_check="select integral_info from web_info_manage";
$rs_integral_check=mysqli_query ($conn, $integral_check);
$rs_integral=mysqli_fetch_object ($rs_integral_check);
$integral_value=explode(',',$rs_integral->integral_info);
$integral_update="update user_info_manage set integral_count=integral_count+$integral_value[1] where user_name='$username' and user_password='$userpassword'";
mysqli_query ($conn, $integral_update);
}
?>
<script language="javascript"><?php if ($rs_user->user_level=='教员') { ?>location.href='teacher_manage.php?disp_type=add';<?php } else { ?>location.href='student_manage.php?disp_type=add';<?php } ?></script>
<?php } } else { ?>
<script language="javascript">alert('对不起,用户名或密码不正确!');history.go(-1);</script>
<?php }
break;
case "reset_login":
$_SESSION['login_user_name']='';
if ($_SESSION['login_user_level']!='') { $_SESSION['login_user_level']=''; } ?>
<script language="javascript">top.location.href='index.php';</script>
<?php
break;
case "add":
$username=str_sql($_POST['username']);
$userpassword=str_sql($_POST['userpassword']);
$userpassword_1=str_sql($_POST['userpassword_1']);
$question_value=str_sql($_POST['question_value']);
if ($question_value=='自定义问题') { $question_value=str_sql($_POST['question_value_1']); }
$ask_value=str_sql($_POST['ask_value']);
$email=str_sql($_POST['email']);
$yourname=str_sql($_POST['yourname_1'].','.$_POST['yourname_2']);
$sex=str_sql($_POST['sex']);
$province_name=str_sql($_POST['province_name']);
$city_name=str_sql($_POST['city_name']);
$address=str_sql($_POST['address']);
$zip_code=str_sql($_POST['zip_code']);
$tel=str_sql($_POST['tel']);
$mobile=str_sql($_POST['mobile']);
$fax=str_sql($_POST['fax']);
$qq_number=str_sql($_POST['qq_number']);
$file_info=str_sql($_FILES['file_info']['name']);
if ($file_info!='') { 
$file_value=substr($file_info,strlen($file_info)-4,4);
if ($file_value=='.jpg' || $file_value=='.JPG' || $file_value=='.gif' || $file_value=='.GIF') {
move_uploaded_file($_FILES['file_info']['tmp_name'],'upload/'.$_FILES['file_info']['name']);
$rand_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
rename('upload/'.$_FILES['file_info']['name'],'upload/'.$rand_number.$_FILES['file_info']['name']);
$file_web_url='upload/'.$rand_number.$_FILES['file_info']['name'];
} else { ?><script language="javascript">alert('您的相片只能上传.jpg和.gif格式的图片!');history(-1);</script><?php exit; } }
$user_type=str_sql($_POST['user_type']);
$code=str_sql($_POST['code']);
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('y-m-d');
if (strtolower($code)!=strtolower($_SESSION["VerifyCode"])) { ?><script language="javascript">alert('请输入正确的验证码!');history.go(-1);</script><?php
exit;
}
$city_id=str_sql($province_name);
$user_check="select user_name from user_info_manage where user_name='$username'";
$rs_user_check=mysqli_query ($conn, $user_check);
if (mysqli_fetch_object ($rs_user_check)) { ?>
<script language="javascript">alert('此用户名已存在，请另取一个！');history.go(-1);</script>
<?php exit; }
$user_check="select e_mail from user_info_manage where e_mail='$email'";
$rs_user_check=mysqli_query ($conn, $user_check);
if (mysqli_fetch_object ($rs_user_check)) { ?>
<script language="javascript">alert('此邮箱已存在，请另取一个！');history.go(-1);</script>
<?php exit; }




if ($user_type=='教员') {
$integral_check="select integral_info from web_info_manage";
$rs_integral_check=mysqli_query ($conn, $integral_check);
$rs_integral=mysqli_fetch_object ($rs_integral_check);




$integral_value=explode(',',$rs_integral->integral_info);
$user_add="insert into user_info_manage(user_name,user_password,question_info,ask_info,e_mail,your_name,sex_info,area_info,address_info,zip_code_number,tel_number,mobile_number, 	fax_number,qq_info,pic_url,user_level,money_count,state_info,submit_date,integral_count) values ('$username','$userpassword','$question_value','$ask_value','$email','$yourname','$sex','$city_id','$address','$zip_code','$tel','$mobile','$fax','$qq_number','$file_web_url','$user_type',0,0,'$submit_date','$integral_value[0]')";
if ($_GET['id']!='') { $id=str_sql($_GET['id']);
$integral_update="update user_info_manage set integral_count=integral_count+$integral_value[2] where id='$id'";
mysqli_query ($conn, $integral_update); }
} else {
$user_add="insert into user_info_manage(user_name,user_password,question_info,ask_info,e_mail,your_name,sex_info,area_info,address_info,zip_code_number,tel_number,mobile_number, 	fax_number,qq_info,pic_url,user_level,money_count,state_info,submit_date) values ('$username','$userpassword','$question_value','$ask_value','$email','$yourname','$sex','$city_id','$address','$zip_code','$tel','$mobile','$fax','$qq_number','$file_web_url','$user_type',0,0,'$submit_date')"; 
}
mysqli_query ($conn, $user_add);
$_SESSION['login_user_name']=$username;
$_SESSION['login_user_type']=$user_type;
?>
<script language="javascript">alert('请继续完善您的资料!');<?php if ($user_type=='教员') { ?>location.href='teacher_manage.php?disp_type=add';<?php } else { ?>location.href='student_manage.php?disp_type=add';<?php } ?></script>
<?php

break;
case 'edit':
if ($_SESSION['login_user_level']!='admin_user') { require('login_user_check.php'); }
$email=str_sql($_POST['email']);
$yourname=str_sql($_POST['yourname_1'].','.$_POST['yourname_2']);
$sex=str_sql($_POST['sex']);
$province_name=str_sql($_POST['province_name']);
$city_name=str_sql($_POST['city_name']);
$address=str_sql($_POST['address']);
$zip_code=str_sql($_POST['zip_code']);
$tel=str_sql($_POST['tel']);
$mobile=str_sql($_POST['mobile']);
$fax=str_sql($_POST['fax']);
$qq_number=str_sql($_POST['qq_number']);
$money_value=str_sql($_POST['money_value']);
$file_info=str_sql($_FILES['file_info']['name']);
if ($file_info!='') { 
$file_value=substr($file_info,strlen($file_info)-4,4);
if ($file_value=='.jpg' || $file_value=='.JPG' || $file_value=='.gif' || $file_value=='.GIF') {
move_uploaded_file($_FILES['file_info']['tmp_name'],'upload/'.$_FILES['file_info']['name']);
$rand_number=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
rename('upload/'.$_FILES['file_info']['name'],'upload/'.$rand_number.$_FILES['file_info']['name']);
$file_web_url='upload/'.$rand_number.$_FILES['file_info']['name'];
} else { ?><script language="javascript">alert('您的相片只能上传.jpg和.gif格式的图片!');history(-1);</script><?php exit; } }
$user_type=str_sql($_POST['user_type']);
$integral_value=str_sql($_POST['integral_value']);
if ($_SESSION['login_user_level']!='admin_user') { $login_user_name=str_sql($_SESSION['login_user_name']); } else { $login_user_name=str_sql($_GET['user_name']); }
if ($email!='' && $yourname!='' && $sex!='' && $province_name!='' && $address!='' && $mobile!='' && $user_type!='') {
$city_id=str_sql($province_name);
$user_check="select e_mail from user_info_manage where e_mail='$email' and user_name<>'$login_user_name'";
$rs_user_check=mysqli_query ($conn, $user_check);
if (mysqli_fetch_object ($rs_user_check)) { ?>
<script language="javascript">alert('此邮箱已存在，请另取一个！');history.go(-1);</script>
<?php exit; }
if ($file_web_url!='') {




$user_edit="update user_info_manage set e_mail='$email',your_name='$yourname',sex_info='$sex',area_info='$city_id',address_info='$address',zip_code_number='$zip_code',tel_number='$tel',mobile_number='$mobile', 	fax_number='$fax',qq_info='$qq_number',pic_url='$file_web_url',user_level='$user_type',integral_count='$integral_value' where user_name='$login_user_name'";
} else {
$user_edit="update user_info_manage set e_mail='$email',your_name='$yourname',sex_info='$sex',area_info='$city_id',address_info='$address',zip_code_number='$zip_code',tel_number='$tel',mobile_number='$mobile', 	fax_number='$fax',qq_info='$qq_number',user_level='$user_type',integral_count='$integral_value' where user_name='$login_user_name'";
}
mysqli_query ($conn, $user_edit);
if ($money_value!='') { $user_edit="update user_info_manage set money_count='$money_value' where user_name='$login_user_name'";
mysqli_query ($conn, $user_edit);
}
?>
<script language="javascript">alert('恭喜您，修改基本资料成功!');location.href='<?php if (trim(strpos($_SERVER['HTTP_REFERER'],'person_manage.php'))!='') { ?>person_manage.php<?php } else { if ($_GET['url_name']!='') { ?><?=$_GET['url_name']?><?php } else { ?>admin/user_list_manage.php?disp_type=list&occupation_value=<?=$_GET['occupation_value']?>&province_name=<?=$_GET['province_name']?>&city_name=<?=$_GET['city_name']?>&search_type=<?=$_GET['search_type']?>&search_value=<?=$_GET['search_value']?>&year_value=<?=$_GET['year_value']?>&month_value=<?=$_GET['month_value']?>&day_value=<?=$_GET['day_value']?>&state_value=<?=$_GET['state_value']?>&page=<?=$_GET['page']?><?php } } ?>';</script>
<?php
}
break; case 'state_edit':
if ($_SESSION['login_user_level']=='admin_user') {
$id=str_sql($_GET['id']);
$state_value=str_sql($_POST['state_value_'.$id]);
$state_update="update user_info_manage set state_info='$state_value' where id='$id'";
mysqli_query ($conn, $state_update);




















$integral_check="select integral_info from web_info_manage";
$rs_integral_check=mysqli_query ($conn, $integral_check);
$rs_integral=mysqli_fetch_object ($rs_integral_check);
$integral_value=explode(',',$rs_integral->integral_info);
$integral_update="update user_info_manage set integral_count=integral_count+$integral_value[3] where id='$id'";
mysqli_query ($conn, $integral_update);
?><script language="javascript">alert('修改成功!');history.go(-1);</script><?php }

break; case 'order_state_edit':
$id=str_sql($_GET['id']);
$submit_action=str_sql($_GET['submit_action']);
$state_value=str_sql($_POST['state_value']);
$state_update="update order_info_data set price_info='$state_value' where id='$id'";
mysqli_query ($conn, $state_update);
?><script language="javascript">alert('修改状态成功!'); location.href='admin/order_list_manage.php?disp_type=order_list&submit_action=<?=$submit_action?>&page=<?=$_GET['page']?>';</script><?php

break; case 'password_edit':
require('login_user_check.php');
if ($_POST['now_password']!='' && $_POST['new_password']!='' && $_POST['new_password_1']!='' && $_POST['new_password']==$_POST['new_password_1']) {
$login_user_name=str_sql($_SESSION['login_user_name']);
$now_password=str_sql($_POST['now_password']);
$new_password=str_sql($_POST['new_password']);
$user_check="select * from user_info_manage where user_name='$login_user_name' and user_password='$now_password'";
$rs_user_check=mysqli_query ($conn, $user_check);
if (mysqli_fetch_object ($rs_user_check)) {
$password_update="update user_info_manage set user_password='$new_password' where user_name='$login_user_name'";
mysqli_query ($conn, $password_update); ?>
<script language="javascript">alert('修改密码成功!');history.go(-1);</script><?php } else { ?><script language="javascript">alert('请输入正确的旧密码!');history.go(-1);</script><?php } }

break; case 'find_password':
$username=str_sql($_GET['username']);
$ask_value=str_sql($_POST['ask_value']);
$userpassword=str_sql($_POST['userpassword']);
$user_check="select * from user_info_manage where user_name='$username' and ask_info='$ask_value'";
$rs_user_check=mysqli_query ($conn, $user_check);
if (mysqli_fetch_object ($rs_user_check)) {
$password_update="update user_info_manage set user_password='$userpassword' where user_name='$username' and ask_info='$ask_value'";
mysqli_query ($conn, $password_update);
?><script language="javascript">alert('修改密码成功!');history.go(-1);</script><?php
} else { ?><script language="javascript">alert('对不起，用户名或问题的答案不正确!');history.go(-1);</script><?php }
break; case 'order_del': $id=str_sql($_GET['id']);
//echo $_GET['disp_type']; exit;
$order_info_del="delete from order_info_data where id='$id'";
mysqli_query ($conn, $order_info_del);
?><script language="javascript">location.href='admin/order_list_manage.php?disp_type=order_list&submit_action=<?=$_GET['submit_action']?>&page=<?=$_GET['page']?>';</script><?php
}








?>