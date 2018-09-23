<?php
require("../conn.php");
ob_start();
session_start();
require('login_user_check.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
<link href="../css/css.css" rel="stylesheet" type="text/css"> 
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
<?php if ($_POST['province_name']!='') { $province_name=str_sql($_POST['province_name']); } else { $province_name=str_sql($_GET['province_name']); } 
	   if ($_POST['subject_name']!='') { $subject_name=str_sql($_POST['subject_name']); } else { $subject_name=str_sql($_GET['subject_name']); }?><body onLoad="javascript:<?php if ($_GET['disp_type']=='list' && $province_name=='') { ?>sort_list('','');<?php } if ($subject_name=='') { ?>subject_list('');<?php } ?>"><div align="center">
<?php switch ($_GET['disp_type']) { 
	   case 'list':
	  if ($_POST['occupation_value']!='') { $occupation_value=str_sql($_POST['occupation_value']); } else { $occupation_value=str_sql($_GET['occupation_value']); }	  
	  if ($_POST['state_value']!='') { $state_value=str_sql($_POST['state_value']); } else { $state_value=str_sql($_GET['state_value']); } 
?>
<script language="javascript">function del_confirm(page,id) { if (confirm('真的要删除吗？')) { location.href='teacher_list_action.php?type_action=del&occupation_value=<?=$occupation_value?>&degree_value=<?=$degree_value?>&service_value=<?=$service_value?>&service_time=<?=$service_time?>&subject_name=<?=$subject_name?>&subject_name_1=<?=$subject_name_1?>&subject_name_2=<?=$subject_name_2?>&subject_content=<?=$subject_content?>&experience_value=<?=$experience_value?>&province_name=<?=$province_name?>&city_name=<?=$city_name?>&school=<?=$school?>&professional=<?=$professional?>&class_value=<?=$class_value?>&student_number=<?=$student_number?>&state_value=<?=$state_value?>&effective_value=<?=$effective_value?>&page='+page+'&id='+id; } }</script>
<table width="970" border="0" cellpadding="0" cellspacing="0" style="border:0px #9DC3EA solid;" class="news_css">
  <tr>
    <td height="20" align="left">&nbsp;</td>
  </tr></table>
<?php
	  $list="select * from teacher_info_data";  
	  if ($occupation_value!='' || $degree_value!='' || $service_value!='' || $experience_value!='' || $area_name!='' || $_POST['class_value']!='' || $_GET['class_value']!='' || $subject_content!='' || $service_time_value!=',' || $school!='' || $professional!='' || $date_value!='' || $effective_value!='' || $state_value!='') { $list=$list." where 1=1"; }
	  if ($occupation_value!='') { $list=$list." and occupation_info='$occupation_value'"; }	  
      if ($state_value!='') { $list=$list." and state_info='$state_value'"; }
	  $list=$list." order by id desc";
	  $rs_list=mysqli_query ($conn, $list);
	  if (mysqli_num_rows($rs_list)/20>intval(mysqli_num_rows($rs_list)/20)) { $rows_count=intval(mysqli_num_rows($rs_list)/20)+1; } else { $rows_count=intval(mysqli_num_rows($rs_list)/20); }
	 $page=$_GET['page'];
	 if($page==0 || $page=='') { $page=1; }
	 if($page>$rows_count) { $page=$rows_count; }
	 if($rows_count<1) { $rows_count=1; } 	 
	 if(mysqli_fetch_object($rs_list)) { ?><table width="970" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
          <tr align="center">
            <td width="70" height="30" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">教员身份</td>
            <td width="70" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">学历学位</td>
            <td width="70" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">授课方式</td>
            <td width="380" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">可辅导课程</td>
            <td width="70" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">辅导经验</td>
            <td width="150" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">所学专业</td>
            <td width="80" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">发布日期</td>
            <td width="80" background="../images/sort_background.jpg" bgcolor="#F4FAFF" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;font-weight:bold;">操作</td>
          </tr>
          <tr>
	 <?php 
	 if(mysqli_data_seek($rs_list,($page-1)*20)) {
	 for($i=1;$i<=20;$i++) {	 
	 if($rs_teacher_list=mysqli_fetch_object($rs_list)) { ?> 
            <td height="30" align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><?=$rs_teacher_list->occupation_info?></td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><?=$rs_teacher_list->degree_info?></td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><?=$rs_teacher_list->service_type?></td>
			<td align="left" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;">	<table width="380" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td rowspan="3" style="width:10px;"></td>
                <td style="height:10px;"></td>
                <td rowspan="3" style="width:10px;"></td>
              </tr>
              <tr>
                <td><?=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2)?></td>
              </tr>
              <tr><td style="height:10px;"></td></tr>
            </table></td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><?=$rs_teacher_list->experience_info?></td>
            <td align="left" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><table width="150" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td rowspan="3" style="width:10px;"></td>
                <td style="height:10px;"></td>
                <td rowspan="3" style="width:10px;"></td>
              </tr>
              <tr>
                <td><?=$rs_teacher_list->professional_title?></td>
              </tr>
              <tr><td style="height:10px;"></td></tr>
            </table></td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><?=$rs_teacher_list->submit_date?></td>
            <td align="center" style="border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;"><a href="javascript:del_confirm(<?=$page?>,<?=$rs_teacher_list->id?>);">删除</a></td>
          </tr>
          <tr align="left" bgcolor="#F4FAFF">
            <form name="form1" method="post" action="teacher_list_action.php?type_action=state_edit&id=<?=$rs_teacher_list->id?>&occupation_value=<?=$occupation_value?>&degree_value=<?=$degree_value?>&service_value=<?=$service_value?>&experience_value=<?=$experience_value?>&province_name=<?=$province_name?>&city_name=<?=$city_name?>&select_position=<?=$select_position?>&year_value=<?=$year_value?>&month_value=<?=$month_value?>&day_value=<?=$day_value?>&subject_name=<?=$subject_name?>&subject_name_1=<?=$subject_name_1?>&subject_name_2=<?=$subject_name_2?>&subject_content=<?=$subject_content?>&service_time_value=<?=$service_time_value?>&school=<?=$school?>&professional=<?=$professional?>&state_value=<?=$state_value?>&effective_value=<?=$effective_value?>&class_value=<?=$class_value?>&page=<?=$page?>"><td height="30" colspan="8" style="border-bottom:1px #9DC3EA solid;"><table width="970" height="20" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
              <tr>
			  
                <td width="90" align="right">显示位置：</td>										
				<td width="20"><input name="position_value_<?=$rs_teacher_list->id?>" type="checkbox" style="margin-top:-1px;" value="1"<?php if ($rs_teacher_list-> display_position==1) { ?>checked<?php } ?>></td>
                <td width="120">首页推荐教员</td>
                <td width="90" align="right" valign="middle">当前状态：</td>
                <td width="20"><input type="radio" name="state_value_<?=$rs_teacher_list->id?>" value="0" style="margin-top:-3px;"<?php if ($rs_teacher_list->state_info==0) { ?> checked<?php } ?>></td>
                <td width="50">未审核</td>
                <td width="20"><input type="radio" name="state_value_<?=$rs_teacher_list->id?>" value="1" style="margin-top:-3px;"<?php if ($rs_teacher_list->state_info==1) { ?> checked<?php } ?>></td>
                <td width="50">已审核 </td>
                <td width="20"><input name="state_value_<?=$rs_teacher_list->id?>" type="radio" style="margin-top:-3px;" value="2"<?php if ($rs_teacher_list->state_info==2) { ?> checked<?php } ?>></td>
                <td width="60">                已认证</td>
                <td width="430"><input name="imageField" type="image" src="../images/manage_edit.jpg" width="40" height="20" border="0"></td>
              </tr>
            </table></td></form>
          </tr>
	<?php } } } ?></table>
	<br><span class="news_css"><a href="teacher_list_manage.php?disp_type=list&occupation_value=<?=$occupation_value?>&degree_value=<?=$degree_value?>&service_value=<?=$service_value?>&service_time=<?=$service_time?>&subject_name=<?=$subject_name?>&subject_name_1=<?=$subject_name_1?>&subject_name_2=<?=$subject_name_2?>&subject_content=<?=$subject_content?>&experience_value=<?=$experience_value?>&province_name=<?=$province_name?>&city_name=<?=$city_name?>&school=<?=$school?>&professional=<?=$professional?>&year_value=<?=$year_value?>&month_value=<?=$month_value?>&day_value=<?=$day_value?>&class_value=<?=$class_value?>&student_number=<?=$student_number?>&state_value=<?=$state_value?>&effective_value=<?=$effective_value?>">第一页</a>　　　<a href="teacher_list_manage.php?disp_type=list&occupation_value=<?=$occupation_value?>&degree_value=<?=$degree_value?>&service_value=<?=$service_value?>&service_time=<?=$service_time?>&subject_name=<?=$subject_name?>&subject_name_1=<?=$subject_name_1?>&subject_name_2=<?=$subject_name_2?>&subject_content=<?=$subject_content?>&experience_value=<?=$experience_value?>&province_name=<?=$province_name?>&city_name=<?=$city_name?>&school=<?=$school?>&professional=<?=$professional?>&year_value=<?=$year_value?>&month_value=<?=$month_value?>&day_value=<?=$day_value?>&class_value=<?=$class_value?>&student_number=<?=$student_number?>&state_value=<?=$state_value?>&effective_value=<?=$effective_value?>&page=<?=$page-1?>">上一页</a>　　　　　　<?=$page?>　　　　　　共 <?=$rows_count?> 页　　　　　<a href="teacher_list_manage.php?disp_type=list&occupation_value=<?=$occupation_value?>&degree_value=<?=$degree_value?>&service_value=<?=$service_value?>&service_time=<?=$service_time?>&subject_name=<?=$subject_name?>&subject_name_1=<?=$subject_name_1?>&subject_name_2=<?=$subject_name_2?>&subject_content=<?=$subject_content?>&experience_value=<?=$experience_value?>&province_name=<?=$province_name?>&city_name=<?=$city_name?>&school=<?=$school?>&professional=<?=$professional?>&year_value=<?=$year_value?>&month_value=<?=$month_value?>&day_value=<?=$day_value?>&class_value=<?=$class_value?>&student_number=<?=$student_number?>&state_value=<?=$state_value?>&effective_value=<?=$effective_value?>&page=<?=$page+1?>">下一页</a>　　　<a href="teacher_list_manage.php?disp_type=list&occupation_value=<?=$occupation_value?>&degree_value=<?=$degree_value?>&service_value=<?=$service_value?>&service_time=<?=$service_time?>&subject_name=<?=$subject_name?>&subject_name_1=<?=$subject_name_1?>&subject_name_2=<?=$subject_name_2?>&subject_content=<?=$subject_content?>&experience_value=<?=$experience_value?>&province_name=<?=$province_name?>&city_name=<?=$city_name?>&school=<?=$school?>&professional=<?=$professional?>&year_value=<?=$year_value?>&month_value=<?=$month_value?>&day_value=<?=$day_value?>&class_value=<?=$class_value?>&student_number=<?=$student_number?>&state_value=<?=$state_value?>&effective_value=<?=$effective_value?>&page=<?=$rows_count?>">最后一页</a><?php } else { ?><br><br><br><br>暂无记录!<?php } ?></span><br><br>
	  <?php } ?>
</div>
</body></html>