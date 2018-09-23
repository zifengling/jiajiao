<?php
//if ($_GET['disp_type']!='list' && $_GET['disp_type']!='edit') { session_cache_limiter('private'); }
require("conn.php");
ob_start();
session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>做家教</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
}
-->
</style></head>
<script language="javascript">
function refresh_code() { form1.imgcode.src="verifycode.php?a="+Math.random(); }
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
checked_value='';
for (i=0;i<=20;i++) { if (user_form.service_time[i].checked==true) { checked_value='yes'; } }
if (checked_value!='yes') { alert('请选择可授课时间!'); user_form.service_time[0].focus(); return false; }

checked_value='';
if (user_form.subject_content.value==',') { alert('请选择可辅导课程!'); user_form.subject_name_2.focus(); return false; }
for (i=0;i<=user_form.area_name.length-1;i++) { if (user_form.area_name[i].checked==true) { checked_value='yes'; } }
if (checked_value!='yes') { alert('请选择辅导区域!'); user_form.area_name[0].focus(); return false; }
if (user_form.experience_value.value=='') { alert('请选择辅导经验!'); user_form.experience_value.focus(); return false; }
if (user_form.province_name.value=='') { alert('请选择辅导区域!'); user_form.province_name.focus(); return false; }
if (user_form.city_name.value=='') { alert('请选择辅导区域!'); user_form.city_name.focus(); return false; }
if (user_form.school.value=='') { alert('请输入毕业或在读学校!'); user_form.school.focus(); return false; }
if (user_form.professional.value=='') { alert('请输入所学专业!'); user_form.professional.focus(); return false; }
if (user_form.class_value[0].checked==true) { checked_value=''; for (i=0;i<=user_form.student_number.length-1;i++) { if (user_form.student_number[i].checked==true) { checked_value='yes'; } } if (checked_value!='yes') { alert('请选择小班规模!'); user_form.student_number[0].focus(); return false; } }
if (user_form.person_content.value=='') { alert('请输入自我描述及特长展示!'); user_form.person_content.focus(); return false; }
if (user_form.area_content.value=='') { alert('请输入可辅导区域及详细描述!'); user_form.area_content.focus(); return false; }
if (user_form.effective_value.value=='') { alert('请选择有效期!'); user_form.effective_value.focus(); return false; }
}
function on_off(id) { if (id=='1') { student_number_table.style.display=''; } else { student_number_table.style.display='none'; } }
function del_confirm(id) { if (confirm('真的要删除吗？')) { location.href='teacher_action.php?type_action=del&id='+id; } }
</script>

