<?php
ob_start();
session_start(); 
require("conn.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
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
function refresh_code() { form1.imgcode.src="verifycode.php?a="+Math.random(); }
function onfocus_check(id) { id.style.border='2px #FF0000 solid'; }
function onblur_check(id) { id.style.border='1px #6CB5FF solid'; }
var xmlHttp
function sort_list(id)
{
var url='city_select.php?submit_action=1&id='+id;
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
if (user_form.subject_content.value==',') { alert('请选择可辅导课程!'); user_form.subject_name_2.focus(); return false; }
if (user_form.experience_value.value=='') { alert('请选择辅导经验!'); user_form.experience_value.focus(); return false; }
if (user_form.province_name.value=='') { alert('请选择辅导区域!'); user_form.province_name.focus(); return false; }
if (user_form.school.value=='') { alert('请输入毕业或在读学校!'); user_form.school.focus(); return false; }
if (user_form.professional.value=='') { alert('请输入所学专业!'); user_form.professional.focus(); return false; }
if (user_form.class_value[0].value=='1') {  checked_value=''; for (i=0;i<=user_form.student_number.length-1;i++) { if (user_form.student_number[i].checked==true) { checked_value='yes'; } } if (checked_value!='yes') { alert('请选择小班规模!'); user_form.student_number[0].focus(); return false; } }
if (user_form.person_content.value=='') { alert('请输入自我描述及特长展示!'); user_form.person_content.focus(); return false; }
if (user_form.area_content.value=='') { alert('请输入可辅导区域及详细描述!'); user_form.area_content.focus(); return false; }


if (user_form.effective_value.value=='') { alert('请选择有效期!'); user_form.effective_value.focus(); return false; }











}
function on_off(id) { if (id=='1') { student_number_table.style.display=''; } else { student_number_table.style.display='none'; } }

function del_confirm(id) { if (confirm('真的要删除吗？')) { location.href='teacher_action.php?type_action=del&id='+id; } }
</script>
<body onLoad="javascript:<?php if ($_GET['disp_type']=='add') { ?>sort_list('');<?php } ?>subject_list('');"><div align="center">
<?php require('manage_top.php'); ?>
  <table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="220" align="left" valign="top"><table width="200" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" background="images/sort_top.jpg" style="border-top:1px #BCDFFF solid;border-left:1px #BCDFFF solid;border-right:1px #BCDFFF solid;" class="button_css">　做家教</td>
          </tr>
          <tr>
            <td height="40" style="border-left:1px #BCDFFF solid;border-right:1px #BCDFFF solid;border-bottom:1px #BCDFFF solid;" class="news_css">　　<a href="teacher_manage.php?disp_type=add">发布家教</a> 　　<a href="teacher_manage.php?disp_type=list">管理家教</a></td>
          </tr>
          <tr>
            <td style="height:10px;"></td>
          </tr>
        </table>
      </td>
      <td width="750" align="left" valign="top">&nbsp;</td>
    </tr>
  </table><table width="970" height="150" border="0" cellpadding="0" cellspacing="0" class="news_css">
    <tr><td height="20">&nbsp;</td>
    </tr>
    <tr><td align="left" valign="top" style="border-top:1px #7FBEFF solid;"><p>
      <?php $bottom_check="select * from web_info_manage";
	$rs_bottom_check=mysqli_query ($conn, $bottom_check);
	if ($rs_bottom=mysqli_fetch_object ($rs_bottom_check)) { ?><?=$rs_bottom->bottom_info?><?php } ?>
    </p>
        </td>
    </tr>
  </table>
  </div></body></html>