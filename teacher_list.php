<?php
require("conn.php");
ob_start();
session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php if ($_GET['state_value']==2) { ?>认证教员<?php } if ($_GET['occupation_value']!='') { ?><?=$_GET['occupation_value']?><?php } if ($_GET['state_value']!=2 && $_GET['occupation_value']=='') { ?>教员信息<?php } ?></title>
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
</style></head> 
<script language="javascript">
function refresh_code() { login_form.imgcode.src="verifycode.php?a="+Math.random(); }
function onfocus_check(id) { id.style.border='2px #FF0000 solid'; }
function onblur_check(id) { id.style.border='1px #6CB5FF solid'; }
var xmlHttp
function sort_list(id,city_id)
{
var url='city_select.php?submit_action=1&id='+id+'&city_id='+city_id;
if (window.ActiveXObject)
{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")	
}
else if (window.XMLHttpRequest)
{
xmlHttp=new XMLHttpRequest()
}
xmlHttp.open("GET",url,true)
xmlHttp.onreadystatechange=stateChanged
xmlHttp.send(null)
}

function stateChanged()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{
document.getElementById("city_sort").innerHTML=xmlHttp.responseText
}
}

var subject_xmlHttp
function subject_list(id)
{
var url='subject_select.php?submit_action=1&id='+id;
if (window.ActiveXObject)
{
subject_xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")	
}
else if (window.XMLHttpRequest)
{
subject_xmlHttp=new XMLHttpRequest()
}
subject_xmlHttp.open("GET",url,true)
subject_xmlHttp.onreadystatechange=subject_stateChanged
subject_xmlHttp.send(null)
}

function subject_stateChanged()
{
if (subject_xmlHttp.readyState==4 || subject_xmlHttp.readyState=="complete")
{
document.getElementById("subject_sort").innerHTML=subject_xmlHttp.responseText
}
}

function select_option_add(select_value,id) {
for (i=0;i<=user_form.subject_name.options.length-1;i++) { if (user_form.subject_name.options[i].selected==true) { subject_option_1=user_form.subject_name.options[i].text; } }
subject_option_2=select_value.substr(select_value.indexOf(',')+1,select_value.length-(select_value.indexOf(',')+1));
if (subject_option_2=='--------选择--------') { exit; }
for (k=0;k<=user_form.subject_name_2.options.length-1;k++) { if (user_form.subject_name_2.options[k].text==subject_option_1+'（'+subject_option_2+'）') { alert(subject_option_1+'（'+subject_option_2+'）不能重复选择!'); exit; } }
var option_value=document.createElement('option');
option_value.value=user_form.subject_name.options[0].value;
option_value.text=subject_option_1+'（'+subject_option_2+'）';
user_form.subject_name_2.add(option_value);
for (k=0;k<=user_form.subject_name_2.options.length-2;k++) { user_form.subject_name_2.options[k].selected=false; }
user_form.subject_name_2.options[user_form.subject_name_2.options.length-1].selected=true;
user_form.subject_content.value=user_form.subject_content.value+subject_option_1+'（'+subject_option_2+'）,'; }

function select_option_del() { var option_length=user_form.subject_name_2.options.length-1; for (i=0;i<=option_length;i++) { if (user_form.subject_name_2.options[i].selected==true) { id=i; subject_option=user_form.subject_name_2.options[i].text+','; } user_form.subject_name_2.options[i].selected=false; } user_form.subject_name_2.remove(id); user_form.subject_content.value=user_form.subject_content.value.replace(subject_option,''); id=-1; }
function on_off(id) { if (id=='1') { student_number_table.style.display=''; user_form.student_number[0].checked=true; } else { student_number_table.style.display='none'; } }