<body onLoad="javascript:<?php if ($_GET['disp_type']=='add') { ?>sort_list('','');<?php } ?>subject_list('');"><div align="center">
<?php require('manage_top.php'); ?>
  <table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="220" align="left" valign="top"><table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" background="images/sort_top_2.jpg" style="border-top:1px #FFBE54 solid;border-left:1px #FFBE54 solid;border-right:1px #FFBE54 solid;" class="button_css">　做家教</td>
          </tr>
          <tr>
            <td height="40" style="border-left:1px #FFBE54 solid;border-right:1px #FFBE54 solid;border-bottom:1px #FFBE54 solid;" class="news_css">　　<a href="teacher_manage.php?disp_type=add">发布家教</a> 　　<a href="teacher_manage.php?disp_type=list">管理家教</a></td>
          </tr>
          <tr>
            <td style="height:10px;"></td>
          </tr>
        </table>
	  </td>
      <td width="750" align="left" valign="top"><?php switch ($_GET['disp_type']) { 
	  case 'list':
	  $login_user_name=str_sql($_SESSION['login_user_name']);
	  $list="select id,occupation_info,degree_info,service_type,subject_title,state_info,user_name,submit_date from teacher_info_data where user_name='$login_user_name' order by id desc";	  
	  $rs_list=mysql_query ($list); ?><table width="750" border="0" cellpadding="0" cellspacing="0" style="border:1px #FFBE54 solid;" class="news_css">
          <tr align="center">
            <td width="70" height="30" bgcolor="#FFFAF3" style="border-bottom:1px #FFBE54 solid;font-weight:bold;">教员身份</td>
            <td width="70" bgcolor="#FFFAF3" style="border-bottom:1px #FFBE54 solid;font-weight:bold;">学历学位</td>
            <td width="70" bgcolor="#FFFAF3" style="border-bottom:1px #FFBE54 solid;font-weight:bold;">授课方式</td>
            <td width="320" bgcolor="#FFFAF3" style="border-bottom:1px #FFBE54 solid;font-weight:bold;">可辅导课程</td>
            <td width="80" bgcolor="#FFFAF3" style="border-bottom:1px #FFBE54 solid;font-weight:bold;">发布日期</td>
            <td width="60" bgcolor="#FFFAF3" style="border-bottom:1px #FFBE54 solid;font-weight:bold;">当前状态</td>
            <td width="80" bgcolor="#FFFAF3" style="border-bottom:1px #FFBE54 solid;font-weight:bold;">操作</td>
          </tr>
          <tr>
	 <?php if (mysql_num_rows($rs_list)/20>intval(mysql_num_rows($rs_list)/20)) { $rows_count=intval(mysql_num_rows($rs_list)/20)+1; } else { $rows_count=intval(mysql_num_rows($rs_list)/20); }
	 $page=$_GET['page'];
	 if($page==0 || $page=='') { $page=1; }
	 if($page>$rows_count) { $page=$rows_count; }	 
	 if($rows_count<1) { $rows_count=1; } 	 
	 if(mysql_fetch_object($rs_list)) {	 
	 if(mysql_data_seek($rs_list,($page-1)*20)) {
	 for($i=1;$i<=10;$i++) {	 
	 if($rs_teacher_list=mysql_fetch_object($rs_list)) { ?> 
            <td height="30" align="center" style="border-right:1px #FFBE54 solid;border-bottom:1px #FFBE54 solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->occupation_info?></a></td>
            <td align="center" style="border-right:1px #FFBE54 solid;border-bottom:1px #FFBE54 solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->degree_info?></a></td>
            <td align="center" style="border-right:1px #FFBE54 solid;border-bottom:1px #FFBE54 solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->service_type?></a></td>
			<td style="border-right:1px #FFBE54 solid;border-bottom:1px #FFBE54 solid;">	<table width="320" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td rowspan="3" style="width:10px;"></td>
                <td style="height:10px;"></td>
                <td rowspan="3" style="width:10px;"></td>
              </tr>
              <tr>
                <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2)?></a></td>
                </tr>
              <tr>
                <td style="height:10px;"></td>
                </tr>
            </table></td>
            <td align="center" style="border-right:1px #FFBE54 solid;border-bottom:1px #FFBE54 solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->submit_date?></a></td>
			
            <td align="center" style="border-right:1px #FFBE54 solid;border-bottom:1px #FFBE54 solid;"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php switch ($rs_teacher_list->state_info) { case 0:?>未审核<?php break; case 1: ?>已审核<?php break; case 2: ?>已认证<?php } ?></a></td>
            <td align="center" style="border-bottom:1px #FFBE54 solid;"><a href="javascript:del_confirm(<?=$rs_teacher_list->id?>);">删除</a></td>
          </tr>		  
	<?php } } } ?>
          <tr align="center">
            <td height="60" colspan="7"><a href="teacher_manage.php?disp_type=list&page=1">第一页</a>　　　<a href="teacher_manage.php?disp_type=list&page=<?=$page-1?>">上一页</a>　　　　　　　　　
              <?=$page?>
              　　 共
              <?=$rows_count?>
            页　　　　　　　<a href="teacher_manage.php?disp_type=list&page=<?=$page+1?>">下一页</a>　　　<a href="teacher_manage.php?disp_type=list&page=<?=$rows_count?>">最后一页</a></td>
          </tr>		  
		  <?php } else { ?><tr><td colspan="7" width="750" height="60" align="center">暂无记录!</td></tr><?php } ?> 
        </table>
        <?php break; case 'add': ?>
	  <form name="user_form" method="post" action="teacher_action.php?type_action=add" onSubmit="return user_form_check()"><table width="750" border="0" cellpadding="0" cellspacing="0" style="border:1px #FFBE54 solid;" class="news_css">
        <tr>
          <td height="20" colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css">
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-top:1px #FEDCA4 solid;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
            <tr>
              <td width="40">&nbsp;</td>			  
              <td width="120"><font color="#FF0000">*</font> 教员身份：</td>
              <td width="20" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;">&nbsp;</td>
              <td width="380" bgcolor="#FFFAF3"><table width="380" border="0" cellpadding="0" cellspacing="0">
