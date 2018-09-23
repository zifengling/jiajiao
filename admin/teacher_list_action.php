<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
require('../conn.php');
ob_start();
session_start();
require('login_user_check.php');
switch ($_GET['type_action']) {
       case "add":	   	   
$occupation_value=str_sql($_POST['occupation_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$occupation_value' and sort_id='occupation'";
$rs_sort_check=mysqli_query ($sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('您选择的教员身份不存在!'); history.go(-1);</script><?php exit; }

$degree_value=str_sql($_POST['degree_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$degree_value' and sort_id='degree'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('您选择的学历学位不存在!'); history.go(-1);</script><?php exit; }

$service_value=str_sql($_POST['service_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$service_value' and sort_id='service'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('您选择的授课方式不存在!'); history.go(-1);</script><?php exit; }

$service_time=str_sql($_POST['service_time']);   

$time_check=',周一上,周一下,周一晚,周二上,周二下,周二晚,周三上,周三下,周三晚,周四上,周四下,周四晚,周五上,周五下,周五晚,周六上,周六下,周六晚,周日上,周日下,周日晚,';
for ($i=0;$i<=count($service_time)-1;$i++) { $service_time_value=$service_time_value.$service_time[$i].','; 

if ($service_time[$i]!='') {
if (trim(strpos($time_check,$service_time[$i]))=='') { ?><script language="javascript">alert('您选择的可授课时间不存在!'); history.go(-1); </script><?php 
exit; } } }
if ($service_time_value==',') { ?><script language="javascript">alert('请选择可授课时间!'); history.go(-1); </script><?php exit; }
$subject_content=str_sql($_POST['subject_content']);
$subject_count=0;
for ($i=0;$i<=20;$i++) {
$subject_content=substr($subject_content,strpos($subject_content,',')+1,strlen($subject_content));
if (trim(strpos($subject_content,','))!='') {
$subject_count=$subject_count+1; }
}
$subject_content=str_sql($_POST['subject_content']);
if ($subject_count==0) { $subject_count=1; }
for ($k=1;$k<=$subject_count;$k++) {
$subject_content=substr($subject_content,strpos($subject_content,',')+1,strlen($subject_content));
$subject_value=substr($subject_content,0,strpos($subject_content,','));
$subject_value=substr($subject_value,0,strpos($subject_value,'（')); 
$subject_check="select * from sort_info_manage where sort_title='$subject_value' and sort_id='subject'";
$rs_subject_check=mysqli_query ($conn, $subject_check);
if ($rs_subject=mysqli_fetch_object($rs_subject_check)) { $id=str_sql($rs_subject->id); } else { ?><script language="javascript">alert('你选择的课程不存在!'); history.go(-1);</script><?php exit; }
$subject_value=substr($subject_content,0,strpos($subject_content,','));
$subject_value=substr($subject_value,strpos($subject_value,'（')+2,strpos($subject_value,'）')-strpos($subject_value,'（')-2);
$subject_check="select * from sort_info_manage where sort_title='$subject_value' and sort_id='$id'";
$rs_subject_check=mysqli_query ($conn, $subject_check);
if (mysqli_num_rows($rs_subject_check)==0) { ?><script language="javascript">alert('你选择的课程不存在!'); history.go(-1);</script><?php exit; }
}

if ($subject_count>20) { ?><script language="javascript">alert('可辅导课程最多只能选择20个!');history.go(-1);</script><?php }
$subject_content=str_sql($_POST['subject_content']);
$experience_value=str_sql($_POST['experience_value']);
$experience_check=',0年,1年,2年,3年,4年,5年,6年,7年,8年,9年,10年,大于10年,';
if (trim(strpos($experience_check,','.$experience_value.','))=='') { ?><script language="javascript">alert('您选择辅导经验不存在!'); history.go(-1); </script><?php 
exit; }
$province_name=str_sql($_POST['province_name']);
$city_name=str_sql($_POST['city_name']);
$area_name=','.$province_name.','.$city_name.',';
$sort_check="select * from sort_info_manage where id='$province_name'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('您选择的辅导区域不存在!'); history.go(-1);</script><?php exit; }
$sort_check="select * from sort_info_manage where id='$city_name'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('您选择的辅导区域不存在!'); history.go(-1);</script><?php exit; }
$school=str_sql($_POST['school']);
$professional=str_sql($_POST['professional']);
if ($_POST['class_value']=='1') { 
$student_number_check=',1-5人,5-10人,10-15人,15-20人,20-30人,全托,';
$class_value=str_sql($_POST['student_number']);
if (trim(strpos($student_number_check,$class_value))=='') { ?><script language="javascript">alert('您选择的小班规模不存在!'); history.go(-1);</script><?php
exit; }
} else { $class_value='0'; }

$person_content=str_sql($_POST['person_content']);
$area_content=str_sql($_POST['area_content']);
$service_content=str_sql($_POST['service_content']);
$effective_value=str_sql($_POST['effective_value']);
if ($effective_value!='1' && $effective_value!='2' && $effective_value!='3' && $effective_value!='4' && $effective_value!='5') { ?>
<script language="javascript">alert('您选择的有效期不存在!'); history.go(-1);</script>
<?php
exit; }

if ($occupation_value!='' && $degree_value!='' && $service_value!='' && $service_time!='' && $service_time_value!='' && $subject_content!=''  && $subject_content!=',' && $experience_value!='' && $area_name!='' && $school!='' && $professional!='' && $class_value!='' && $person_content!='' && $area_content!='' && $effective_value!='') {
$login_user_name=str_sql($_SESSION['login_user_name']);
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('Y-m-d');
$teacher_add="insert into teacher_info_data(occupation_info,degree_info,service_type,service_time_info,subject_title,experience_info,area_title,school_title,professional_title,class_student,person_info,area_info,service_info,effective_time,user_name,submit_date) values ('$occupation_value','$degree_value','$service_value','$service_time_value','$subject_content','$experience_value','$area_name','$school','$professional','$class_value','$person_content','$area_content','$service_content','$effective_value','$login_user_name','$submit_date')";
mysqli_query ($conn, $teacher_add);
?>
<script language="javascript">alert('恭喜您，您的资料发布成功，请耐心等待审核!');location.href='teacher_list_manage.php?disp_type=list';</script>
<?php }
break; case 'del':
$id=str_sql($_GET['id']); 
$teacher_del="delete from teacher_info_data where id='$id'";
mysqli_query ($conn, $teacher_del); ?>
<script language="javascript">alert('删除成功!');location.href='teacher_list_manage.php?disp_type=list&occupation_value=<?=$_GET['occupation_value']?>&degree_value=<?=$_GET['degree_value']?>&service_value=<?=$_GET['service_value']?>&service_time=<?=$_GET['service_time']?>&subject_name=<?=$_GET['subject_name']?>&subject_name_1=<?=$_GET['subject_name_1']?>&subject_name_2=<?=$_GET['subject_name_2']?>&subject_content=<?=$_GET['subject_content']?>&experience_value=<?=$_GET['experience_value']?>&province_name=<?=$province_name?>&city_name=<?=$city_name?>&school=<?=$school?>&professional=<?=$professional?>&class_value=<?=$class_value?>&student_number=<?=$_GET['student_number']?>&state_value=<?=$_GET['state_value']?>&effective_value=<?=$_GET['effective_value']?>&page=<?=$_GET['page']?>';</script>
<?php break; case 'state_edit':
$id=str_sql($_GET['id']);
if ($_POST['position_value_'.$id]!='') { $position_value=str_sql($_POST['position_value_'.$id]); } else { $position_value=0; }
$state_value_1=str_sql($_POST['state_value_'.$id]); 
$state_update="update teacher_info_data set display_position='$position_value',state_info='$state_value_1' where id='$id'";
mysqli_query ($conn, $state_update); ?><script language="javascript">alert('修改成功!');history.go(-1);</script>
<?php } ?>