function user_form_check() { 
checked_value='';
for (i=0;i<=user_form.occupation_value.length-1;i++) { if (user_form.occupation_value[i].checked==true) { checked_value='yes'; } }
if (checked_value!='yes') { alert('请选择教员身份!'); user_form.occupation_value[0].focus(); return false; }
checked_value='';
for (i=0;i<=user_form.degree_value.length-1;i++) { if (user_form.degree_value[i].checked==true) { checked_value='yes'; } }
if (checked_value!='yes') { alert('请选择学历学位!'); user_form.degree_value[0].focus(); return false; }
checked_value='';
for (i=0;i<=user_form.service_value.length-1;i++) { if (user_form.service_value[i].checked==true) { checked_value='yes'; } }
if (checked_value!='yes') { alert('请选择授课方式!'); user_form.service_value[0].focus(); return false; }
check_value='';
for (i=0;i<=20;i++) { if (user_form.service_time[i].checked==true) { check_value='yes'; } }
if (check_value!='yes') { alert('请选择可授课时间!'); user_form.service_time[0].focus(); return false; }
if (user_form.subject_content.value==',') { alert('请选择可辅导课程!'); user_form.subject_name_2.focus(); return false; }
if (user_form.experience_value.value=='') { alert('请选择辅导经验!'); user_form.experience_value.focus(); return false; }
if (user_form.province_name.value=='') { alert('请选择辅导区域!'); user_form.province_name.focus(); return false; }
if (user_form.city_name.value=='') { alert('请选择辅导区域!'); user_form.city_name.focus(); return false; }
if (user_form.school.value=='') { alert('请输入毕业或在读学校!'); user_form.school.focus(); return false; }
if (user_form.professional.value=='') { alert('请输入所学专业!'); user_form.professional.focus(); return false; }

if (user_form.class_value[0].checked==true) {  checked_value=''; for (i=0;i<=user_form.student_number.length-1;i++) { if (user_form.student_number[i].checked==true) { checked_value='yes'; } } if (checked_value!='yes') { alert('请选择小班规模!'); user_form.student_number[0].focus(); return false; } }
if (user_form.person_content.value=='') { alert('请输入自我描述及特长展示!'); user_form.person_content.focus(); return false; }
if (user_form.area_content.value=='') { alert('请输入可辅导区域及详细描述!'); user_form.area_content.focus(); return false; }
if (user_form.effective_value.value=='') { alert('请选择有效期!'); user_form.effective_value.focus(); return false; }
}

function table_on() { search_table.style.display=''; search_on.style.display='none'; search_off.style.display=''; }

function table_off() {
search_table.style.display='none';
search_on.style.display='';
search_off.style.display='none';

var option_length=user_form.subject_name.options.length-2; for (i=1;i<=option_length;i++) { user_form.subject_name.options[i].selected=false; }
subject_list(0);
user_form.subject_name.options[0].selected=true;

var option_length=user_form.subject_name_2.options.length-1; for (i=0;i<=option_length;i++) { user_form.subject_name_2.remove(0); user_form.subject_content.value=',';
}
for (i=0;i<=20;i++) { user_form.service_time[i].checked=false; }
user_form.school.value='';
user_form.professional.value='';
user_form.state_value.value=''; 
user_form.effective_value.value='';
user_form.class_value.value='';
for (i=0;i<=5;i++) { user_form.student_number[i].checked=false; }
student_number_table.style.display='none';
}

function select_width_check(id,length_value) {
if (navigator.userAgent.indexOf('Firefox')==-1) {
for(i=0;i<=id.options.length-1;i++) {
var option_length=0;
for (k=0;k<=length_value*2;k++) {
if (id.options[i].text.substr(k,1)!='') { if (id.options[i].text.charCodeAt(k)>200) { option_length=option_length+2; } else { option_length=option_length+1; } }
}
if (option_length>length_value*2) { id.style.width='auto'; exit; } } } }
</script>
<?php if ($_POST['province_name']!='') { $province_name=str_sql($_POST['province_name']); } else { $province_name=str_sql($_GET['province_name']); } 
	   if ($_POST['subject_name']!='') { $subject_name=str_sql($_POST['subject_name']); } else { $subject_name=str_sql($_GET['subject_name']); }?><body onLoad="javascript:<?php if ($province_name=='' && trim(strpos($_COOKIE['area_id'],','))=='') { ?>sort_list('','');<?php } if ($subject_name=='') { ?>subject_list('');<?php } ?>"><div align="center">