<?php $sort_check="select * from sort_info_manage where id<>25 and sort_id='occupation' order by order_id";
$rs_sort_check=mysql_query ($sort_check); ?>
                  <tr>
                    <td width="360"><?php while ($rs_sort=mysql_fetch_object ($rs_sort_check)) { ?><input type="radio" name="occupation_value" value="<?=$rs_sort->sort_title?>"><?=$rs_sort->sort_title?>　<?php } ?></td>
                    <td width="20">&nbsp;</td>
                  </tr>
              </table></td>
              <td width="150" align="center" bgcolor="#FFFAF3" style="border-right:1px #FEDCA4 solid;"><span style="font-size:14px;font-weight:bold;">明星教师</span><br>
                <br>
                <span style="color:#FF0000;">将由家长与管理员评定</span></td>
              <td width="40">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;border-bottom:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="20" colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td style="height:10px;"></td>
                <td style="height:10px;"></td>
                <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-top:1px #FEDCA4 solid;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;">　</td>
                <td style="height:10px;"></td>
              </tr>
              <tr>
                <td width="40">&nbsp;</td>
                <td width="120"><font color="#FF0000">*</font> 学历学位：</td>
                <td width="20" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;">&nbsp;</td>
                <td width="510" bgcolor="#FFFAF3"><table width="510" border="0" cellpadding="0" cellspacing="0">
<?php $sort_check="select * from sort_info_manage where sort_id='degree' order by order_id";
$rs_sort_check=mysql_query ($sort_check); ?>
                    <tr>					  
                      <td width="500"><?php while ($rs_sort=mysql_fetch_object ($rs_sort_check)) { ?><input type="radio" name="degree_value" value="<?=$rs_sort->sort_title?>"><?=$rs_sort->sort_title?>　<?php } ?></td>
                      <td width="10">&nbsp;</td></tr>
                </table></td>
                <td width="20" bgcolor="#FFFAF3" style="border-right:1px #FEDCA4 solid;">&nbsp;</td>
                <td width="40">&nbsp;</td>
              </tr>
              <tr>
                <td style="height:10px;"></td>
                <td style="height:10px;"></td>
                <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;border-bottom:1px #FEDCA4 solid;">　</td>
                <td style="height:10px;"></td>
              </tr>
          </table></td></tr>
        <tr>
          <td height="20" colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css">
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-top:1px #FEDCA4 solid;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
            <tr>
              <td width="40">&nbsp;</td>
              <td width="120"><font color="#FF0000">*</font> 授课方式： </td>
              <td width="20" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;">&nbsp;</td>
              <td width="510" bgcolor="#FFFAF3"><table width="510" border="0" cellpadding="0" cellspacing="0">
                  <?php
