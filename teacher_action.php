<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
require('conn.php');
ob_start();
session_start();
if ($_SESSION['login_user_level']!='admin_user') { require('login_user_check.php'); }
switch ($_GET['type_action']) {
       case "add":	   	   
$occupation_value=str_sql($_POST['occupation_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$occupation_value' and sort_id='occupation'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('��ѡ��Ľ�Ա��ݲ�����!'); history.go(-1);</script><?php exit; }

$degree_value=str_sql($_POST['degree_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$degree_value' and sort_id='degree'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('��ѡ���ѧ��ѧλ������!'); history.go(-1);</script><?php exit; }

$service_value=str_sql($_POST['service_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$service_value' and sort_id='service'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('��ѡ����ڿη�ʽ������!'); history.go(-1);</script><?php exit; }

$service_time=str_sql($_POST['service_time']);

$time_check=',��һ��,��һ��,��һ��,�ܶ���,�ܶ���,�ܶ���,������,������,������,������,������,������,������,������,������,������,������,������,������,������,������,';
for ($i=0;$i<=count($service_time)-1;$i++) { $service_time_value=$service_time_value.$service_time[$i].','; 

if ($service_time[$i]!='') {
if (trim(strpos($time_check,$service_time[$i]))=='') { ?><script language="javascript">alert('��ѡ��Ŀ��ڿ�ʱ�䲻����!'); history.go(-1); </script><?php 
exit; } } }
if ($service_time_value==',') { ?><script language="javascript">alert('��ѡ����ڿ�ʱ��!'); history.go(-1); </script><?php exit; }
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
$subject_value=substr($subject_value,0,strpos($subject_value,'��')); 
$subject_check="select * from sort_info_manage where sort_title='$subject_value' and sort_id='subject'";
$rs_subject_check=mysqli_query ($conn, $subject_check);
if ($rs_subject=mysqli_fetch_object($rs_subject_check)) { $id=str_sql($rs_subject->id); } else { ?><script language="javascript">alert('��ѡ��Ŀγ̲�����!'); history.go(-1);</script><?php exit; }
$subject_value=substr($subject_content,0,strpos($subject_content,','));
$subject_value=substr($subject_value,strpos($subject_value,'��')+2,strpos($subject_value,'��')-strpos($subject_value,'��')-2);
$subject_check="select * from sort_info_manage where sort_title='$subject_value' and sort_id='$id'";
$rs_subject_check=mysqli_query ($conn, $subject_check);
if (mysqli_num_rows($rs_subject_check)==0) { ?><script language="javascript">alert('��ѡ��Ŀγ̲�����!'); history.go(-1);</script><?php exit; }
}
if ($subject_count>20) { ?><script language="javascript">alert('�ɸ����γ����ֻ��ѡ��20��!');history.go(-1);</script><?php }
$subject_content=str_sql($_POST['subject_content']);
$experience_value=str_sql($_POST['experience_value']);
$experience_check=',0��,1��,2��,3��,4��,5��,6��,7��,8��,9��,10��,����10��,';
if (trim(strpos($experience_check,','.$experience_value.','))=='') { ?><script language="javascript">alert('��ѡ�񸨵����鲻����!'); history.go(-1); </script><?php 
exit; }
$province_name=str_sql($_POST['province_name']);
$city_name=str_sql($_POST['city_name']);
$area_name=str_sql($_POST['area_name']);
$area_name_value=',';







for ($i=0;$i<=count($area_name)-1;$i++) { $area_name_value=$area_name_value.$area_name[$i].','; }
//$sort_check="select * from sort_info_manage where id='$province_name'";
//$rs_sort_check=mysqli_query ($conn, $sort_check);
//if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">//alert('��ѡ��ĸ������򲻴���!'); history.go(-1);</script><?php //exit; }
//$sort_check="select * from sort_info_manage where id='$city_name'";
//$rs_sort_check=mysqli_query ($conn, $sort_check);
//if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">//alert('��ѡ��ĸ������򲻴���!'); history.go(-1);</script><?php //exit; }
$school=str_sql($_POST['school']);
$professional=str_sql($_POST['professional']);
if ($_POST['class_value']=='1') { 
$student_number_check=',1-5��,5-10��,10-15��,15-20��,20-30��,ȫ��,';
$class_value=str_sql($_POST['student_number']);
if (trim(strpos($student_number_check,$class_value))=='') { ?><script language="javascript">alert('��ѡ���С���ģ������!'); history.go(-1);</script><?php
exit; }
} else { $class_value='0'; }

$person_content=str_sql($_POST['person_content']);
$area_content=str_sql($_POST['area_content']);
$service_content=str_sql($_POST['service_content']);
$effective_value=str_sql($_POST['effective_value']);
if ($effective_value!='1' && $effective_value!='2' && $effective_value!='3' && $effective_value!='4' && $effective_value!='5') { ?>
<script language="javascript">alert('��ѡ�����Ч�ڲ�����!'); history.go(-1);</script>
<?php
exit; }

if ($occupation_value!='' && $degree_value!='' && $service_value!='' && $service_time!='' && $service_time_value!='' && $subject_content!=''  && $subject_content!=',' && $experience_value!='' && $area_name!='' && $school!='' && $professional!='' && $class_value!='' && $person_content!='' && $effective_value!='') {
$login_user_name=str_sql($_SESSION['login_user_name']);
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('Y-m-d');

$teacher_add="insert into teacher_info_data(occupation_info,degree_info,service_type,service_time_info,subject_title,experience_info,area_title,school_title,professional_title,class_student,person_info,area_info,service_info,effective_time,display_position,state_info,user_name,visit_count,submit_date) values ('$occupation_value','$degree_value','$service_value','$service_time_value','$subject_content','$experience_value','$area_name_value','$school','$professional','$class_value','$person_content','$area_content','$service_content','$effective_value','0','0','$login_user_name','0','$submit_date')";
mysqli_query ($conn, $teacher_add);
?>
<script language="javascript">alert('��ϲ�����������Ϸ����ɹ��������ĵȴ����!');location.href='teacher_manage.php?disp_type=list';</script>
<?php }
break;
case 'edit': 
$occupation_value=str_sql($_POST['occupation_value']);

$sort_check="select sort_title from sort_info_manage where sort_title='$occupation_value'";
$rs_sort_check=mysqli_query ($conn, $sort_check);

if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('��ѡ��Ľ�Ա��ݲ�����!'); history.go(-1);</script><?php exit; }

$degree_value=str_sql($_POST['degree_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$degree_value'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('��ѡ���ѧ��ѧλ������!'); history.go(-1);</script><?php exit; }

$service_value=str_sql($_POST['service_value']);
$sort_check="select sort_title from sort_info_manage where sort_title='$service_value'";
$rs_sort_check=mysqli_query ($conn, $sort_check);
if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">alert('��ѡ����ڿη�ʽ������!'); history.go(-1);</script><?php exit; }

$service_time=str_sql($_POST['service_time']); 
$time_check=',��һ��,��һ��,��һ��,�ܶ���,�ܶ���,�ܶ���,������,������,������,������,������,������,������,������,������,������,������,������,������,������,������,';

for ($i=0;$i<=count($service_time)-1;$i++) { $service_time_value=$service_time_value.$service_time[$i].','; 
if (trim(strpos($time_check,$service_time[$i]))=='') { ?><script language="javascript">alert('��ѡ��Ŀ��ڿ�ʱ�䲻����!'); history.go(-1); </script><?php 
exit; }
}

$service_time_value=substr($service_time_value,0,strlen($service_time_value)-1);
if ($service_time_value=='') { ?><script language="javascript">alert('��ѡ����ڿ�ʱ��!'); history.go(-1); </script>
<?php
exit; }
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
$subject_value=substr($subject_value,0,strpos($subject_value,'��')); 
$subject_check="select * from sort_info_manage where sort_title='$subject_value'";
$rs_subject_check=mysqli_query ($conn, $subject_check);
if ($rs_subject=mysqli_fetch_object($rs_subject_check)) { $id=str_sql($rs_subject->id); } else { ?><script language="javascript">alert('��ѡ��Ŀγ̲�����!'); history.go(-1);</script><?php exit; }
$subject_value=substr($subject_content,0,strpos($subject_content,','));
$subject_value=substr($subject_value,strpos($subject_value,'��')+2,strpos($subject_value,'��')-strpos($subject_value,'��')-2);
$subject_check="select * from sort_info_manage where sort_title='$subject_value' and sort_id='$id'";
$rs_subject_check=mysqli_query ($conn, $subject_check);
if (mysqli_num_rows($rs_subject_check)==0) { ?><script language="javascript">alert('��ѡ��Ŀγ̲�����!'); history.go(-1);</script><?php exit; }
}
if ($subject_count>20) { ?><script language="javascript">alert(<?=$subject_count?>); alert('�ɸ����γ����ֻ��ѡ��20��!');history.go(-1);</script><?php }
$subject_content=str_sql($_POST['subject_content']);
$experience_value=str_sql($_POST['experience_value']);
$experience_check=',0��,1��,2��,3��,4��,5��,6��,7��,8��,9��,10��,����10��,';
if (trim(strpos($experience_check,','.$experience_value.','))=='') { ?><script language="javascript">alert('��ѡ�񸨵����鲻����!'); history.go(-1); </script><?php 
exit; }
$province_name=str_sql($_POST['province_name']);
$city_name=str_sql($_POST['city_name']);






















//$area_name=','.$province_name.','.$city_name.',';
$area_name=str_sql($_POST['area_name']);
$area_name_value=',';



for ($i=0;$i<=count($area_name)-1;$i++) { $area_name_value=$area_name_value.$area_name[$i].','; }
//$sort_check="select * from sort_info_manage where id='$province_name'";
//$rs_sort_check=mysqli_query ($conn, $sort_check);
//if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">//alert('��ѡ��ĸ������򲻴���!'); history.go(-1);</script><?php //exit; }
//$sort_check="select * from sort_info_manage where id='$city_name'";
//$rs_sort_check=mysqli_query ($conn, $sort_check);
//if (mysqli_num_rows($rs_sort_check)==0) { ?><script language="javascript">//alert('��ѡ��ĸ������򲻴���!'); history.go(-1);</script><?php //exit; }
$school=str_sql($_POST['school']);
$professional=str_sql($_POST['professional']);
if ($_POST['class_value']=='1') { 
$student_number_check=',1-5��,5-10��,10-15��,15-20��,20-30��,ȫ��,';
$class_value=str_sql($_POST['student_number']);
if (trim(strpos($student_number_check,$class_value))=='') { ?><script language="javascript">alert('��ѡ���С���ģ������!'); history.go(-1);</script><?php
exit; }
} else { $class_value='0'; }

$person_content=str_sql($_POST['person_content']);
$area_content=str_sql($_POST['area_content']);
$service_content=str_sql($_POST['service_content']);
$effective_value=str_sql($_POST['effective_value']);
if ($effective_value!='1' && $effective_value!='2' && $effective_value!='3' && $effective_value!='4' && $effective_value!='5') { ?>
<script language="javascript">alert('��ѡ�����Ч�ڲ�����!'); history.go(-1);</script>
<?php
exit; }
if ($occupation_value!='' && $degree_value!='' && $service_value!='' && $service_time!='' && $service_time_value!='' && $subject_content!=''  && $subject_content!=',' && $experience_value!='' && $area_name!='' && $school!='' && $professional!='' && $class_value!='' && $person_content!='' && $area_content!='' && $effective_value!='') {
date_default_timezone_set('Asia/Shanghai');
$submit_date=date('Y-m-d');
$id=str_sql($_GET['id']);


$teacher_edit="update teacher_info_data set occupation_info='$occupation_value',degree_info='$degree_value',service_type='$service_value',service_time_info='$service_time_value',subject_title='$subject_content',experience_info='$experience_value',area_title='$area_name_value',school_title='$school',professional_title='$professional',class_student='$class_value',person_info='$person_content',area_info='$area_content',service_info='$service_content',effective_time='$effective_value' where id='$id'";
mysqli_query ($conn, $teacher_edit);
?>
<script language="javascript">
alert('�޸ĳɹ�!');

<?php if (trim(strpos($_SERVER['HTTP_REFERER'],'teacher_list_manage.php'))!='') { ?>
location.href='admin/teacher_list_manage.php?disp_type=list&occupation_value=<?=$_GET['occupation_value_1']?>&degree_value=<?=$_GET['degree_value_1']?>&service_value=<?=$_GET['service_value_1']?>&service_time=<?=$_GET['service_time']?>&subject_name=<?=$_GET['subject_name_a']?>&subject_name_1=<?=$_GET['subject_name_b']?>&subject_name_2=<?=$_GET['subject_name_c']?>&subject_content=<?=$_GET['subject_content_d']?>&experience_value=<?=$_GET['experience_value_1']?>&province_name=<?=$_GET['province_name_1']?>&city_name=<?=$_GET['city_name_1']?>&school=<?=$_GET['school']?>&professional=<?=$_GET['professional_1']?>&class_value=<?=$_GET['class_value']?>&student_number=<?=$_GET['student_number_1']?>&state_value=<?=$_GET['state_value_1']?>&effective_value=<?=$_GET['effective_value_1']?>&page=<?=$_GET['page']?>';
<?php } else { ?>
location.href='teacher_manage.php?disp_type=list&page=<?=$_GET['page']?>';
<?php } ?>
</script>
<?php }
break;
case 'del':
$id=str_sql($_GET['id']); 
$teacher_del="delete from teacher_info_data where id='$id'";
mysqli_query ($conn, $teacher_del); ?>
<script language="javascript">alert('ɾ���ɹ�!');location.href='teacher_manage.php?disp_type=list&page=<?=$_GET['page']?>';</script>
<?php } ?>