<?php require('top.php');
	  if ($_POST['occupation_value']!='') { $occupation_value=str_sql($_POST['occupation_value']); } else { $occupation_value=str_sql($_GET['occupation_value']); }
	  if ($_COOKIE['area_id']!='') { $area_name=','.$_COOKIE['area_id'].','; } else { $area_name=''; }
	  if ($_POST['province_name']!='') { $province_name=str_sql($_POST['province_name']); } else { $province_name=str_sql($_GET['province_name']); }
      if ($_POST['city_name']!='') { $city_name=str_sql($_POST['city_name']); } else { $city_name=str_sql($_GET['city_name']); } 
	  if (trim(strpos($_COOKIE['area_id'],','))!='' && $city_name=='') { $city_name=substr($_COOKIE['area_id'],strpos($_COOKIE['area_id'],',')+1,strlen($_COOKIE['area_id'])); }
	  if ($province_name!='' && $city_name!='') { $area_name=','.$province_name.','.$city_name.','; }
	  if ($_POST['subject_content']!='') { $subject_content=str_sql($_POST['subject_content']); } else { $subject_content=str_sql($_GET['subject_content']); }
	  if ($_POST['state_value']!='') { $state_value=str_sql($_POST['state_value']); } else { $state_value=str_sql($_GET['state_value']); } ?>