$sort_check="select * from sort_info_manage where sort_id='service' order by order_id";
$rs_sort_check=mysql_query ($sort_check); ?>
                  <tr><td width="552"><?php while ($rs_sort=mysql_fetch_object ($rs_sort_check)) { ?><input type="radio" name="service_value" value="<?=$rs_sort->sort_title?>"><?=$rs_sort->sort_title?>　<?php } ?></td>
                    <td width="10">&nbsp;</td></tr>
              </table></td>
              <td width="20" bgcolor="#FFFAF3" style="border-right:1px #FEDCA4 solid;">&nbsp;</td>
              <td width="40">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;border-bottom:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td height="20" colspan="5">&nbsp;</td>
        </tr>
        <tr valign="top">
          <td height="126" colspan="5">            <table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css">
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-top:1px #FEDCA4 solid;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
            <tr>
              <td width="40">&nbsp;</td>
              <td width="120"><font color="#FF0000">*</font> 可授课时间： </td>
              <td width="20" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;">&nbsp;</td>
              <td width="510" bgcolor="#FFFAF3"><table width="510" height="90" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="74"><input name="service_time[]" id="service_time"  type="checkbox" value="周一上">周一上</td>
                    <td width="74"><input name="service_time[]" id="service_time"  type="checkbox" value="周二上">周二上</td>
                    <td width="74"><input name="service_time[]" id="service_time"  type="checkbox" value="周三上">周三上</td>
                    <td width="74"><input name="service_time[]" id="service_time"  type="checkbox" value="周四上">周四上</td>
                    <td width="74"><input name="service_time[]" id="service_time"  type="checkbox" value="周五上">周五上</td>
                    <td width="74"><input name="service_time[]" id="service_time"  type="checkbox" value="周六上">周六上</td>
                    <td width="66"><input name="service_time[]" id="service_time"  type="checkbox" value="周日上">周日上</td>
                  </tr>
                  <tr>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周一下">周一下</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周二下">周二下</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周三下">周三下</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周四下">周四下</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周五下">周五下</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周六下">周六下</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周日下">周日下</td>
                  </tr>
                  <tr>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周一晚">周一晚</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周二晚">周二晚</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周三晚">周三晚</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周四晚">周四晚</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周五晚">周五晚</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周六晚">周六晚</td>
                    <td><input name="service_time[]" id="service_time"  type="checkbox" value="周日晚">周日晚</td>
                  </tr>
              </table></td>
              <td width="20" bgcolor="#FFFAF3" style="border-right:1px #FEDCA4 solid;">&nbsp;</td>
              <td width="40">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;border-bottom:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td height="340" colspan="5">            <table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td style="height:10px;"></td>
                <td height="60" colspan="5" align="center" bgcolor="#FFFAF3" style="border-top:1px #FEDCA4 solid;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;"><font color="#FF0000">*</font> 可辅导课程</td>
                <td style="height:10px;"></td>
              </tr>
              <tr>
                <td width="40">&nbsp;</td>
                <td width="15" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;">&nbsp;</td>
                <td width="180" bgcolor="#FFFAF3"><select name="subject_name" size="15" multiple onChange="javascript:subject_list(this.value);" style="width:160px;height:220px;">
                  <option>--------选择--------</option>
                  <?php $sort_check="select * from sort_info_manage where sort_id='subject' order by order_id";
				  $rs_sort_check=mysql_query ($sort_check);
				  while ($rs_sort=mysql_fetch_object ($rs_sort_check)) { ?>
                  <option value="<?=$rs_sort->id?>">
                  <?=$rs_sort->sort_title?>
                  </option>
                  <?php } ?>
                </select></td>				
				<td width="180" bgcolor="#FFFAF3"><span id="subject_sort"></span></td>
			    <td width="220" bgcolor="#FFFAF3"><select name="subject_name_2" size="15" multiple style="width:200px;height:220px;"></select><input name="subject_content" type="hidden" value=","></td>
                <td width="75" bgcolor="#FFFAF3" style="border-right:1px #FEDCA4 solid;">                  <a href="javascript:select_option_del();"><img src="images/del.jpg" width="60" height="26" border="0"></a><br>
                  <br>
                  最多选20个</td>
                <td width="40">&nbsp;</td>
              </tr>
              <tr>
                <td style="height:10px;"></td>
                <td colspan="5" bgcolor="#FFFAF3" style="height:10px;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;border-bottom:1px #FEDCA4 solid;">　</td>
                <td style="height:10px;"></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css">
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-top:1px #FEDCA4 solid;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
            <tr>
              <td width="40">&nbsp;</td>
              <td width="120"><font color="#FF0000">*</font> 辅导区域： </td>
              <td width="20" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;">&nbsp;</td>
			  <td width="510" bgcolor="#FFFAF3"><table height="30" border="0" cellpadding="0" cellspacing="0">				  
				  <?php 
				  $sort_check="select * from sort_info_manage where sort_id='province' order by order_id";
				  $rs_sort_check=mysql_query ($sort_check);
				  if (mysql_num_rows($rs_sort_check)/5>intval(mysql_num_rows($rs_sort_check)/5)) { $rows_count=intval(mysql_num_rows($rs_sort_check)/5)+1; } else { $rows_count=mysql_num_rows($rs_sort_check)/5; }				  
				  for ($i=1;$i<=$rows_count;$i++) { ?><tr>				  
				  <?php for ($k=1;$k<=5;$k++) {	 ?> 
				  <td width="102" height="30"><?php if ($rs_sort=mysql_fetch_object ($rs_sort_check)) { ?><input name="area_name[]" id="area_name"  type="checkbox" value="<?=$rs_sort->sort_title?>"><?=$rs_sort->sort_title?><?php } ?></td>
                  <?php } ?>
                    </tr>
					<?php } ?>
                </table>
				</td>
              <td width="20" bgcolor="#FFFAF3" style="border-right:1px #FEDCA4 solid;">&nbsp;</td>
              <td width="40">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td colspan="3" bgcolor="#FFFAF3" style="height:10px;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;border-bottom:1px #FEDCA4 solid;">　</td>
              <td style="height:10px;"></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td height="20" colspan="5"></td>
          </tr>
        <tr>
          <td width="40" height="40">&nbsp;</td>
          <td width="120"> <font color="#FF0000">*</font> 辅导经验：</td>	  
		  <td height="30" colspan="3"><?=$rs_teacher_info->experience_info?><div style="width:90px;height:19px;border:1px #6CB5FF solid;overflow:hidden;"><select name="experience_value" id="experience_value" style="width:92px;height:21px;margin-top:-1px;margin-left:-1px;">
            <option value="">选择</option>
            <option value="0年">0年</option>
            <option value="1年">1年</option>
            <option value="2年">2年</option>
            <option value="3年">3年</option>
            <option value="4年">4年</option>
            <option value="5年">5年</option>
            <option value="6年">6年</option>
            <option value="7年">7年</option>
            <option value="8年">8年</option>
            <option value="9年">9年</option>
            <option value="10年">10年</option>
            <option value="大于10年">大于10年</option>
          </select></div></td>
          </tr>
        <tr>
          <td height="40" colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="40">&nbsp;</td>
                <td width="120"><font color="#FF0000">*</font> 毕业或在读学校： </td>
				<td width="590"><input name="school" type="text" id="school" style="width:300px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(school);" onBlur="javascript:onblur_check(school);"></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td height="40" colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="40">&nbsp;</td>
              <td width="120"><font color="#FF0000">*</font> 所学专业： </td>
              <td width="590"><input name="professional" type="text" id="professional" style="width:300px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(professional);" onBlur="javascript:onblur_check(professional);"></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td height="90" colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css">
            <tr>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td width="430" colspan="3" rowspan="3" align="center"><table width="430" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFAF3" style="border:1px #FEDCA4 solid;font-size:12px;" id="student_number_table">
                <tr>
                  <td height="30" align="center">小班规模</td>
                </tr>
                <tr><td align="center">
                  <input name="student_number" type="radio" value="1-5人" checked>1-5人　<input name="student_number" type="radio" value="5-10人">5-10人　<input name="student_number" type="radio" value="10-15人">10-15人　<input name="student_number" type="radio" value="15-20人">15-20人　<input name="student_number" type="radio" value="20-30人">20-30人　<input name="student_number" type="radio" value="全托">全托</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
              <td style="height:10px;"></td>
            </tr>
            <tr>
              <td width="40" height="30">&nbsp;</td>
              <td width="120"><font color="#FF0000">*</font> 能否开小班：</td>
			  <td width="120"><input name="class_value" type="radio" onClick="javascript:on_off('1');" value="1" checked>能　<input name="class_value" type="radio" onClick="javascript:on_off('0');" value="0">不能</td><td width="40">&nbsp;</td>
            </tr>
            <tr>
              <td height="30" style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
              <td style="height:10px;"></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td height="250" colspan="5"><table width="750" border="0" cellpadding="0" cellspacing="0" class="news_css"> 
            <tr> 
              <td style="height:10px;"></td>
              <td height="60" colspan="3" align="center" bgcolor="#FFFAF3" style="border-top:1px #FEDCA4 solid;border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;"><font color="#FF0000">*</font> 自我描述及特长展示</td>
              <td style="height:10px;"></td>
            </tr>
            <tr>
              <td width="40">&nbsp;</td>
              <td width="20" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;">&nbsp;</td>
			  <td width="630" bgcolor="#FFFAF3"><textarea name="person_content" id="person_content" style="width:630px;height:120px;line-height:20px;font-size:12px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(person_content);" onBlur="javascript:onblur_check(person_content);"></textarea></td>
			  <td width="20" bgcolor="#FFFAF3" style="border-right:1px #FEDCA4 solid;">&nbsp;</td>
              <td width="40">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:10px;"></td>
              <td height="50" colspan="3" bgcolor="#FFFAF3" style="border-left:1px #FEDCA4 solid;border-right:1px #FEDCA4 solid;border-bottom:1px #FEDCA4 solid;">　　例如：您曾经获得过什么奖项、证书，取得过什么出色的成绩！</td>
              <td style="height:10px;"></td>
            </tr>
          </table></td>
          </tr>
        <tr align="center">
          <td align="center">&nbsp;</td>
          <td height="20" align="left"><!--<font color="#FF0000">*</font> 有效期：--></td>
		  <td width="180" align="left"><!--<div style="width:90px;height:19px;border:1px #6CB5FF solid;overflow:hidden;">-->
		    <select name="effective_value" id="effective_value" style="width:92px;height:21px;margin-top:-1px;margin-left:-1px;display:none;">
              <!--<option value="0">选择</option>-->
              <option value="1">一星期</option>
              <option value="2">一个月</option>
              <option value="3">一季度</option>
              <option value="4">半年</option>
              <option value="5">一年</option>
            </select>
		  <!--</div>--></td>
          <td width="90" align="center">&nbsp;</td>
          <td width="320" align="center">&nbsp;</td>
        </tr>
        <tr align="center"><td height="20" colspan="5">&nbsp;</td></tr>
      </table>
		<div style="width:750px;height:30px;margin-top:30px;" align="center"><input name="imageField" type="image" src="images/info_submit.jpg" width="60" height="30" border="0"></div>
	  </form>
  	  <?php } ?>
	  </td>
    </tr>
  </table><table width="970" height="150" border="0" cellpadding="0" cellspacing="0" class="news_css">
    <tr><td height="20">&nbsp;</td>
    </tr>
    <tr><td height="130" align="left" valign="top" style="border-top:1px #7FBEFF solid;"><?php $bottom_check="select * from web_info_manage";
	$rs_bottom_check=mysql_query ($bottom_check);
	if ($rs_bottom=mysql_fetch_object ($rs_bottom_check)) { ?><?=$rs_bottom->bottom_info?><?php } ?></td>
    </tr>
  </table>
  </div></body></html>