<table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="220" align="left" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;">
        <tr>
          <td height="30" background="images/sort_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="156" align="left" style="font-size:14px;font-weight:bold;">　课程分类</td>
                <td width="54" style="font-size:12px;">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:20px;"></td>
        </tr>		
        <tr>
          <td valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
              <tr>
                <td height="40" valign="top" class="sort_css">　<a href="teacher_list.php">所有</a></td>
                <td>&nbsp;</td>
              </tr>
              <?php 
			  $sort_check="select * from sort_info_manage where sort_id='subject' order by order_id";
			  $rs_sort_check=mysqli_query ($conn, $sort_check);
			  while ($rs_sort_list=mysqli_fetch_object ($rs_sort_check)) {
			  $id=$rs_sort_list->id;
			  ?>
              <tr><td height="30" style="font-size:14px;">　<?=$rs_sort_list->sort_title?></td><td>&nbsp;</td></tr>
			  <?php $sort_check_1="select * from sort_info_manage where sort_id='$id' order by order_id";			  
			  $rs_sort_check_1=mysqli_query ($conn, $sort_check_1);
			  if (intval(mysqli_num_rows($rs_sort_check_1)/2)==mysqli_num_rows($rs_sort_check_1)/2) { $rows_number=mysqli_num_rows($rs_sort_check_1)/2; } else { $rows_number=intval(mysqli_num_rows($rs_sort_check_1))/2+1; }			  
			  for ($i=1;$i<=$rows_number;$i++) {
			  ?>	  
              <tr>		
				<?php for ($k=1;$k<=2;$k++) { if ($rs_sort_list_1=mysqli_fetch_object ($rs_sort_check_1)) { ?><td height="20" class="news_css">　<a href="teacher_list.php?subject_content=,<?=$rs_sort_list->sort_title?>（<?=$rs_sort_list_1->sort_title?>）,&subject_off=1"><?=$rs_sort_list_1->sort_title?></a></td><?php } } ?>             </tr>
			  <?php } ?>			  
              <tr>
                <td height="20" colspan="2">&nbsp;</td>
                </tr>
              <?php } ?>
          </table></td>
        </tr>
        <tr><td style="height:10px;"></td></tr>
      </table>
      </td>
      <td width="750" align="center" valign="top"><?php $list="select * from teacher_info_data where state_info>0";
	  if ($occupation_value!='') { $list=$list." and occupation_info='$occupation_value'"; }	  
	  if ($area_name!='') { $list=$list." and area_title like '%$area_name%'"; }
	  if ($_POST['class_value']!='' || $_GET['class_value']!='') { $list=$list." and class_student='$class_value'"; }
	  if ($subject_content!='' && $subject_content!=',') {
	  $list=$list." and (";
	  for ($i=1;$i<=20;$i++) {
      $subject_content=substr($subject_content,strpos($subject_content,',')+1,strlen($subject_content));
      $subject_value=','.substr($subject_content,0,strpos($subject_content,',')).',';
	  if ($i==20) { $list=$list."subject_title like '%$subject_value%')"; } else { $list=$list."subject_title like '%$subject_value%' or "; }
	  }
	  if ($_POST['subject_content']!='') { $subject_content=str_sql($_POST['subject_content']); } else { $subject_content=str_sql($_GET['subject_content']); }
	  }
      if ($state_value!='') { $list=$list." and state_info='$state_value'"; }	  
	  $list=$list." order by id desc";
	  $rs_list=mysqli_query ($conn, $list);
	  if (mysqli_num_rows($rs_list)/20>intval(mysqli_num_rows($rs_list)/20)) { $rows_count=intval(mysqli_num_rows($rs_list)/20)+1; } else { $rows_count=intval(mysqli_num_rows($rs_list)/20); }
	 $page=$_GET['page'];
	 if($page==0 || $page=='') { $page=1; }
	 if($page>$rows_count) { $page=$rows_count; }
	 if($rows_count<1) { $rows_count=1; } 	 
	 if(mysqli_fetch_object($rs_list)) { ?><table width="750" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
        <tr align="center">
          <td width="85" height="30" background="images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">教员身份</td>
          <td width="85" background="images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">学历学位</td>
          <td width="85" background="images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">授课方式</td>
          <td width="230" background="images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">可辅导课程</td>
          <td width="85" background="images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">辅导经验</td>
          <td width="160" background="images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">自我描述及特长展示</td>
          <td width="80" background="images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">发布日期</td>
        </tr>
        <tr>
          <?php 
	 if(mysqli_data_seek($rs_list,($page-1)*20)) {
	 for($i=1;$i<=20;$i++) {	 
	 if($rs_teacher_list=mysqli_fetch_object($rs_list)) { ?>
          <td height="30" align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->occupation_info?></a></td>
          <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->degree_info?></a></td>
          <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->service_type?></a></td>
          <td align="left" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><table width="230" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td rowspan="3" style="width:10px;"></td>
              <td style="height:10px;"></td>
              <td rowspan="3" style="width:10px;"></td>
            </tr>
            <tr>
              <td align="left"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank">
                <?=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2)?>
              </a></td>
            </tr>
            <tr>
              <td style="height:10px;"></td>
            </tr>
          </table></td>
          <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->experience_info?></a></td>
          <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank">
          <?php $person_info_value=	str_replace('<br>','',$rs_teacher_list->person_info); if (strlen($person_info_value)>=20) { ?><?=iconv('gb2312','gbk',substr($person_info_value,0,16))?>...<?php } else { ?><?=$person_info_value?><?php } ?></a></td>
          <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->submit_date?></a></td>
        </tr>		
		
		
		<?php } } } ?></table><br>
        <span class="news_css"><a href="teacher_list.php?occupation_value=<?=$occupation_value?>&subject_content=<?=$subject_content?>&state_value=<?=$state_value?>&subject_off=<?=$_GET['subject_off']?>">第一页</a>　　　<a href="teacher_list.php?occupation_value=<?=$occupation_value?>&subject_content=<?=$subject_content?>&state_value=<?=$state_value?>&subject_off=<?=$_GET['subject_off']?>&page=<?=$page-1?>">上一页</a>　　　　　　
        <?=$page?>
        　　　　　　 共
        <?=$rows_count?>
        页　　　　　<a href="teacher_list.php?occupation_value=<?=$occupation_value?>&subject_content=<?=$subject_content?>&state_value=<?=$state_value?>&subject_off=<?=$_GET['subject_off']?>&page=<?=$page+1?>">下一页</a>　　　<a href="teacher_list.php?occupation_value=<?=$occupation_value?>&subject_content=<?=$subject_content?>&state_value=<?=$state_value?>&subject_off=<?=$_GET['subject_off']?>&page=<?=$rows_count?>">最后一页</a>
        <?php } else { ?>
        <br>
        <br>
        <br>
        <br>
        暂无记录!
        <?php } ?>
        </span><br>
     </td>
    </tr>
  </table>  
  <?php require('bottom.php'); ?>
  </div>
</body></html>