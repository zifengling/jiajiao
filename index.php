<?php require("conn.php"); 
ob_start();
session_start();
$web_title_check="select web_title,web_title_1,web_keywords,web_description from web_info_manage";
$rs_web_title_check= mysqli_query($conn, $web_title_check);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php if ($rs_web_title= mysqli_fetch_object($rs_web_title_check)) { ?>
<meta content="<?php echo $rs_web_title->web_keywords?>" name="Keywords" />
<meta content="<?php echo $rs_web_title->web_description?>" name="Description"/>
<title><?php echo $rs_web_title->web_title?>（<?php echo$rs_web_title->web_title_1?>）</title>
<?php } else { ?>
<title>家教源码，家教网源码，家教网站源码（PHP开发）</title><?php } ?>
<link href="css/css.css" rel="stylesheet" type="text/css">
<script language="javascript">function refresh_code() { login_form.imgcode.src="verifycode.php?a="+Math.random(); }</script>
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

<body onLoad="javascript:subject_list('','');"><?php require('top.php'); ?>













<script language="javascript">
function teacher_order_check() { alert('该教员已预约，请预约其他教员!'); }
function student_order_check() { alert('该学员已预约，请预约其他学员!'); }
var subject_xmlHttp
function subject_list(id,id_1)
{
var url='subject_select_1.php?submit_action=1&id='+id+'&id_1='+id_1;
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
//for (k=0;k<=user_form.subject_name_2.options.length-1;k++) { if (user_form.subject_name_2.options[k].text==subject_option_1+'（'+subject_option_2+'）') { alert(subject_option_1+'（'+subject_option_2+'）不能重复选择!'); exit; } }
var option_value=document.createElement('option');
option_value.value=user_form.subject_name.options[0].value;
option_value.text=subject_option_1+'（'+subject_option_2+'）';
user_form.subject_name_2.add(option_value);
for (k=0;k<=user_form.subject_name_2.options.length-2;k++) { user_form.subject_name_2.options[k].selected=false; }
user_form.subject_name_2.options[user_form.subject_name_2.options.length-1].selected=true;
user_form.subject_content.value=','+subject_option_1+'（'+subject_option_2+'）,'; }














function teacher_search_check() { teacher_td.style.display=''; student_td.style.display='none'; teacher_select.style.display=''; class_value.style.display='none'; student_select.style.display='none'; user_form.search_type.value=1; }
function student_search_check() { teacher_td.style.display='none'; student_td.style.display=''; teacher_select.style.display='none'; class_value.style.display=''; student_select.style.display=''; user_form.search_type.value=2; }
</script>
<div align="center">
  <table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>      
  <td width="110" align="left" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0">
        <tr background="images/list_top.jpg">
          <td height="30" colspan="2"><table width="210" height="20" border="0" cellpadding="0" cellspacing="0">
            <tr valign="bottom">
              <td width="156" align="left" style="font-size:14px;font-weight:bold;color:#0054BB;">　最新公告</td>			  
			  <td width="54" class="news_css"><a href="news.php?disp_type=list&sort_name=最新公告&submit_action=15" target="_blank"><font color="#0054BB">更多...</font></a></td>
            </tr>
          </table></td>
        </tr>   
	    <tr bgcolor="#F4FCFF"><td colspan="2" style="height:7px;"></td>
	    </tr>	
        <tr bgcolor="#F4FCFF">
          <td width="10" class="news_css" style="line-height:160%;">&nbsp;</td>
          <td width="200" valign="top" class="news_css" style="line-height:200%;"><?php $list="select * from news_info_data where sort_id='15' order by id desc";
		$rs_list=mysqli_query ($conn, $list);
		if (mysqli_num_rows ($rs_list)>=13) { $rows_number=13; } else { $rows_number=mysqli_num_rows ($rs_list); }
		for ($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>=30) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,26))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a><br>
            <?php } ?></td>
        </tr>
        <tr bgcolor="#F4FCFF"><td colspan="2" style="height:7px;"></td>
        </tr>
      </table></td>	  
     <td style="width:6px;"></td>
      <td width="750" align="right" valign="top"><iframe src="ad/ad.php" width="750" height="360" frameborder="0" scrolling="no"></iframe></td>
    </tr>
    <tr><td colspan="3" style="height:10px;"></td>
    </tr>
  </table>  
  <table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" valign="top"><table width="750" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
        <tr>
          <td width="700" height="30" valign="bottom" background="images/list_top.jpg" style="font-size:14px;font-weight:bold;color:#0054BB;">　最新教员</td>
          <td width="50" valign="bottom" background="images/list_top.jpg" class="news_css"><a href="teacher_list.php"><font color="#0054BB">更多...</font></a></td>
        </tr>
        <tr valign="top">
		  <td colspan="4"><table width="750" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;" class="news_css">
            
			
			
            <tr bgcolor="#F4FCFF">
              <td height="10" colspan="6" bgcolor="#F4FCFF" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">&nbsp;</td>
              </tr>
            <tr align="center" bgcolor="#F4FCFF">
              <td width="60" height="30" bgcolor="#F4FCFF" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">姓名</td>
              <td width="50" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">性别</td>
              <td width="260" bgcolor="#F4FCFF" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">辅导科目</td>
              <td width="160" bgcolor="#F4FCFF" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">毕业学校</td>
              <td width="130" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">辅导区域</td>
              <td width="80" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">发布日期</td>
            </tr>			
			<?php
			if ($_COOKIE['area_id']!='') { $area_id=str_sql(','.$_COOKIE['area_id'].','); $list="select * from teacher_info_data where area_title like '%$area_id%' and state_info=1 order by id desc";
			} else {
			
			
			
			
			$list="select * from teacher_info_data where state_info>0 order by id desc"; }
			$rs_list=mysqli_query ($conn, $list);
			if (mysqli_num_rows($rs_list)>=10) { $rows_number=10; } else { $rows_number=mysqli_num_rows($rs_list); }
			for ($i=1;$i<=$rows_number;$i++) {			
			$rs_teacher_list=mysqli_fetch_object ($rs_list);
			$user_name=$rs_teacher_list->user_name;
			$user_check="select * from user_info_manage where user_name='$user_name'";
			$rs_user_check=mysqli_query ($conn, $user_check);
			$rs_user=mysqli_fetch_object ($rs_user_check);
			?>
            <tr <?php if (intval($i/2)==$i/2) { ?>bgcolor="#F5F5F5"<?php } ?>>
              <td height="30" align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>教员</a></td>
              <td align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank">
                <?=$rs_user->sex_info?>
              </a></td>
			  <td><table width="260" border="0" cellpadding="0" cellspacing="0" class="news_css">
                <tr>
                  <td rowspan="3" style="width:10px;"></td>
                  <td style="height:10px;"></td>
                  <td rowspan="3" style="width:10px;"></td>
                </tr>
                <tr>
                  <td align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2);
				  if (strlen($subject_name)>=40) { ?><?=iconv('gb2312','gbk',substr($subject_name,0,36))?>...<?php } else { ?><?=$subject_name?><?php } ?></a></td>
                </tr>
                <tr>
                  <td style="height:10px;"></td>
                </tr>
              </table></td>
              <td align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php if (strlen($rs_teacher_list->school_title)>=26) { ?><?=iconv('gb2312','gbk',substr($rs_teacher_list->school_title,0,22))?>...<?php } else { ?><?=$rs_teacher_list->school_title?><?php } ?></a></td>			  
              <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $person_info_value=	str_replace('<br>','',$rs_teacher_list->person_info); if (strlen($person_info_value)>=20) { ?><?=iconv('gb2312','gbk',substr($person_info_value,0,16))?>...<?php } else { ?><?=$person_info_value?><?php } ?></a></td>
              <td align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->submit_date?></a></td>
            </tr>
			<?php } ?>
          </table></td>
        </tr>
      </table></td><td style="width:6px;"></td>
      <td width="110" align="right" valign="top" style="border:0px #ff0000 solid;"><table width="210" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
        <tr>
          <td height="30" valign="bottom" background="images/tj_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="156" align="left" style="font-size:14px;font-weight:bold;color:#FF0000;">　推荐教员</td>
                <td width="54" style="font-size:12px;">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#F4FCFF" style="height:15px;"></td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#F4FCFF" style="font-size:12px;line-height:160%;"><table width="210" border="0" cellpadding="0" cellspacing="0" class="news_css">
            <?php if ($_COOKIE['area_id']!='') { $area_id=str_sql($_COOKIE['area_id']); $list="select * from teacher_info_data where display_position=1 and area_title like '%$area_id%' and state_info>0 order by id desc";
		  } else { $list="select * from teacher_info_data where display_position=1 and state_info>0 order by id desc"; }
		  $rs_list=mysqli_query ($conn, $list); ?>
            <tr>
              <td style="width:10px;"></td>
              <td valign="top"><?php if ($rs_teacher_list=mysqli_fetch_object ($rs_list)) { $user_name=str_sql($rs_teacher_list->user_name);
				$user_check="select * from user_info_manage where user_name='$user_name'";
				$rs_user_check=mysqli_query ($conn, $user_check);
				
				if ($rs_user=mysqli_fetch_object ($rs_user_check)) {	?><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php if ($rs_user->pic_url!='') { ?><img src="http://www.yzjiajiao.net/<?=$rs_user->pic_url?>" width="90" height="90" border="0"><?php } else { ?><img src="images/teacher_logo.jpg" width="90" height="90" border="0"><?php } ?></a>
                  <table width="90" border="0" cellpadding="0" cellspacing="0" class="news_css">
                    <tr>
                      <td height="26"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank">姓名：<?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>教员</a></td>
                    </tr>
                    <tr>
                      <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2); if (strlen($subject_name)>=40) { ?><?=iconv('gb2312','gbk',substr($subject_name,0,36))?>...<?php } else { ?><?=$subject_name?><?php } ?></a></td>
                    </tr>
                  </table>
                  <?php } } ?></td>
              <td style="width:10px;"></td>
              <td align="left" valign="top"><?php if ($rs_teacher_list=mysqli_fetch_object ($rs_list)) { $user_name=str_sql($rs_teacher_list->user_name);
				$user_check="select * from user_info_manage where user_name='$user_name'";
				$rs_user_check=mysqli_query ($conn, $user_check);
				if ($rs_user=mysqli_fetch_object ($rs_user_check)) { ?><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php if ($rs_user->pic_url!='') { ?><img src="http://www.yzjiajiao.net/<?=$rs_user->pic_url?>" width="90" height="90" border="0"><?php } else { ?><img src="images/teacher_logo.jpg" width="90" height="90" border="0"><?php } ?></a>
                  <table width="90" border="0" cellpadding="0" cellspacing="0" class="news_css">
                    <tr>
                      <td height="26"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank">姓名：<?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>教员</a></td>
                    </tr>
                    <tr>
                      <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2); if (strlen($subject_name)>=40) { ?><?=iconv('gb2312','gbk',substr($subject_name,0,36))?>...<?php } else { ?><?=$subject_name?><?php } ?></a></td>
                    </tr>
                  </table>
                  <?php } } ?></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="5" style="height:15px;"></td>
            </tr>
            <tr>
              <td style="width:10px;"></td>
              <td width="90" valign="top"><?php if ($rs_teacher_list=mysqli_fetch_object ($rs_list)) { $user_name=str_sql($rs_teacher_list->user_name);
				$user_check="select * from user_info_manage where user_name='$user_name'";
				$rs_user_check=mysqli_query ($conn, $user_check);
				if ($rs_user=mysqli_fetch_object ($rs_user_check)) { ?><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php if ($rs_user->pic_url!='') { ?><img src="http://www.yzjiajiao.net/<?=$rs_user->pic_url?>" width="90" height="90" border="0"><?php } else { ?><img src="images/teacher_logo.jpg" width="90" height="90" border="0"><?php } ?></a>
                  <table width="90" border="0" cellpadding="0" cellspacing="0" class="news_css">
                    <tr>
                      <td height="26"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank">姓名：<?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>教员</a></td>
                    </tr>
                    <tr>
                      <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2);
				  if (strlen($subject_name)>=40) { ?><?=iconv('gb2312','gbk',substr($subject_name,0,36))?>...<?php } else { ?><?=$subject_name?><?php } ?></a></td>
                    </tr>
                  </table>
                  <?php } } ?>
              </td>
              <td style="width:10px;"></td>
              <td width="90" align="left" valign="top"><?php if ($rs_teacher_list=mysqli_fetch_object ($rs_list)) { $user_name=str_sql($rs_teacher_list->user_name);
				$user_check="select * from user_info_manage where user_name='$user_name'";
				$rs_user_check=mysqli_query ($conn, $user_check);
				if ($rs_user=mysqli_fetch_object ($rs_user_check)) { ?><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php if ($rs_user->pic_url!='') { ?><img src="http://www.yzjiajiao.net/<?=$rs_user->pic_url?>" width="90" height="90" border="0"><?php } else { ?><img src="images/teacher_logo.jpg" width="90" height="90" border="0"><?php } ?></a>
                  <table width="90" border="0" cellpadding="0" cellspacing="0" class="news_css">
                    <tr>
                      <td height="26"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank">姓名：<?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>教员</a></td>
                    </tr>
                    <tr>
                      <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2); if (strlen($subject_name)>=40) { ?><?=iconv('gb2312','gbk',substr($subject_name,0,36))?>...<?php } else { ?><?=$subject_name?><?php } ?></a></td>
                    </tr>
                  </table>
                  <?php } } ?></td>
              <td style="width:10px;"></td>
            </tr>
          </table></td></tr>
        <tr><td bgcolor="#F4FCFF" style="height:10px;"></td>
        </tr>
      </table></td></tr>
    <tr><td colspan="3" style="height:10px;"></td></tr>
  </table>
  <table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="220" align="left" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4FCFF">
        <tr>
          <td height="30" valign="bottom" background="images/tj_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="156" align="left" style="font-size:14px;font-weight:bold;color:#FF0000;">　新会员必读</td>
                <td width="54" class="news_css"><a href="news.php?disp_type=list&sort_name=新会员必读&submit_action=11" target="_blank"><font color="#FF0000">更多...</font></a></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <?php 
				$list="select * from news_info_data where sort_id='11' order by id desc";
				$rs_list=mysqli_query ($conn, $list);
				if (mysqli_num_rows ($rs_list)>=5) { $rows_number=5; } else { $rows_number=mysqli_num_rows ($rs_list); }
				for($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>
              <tr>
                <td height="30">　&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>30) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,26))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a></td>
              </tr>
              <?php } ?>
          </table></td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
      </table>
	  <table width="210" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td style="height:10px;"></td>
          </tr>
          <tr>
            <td><img src="images/ad_2.jpg" width="210" height="450" border="0"></td>
          </tr>
          <tr>
            <td style="height:10px;"></td>
          </tr>
        </table>
        <table width="210" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" valign="bottom" background="images/tj_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="156" align="left" style="font-size:14px;font-weight:bold;color:#FF0000;">　按点击排行</td>
                  <td width="54" style="font-size:12px;">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td bgcolor="#F4FCFF" style="height:10px;"></td>
          </tr>
          <tr>
            <td valign="top"><table width="207" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr bgcolor="#F4FCFF">
                <td width="54" height="30" style="font-size:14px;font-weight:bold;color:#0054BB;">　教员</td>
                <td width="156">&nbsp;</td>
              </tr>
              <?php if ($_COOKIE['area_id']!='') { $area_id=str_sql($_COOKIE['area_id']); $list="select * from teacher_info_data where area_title like '%$area_id%' and state_info=1 order by visit_count";
				} else { $list="select * from teacher_info_data where state_info=1 order by visit_count"; }
				$rs_list=mysqli_query ($conn, $list);
				if (mysqli_num_rows ($rs_list)>=10) { $rows_number=10; } else { $rows_number=mysqli_num_rows ($rs_list); }				
				for($i=1;$i<=$rows_number;$i++) { $rs_teacher_list=mysqli_fetch_object ($rs_list); 
			    $user_name=$rs_teacher_list->user_name;
			    $user_check="select * from user_info_manage where user_name='$user_name'";
				$rs_user_check=mysqli_query ($conn, $user_check);
			    $rs_user=mysqli_fetch_object ($rs_user_check); ?>
              <tr <?php if (intval($i/2)==$i/2) { ?>bgcolor="#F5F5F5"<?php } ?>>
                <td height="30" align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>教员</a></td>
                <td align="left"><table width="156" border="0" cellpadding="0" cellspacing="0" class="news_css">
                    <tr>
                      <td style="height:5px;"></td>
                    </tr>
                    <tr>
                      <td height="20"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2);
					    if (strlen($subject_name)>=26) { ?><?=iconv('gb2312','gbk',substr($subject_name,0,20))?>...<?php } else { ?><?=$subject_name?><?php } ?></a></td>
                    </tr>
                    <tr>
                      <td style="height:5px;"></td>
                    </tr>
                </table></td>
              </tr>
              <?php } ?>
              <tr>
                <td height="10" colspan="2"></td>
              </tr>
              <?php if ($_COOKIE['area_id']!='') { $area_id=str_sql($_COOKIE['area_id']); $list="select * from student_info_data where area_title like '%$area_id%' and state_info=1 order by visit_count";
				} else { $list="select * from teacher_info_data where state_info=1 order by visit_count"; }
				$rs_list=mysqli_query ($conn, $list);
				if (mysqli_num_rows ($rs_list)>=10) { $rows_number=10; } else { $rows_number=mysqli_num_rows ($rs_list); }				
				for($i=1;$i<=$rows_number;$i++) { $rs_student_list=mysqli_fetch_object ($rs_list); 
			    $user_name=$rs_student_list->user_name;
			    $user_check="select * from user_info_manage where user_name='$user_name'";
				$rs_user_check=mysqli_query ($conn, $user_check);
			    $rs_user=mysqli_fetch_object ($rs_user_check); ?>
              <?php } ?>
            </table></td>
          </tr>
        </table>
        <table width="210" border="0" cellpadding="0" cellspacing="0">
          <tr>
			<td><img src="images/ad_3.jpg" width="210" height="450" border="0"></td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td><a href="http://www.yzlink.net" target="_blank"><img src="images/ad_1.jpg" width="210" height="97" border="0"></a></td>
          </tr>
        </table></td>
      <td width="750" align="left" valign="top">
	  <?php $sort_list_check="select * from sort_info_manage where sort_id='occupation' order by order_id";
	  $rs_sort_list_check=mysqli_query ($conn, $sort_list_check);
      for($k=1;$k<=4;$k++) {	 
	  $rs_sort_list=mysqli_fetch_object ($rs_sort_list_check); 	  	  
	  $sort_name=$rs_sort_list->sort_title; ?>	  
	  <table width="750" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;" class="news_css">
        <tr><td width="700" height="30" valign="bottom" background="images/list_top.jpg" style="font-size:14px;font-weight:bold;color:#0054BB;">　<?=$sort_name?>教员</td>
          <td width="50" valign="bottom" background="images/list_top.jpg" style="font-size:12px;"><a href="teacher_list.php?occupation_value=<?=$rs_sort_list->sort_title?>" target="_blank"><font color="#0054BB">更多...</font></a></td>
        </tr>
        <tr align="left" valign="top">
          <td colspan="4"><table width="750" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
              <tr bgcolor="#F4FCFF">
                <td height="10" colspan="6" bgcolor="#F4FCFF" style="font-weight:bold;border-right:1px #BCDFFF solid;border-bottom:1px #BCDFFF solid;">&nbsp;</td>
                </tr>
              <tr align="center" bgcolor="#F4FCFF">
                <td width="60" height="30" bgcolor="#F4FCFF" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">姓名</td>
                <td width="50" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">性别</td>
                <td width="260" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">辅导科目</td>
                <td width="160" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">毕业学校</td>
                <td width="130" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">自我描述及特长展示</td>
                <td width="80" style="font-weight:bold;border-bottom:1px #BCDFFF solid;">发布日期</td>
              </tr>			  
			<?php if ($_COOKIE['area_id']!='') { $area_id=str_sql($_COOKIE['area_id']); $list="select * from teacher_info_data where occupation_info='$sort_name' and area_title like '%$area_id%' and state_info=1 order by id desc";
			} else { $list="select * from teacher_info_data where state_info=1 order by id desc"; }
			$rs_list=mysqli_query ($conn, $list);
			if (mysqli_num_rows($rs_list)>=12) { $rows_number=12; } else { $rows_number=mysqli_num_rows($rs_list); }
			for ($i=1;$i<=$rows_number;$i++) {			
			$rs_teacher_list=mysqli_fetch_object ($rs_list);
			$user_name=$rs_teacher_list->user_name;
			$user_check="select * from user_info_manage where user_name='$user_name'";
			$rs_user_check=mysqli_query ($conn, $user_check);
			$rs_user=mysqli_fetch_object ($rs_user_check); ?>
            <tr <?php if (intval($i/2)==$i/2) { ?>bgcolor="#F5F5F5"<?php } ?>>
                <td height="30" align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>教员</a></td>
                <td align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_user->sex_info?></a></td>
                <td><table width="260" border="0" cellpadding="0" cellspacing="0" class="news_css">
                  <tr>
                    <td rowspan="3" style="width:10px;"></td>
                    <td style="height:10px;"></td>
                    <td rowspan="3" style="width:10px;"></td>
                  </tr>
                  <tr>
                    <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2);
				  if (strlen($subject_name)>=40) { ?><?=iconv('gb2312','gbk',substr($subject_name,0,36))?>...<?php } else { ?><?=$subject_name?><?php } ?></a></td>
                  </tr>
                  <tr><td style="height:10px;"></td></tr>
                </table></td>			
				<td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php if (strlen($rs_teacher_list->school_title)>=26) { ?><?=iconv('gb2312','gbk',substr($rs_teacher_list->school_title,0,22))?>...<?php } else { ?><?=$rs_teacher_list->school_title?><?php } ?></a></td>
                <td><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?php $person_info_value=	str_replace('<br>','',$rs_teacher_list->person_info); if (strlen($person_info_value)>=20) { ?><?=iconv('gb2312','gbk',substr($person_info_value,0,16))?>...<?php } else { ?><?=$person_info_value?><?php } ?></a></td>
                <td align="center"><a href="teacher_info.php?id=<?=$rs_teacher_list->id?>" target="_blank"><?=$rs_teacher_list->submit_date?></a></td>
              </tr>	
		  <?php } ?>
          </table>
            
<!--
			<table width="750" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td style="height:15px;"></td>
              </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" style="font-size:12px;line-height:160%;">
              <tr>			  
                <td width="19" style="width:15px;"></td>				
				<?php
				//if ($rows_number-7>7) { $rows_number_2=7; } else { $rows_number_2=$rows_number-7; 
				//if ($rows_number_2<0) { $rows_number_2=0; } }
				//for ($i=1;$i<=$rows_number_2;$i++) {
			   // $rs_teacher_list=mysql_fetch_object ($rs_list);
			   // $user_name=$rs_teacher_list->user_name;
			   // $user_check="select * from user_info_manage where user_name='$user_name'";
			  //  $rs_user_check=mysql_query ($user_check);
			  //  $rs_user=mysql_fetch_object ($rs_user_check); ?><td width="90" valign="top"><a href="teacher_info.php?id=<? //$rs_teacher_list->id?>" target="_blank"><img src="<? //$rs_user->pic_url?>" width="90" height="90" border="0"></a><br>
				  <table width="90" border="0" cellpadding="0" cellspacing="0">
                    <tr><td><a href="teacher_info.php?id=<? //$rs_teacher_list->id?>" target="_blank">姓名：<? //$rs_user->your_name?></a></td></tr>
                    <tr>
                      <td><a href="teacher_info.php?id=<? //$rs_teacher_list->id?>" target="_blank"><?php //$subject_name=substr($rs_teacher_list->subject_title,1,strlen($rs_teacher_list->subject_title)-2);				  
				  //if (strlen($subject_name)>=40) { ?>				  
                        <? //iconv('gb2312','gbk',substr($subject_name,0,36))?>...<?php //} else { ?><? //$subject_name?><?php //} ?></a></td>
                    </tr>
                  </table>
				  </td>
				<td style="width:15px;"></td><?php //} ?>
          </tr>
        </table>
            <table width="750" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td style="height:15px;"></td>
              </tr>
            </table>
-->
	  </td></tr></table>
	  <?php if ($k<4) { ?>
	  <table width="750" border="0" cellpadding="0" cellspacing="0"><tr><td style="height:10px;"></td></tr></table>
	  <?php } } ?>
      </td>
    </tr>
    <tr><td colspan="2" style="height:10px;"></td></tr>
  </table>
  <table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="326" align="left" valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4FCFF">
        <tr>
          <td height="30" valign="bottom" background="images/list_top.jpg"><table width="318" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="264" align="left" style="font-size:14px;font-weight:bold;color:#0054BB;">　家教新闻</td>
                <td width="54" style="font-size:12px;"><span class="news_css"><a href="news.php?disp_type=list&sort_name=家教新闻&submit_action=16" target="_blank"><font color="#0054BB">更多...</font></a></span></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:6px;"></td>
        </tr>
        <tr>
          <td valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td height="20" style="line-height:200%;"><?php $list="select * from news_info_data where sort_id='16' order by id desc";
		$rs_list=mysqli_query ($conn, $list);
		if (mysqli_num_rows ($rs_list)>=8) { $rows_number=8; } else { $rows_number=mysqli_num_rows ($rs_list); }
		for ($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>
　&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>=50) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,46))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a><br><?php } ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:5px;"></td>
        </tr>
      </table>
      </td>
      <td width="326" align="left" valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4FCFF">
        <tr>
          <td height="30" valign="bottom" background="images/list_top.jpg"><table width="318" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="264" align="left" style="font-size:14px;font-weight:bold;color:#0054BB;">　教员必读</td>
                <td width="54" style="font-size:12px;"><span class="news_css"><a href="news.php?disp_type=list&sort_name=教员必读&submit_action=9" target="_blank"><font color="#0054BB">更多...</font></a></span></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:6px;"></td>
        </tr>
        <tr>
          <td valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td height="20" style="line-height:200%;"><?php $list="select * from news_info_data where sort_id='9' order by id desc";
		$rs_list=mysqli_query ($conn, $list);
		if (mysqli_num_rows ($rs_list)>=8) { $rows_number=8; } else { $rows_number=mysqli_num_rows ($rs_list); }
		for ($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>
　&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>=50) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,46))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a><br><?php } ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:5px;"></td>
        </tr>
      </table></td>
      <td width="318" align="left" valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4FCFF">
        <tr>
          <td height="30" valign="bottom" background="images/list_top.jpg"><table width="318" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="264" align="left" style="font-size:14px;font-weight:bold;color:#0054BB;">　学员必读</td>
                <td width="54" style="font-size:12px;"><span class="news_css"><a href="news.php?disp_type=list&sort_name=学员必读&submit_action=10" target="_blank"><font color="#0054BB">更多...</font></a></span></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:6px;"></td>
        </tr>
        <tr>
          <td valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td height="20" style="line-height:200%;"><?php $list="select * from news_info_data where sort_id='10' order by id desc";
		$rs_list=mysqli_query ($conn, $list);
		if (mysqli_num_rows ($rs_list)>=8) { $rows_number=8; } else { $rows_number=mysqli_num_rows ($rs_list); }
		for ($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>
　&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>=50) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,46))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a><br><?php } ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:5px;"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10" colspan="3"></td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4FCFF">
        <tr>
          <td height="30" valign="bottom" background="images/list_top.jpg"><table width="318" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="264" align="left" style="font-size:14px;font-weight:bold;color:#0054BB;">　学习方法</td>
                <td width="54" style="font-size:12px;"><span class="news_css"><a href="news.php?disp_type=list&sort_name=&#23398;&#20064;&#26041;&#27861;&submit_action=12" target="_blank"><font color="#0054BB">更多...</font></a></span></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:6px;"></td>
        </tr>
        <tr>
          <td valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td height="20" style="line-height:200%;"><?php $list="select * from news_info_data where sort_id='12' order by id desc";
		$rs_list=mysqli_query ($conn, $list);
		if (mysqli_num_rows ($rs_list)>=8) { $rows_number=8; } else { $rows_number=mysqli_num_rows ($rs_list); }
		for ($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>　&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>=50) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,46))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a><br><?php } ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:5px;"></td>
        </tr>
      </table></td>
      <td align="left" valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4FCFF">
        <tr>
          <td height="30" valign="bottom" background="images/list_top.jpg"><table width="318" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="264" align="left" style="font-size:14px;font-weight:bold;color:#0054BB;">　教育方法</td>
                <td width="54" style="font-size:12px;"><span class="news_css"><a href="news.php?disp_type=list&sort_name=&#25945;&#32946;&#26041;&#27861;&submit_action=13" target="_blank"><font color="#0054BB">更多...</font></a></span></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:6px;"></td>
        </tr>
        <tr>
          <td valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td height="20" style="line-height:200%;"><?php $list="select * from news_info_data where sort_id='13' order by id desc";
		$rs_list=mysqli_query ($conn, $list);
		if (mysqli_num_rows ($rs_list)>=8) { $rows_number=8; } else { $rows_number=mysqli_num_rows ($rs_list); }
		for ($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>　&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>=50) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,46))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a><br><?php } ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:5px;"></td>
        </tr>
      </table></td>
      <td align="left" valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4FCFF">
        <tr>
          <td height="30" valign="bottom" background="images/list_top.jpg"><table width="318" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="264" align="left" style="font-size:14px;font-weight:bold;color:#0054BB;">　家长课堂</td>
                <td width="54" style="font-size:12px;"><span class="news_css"><a href="news.php?disp_type=list&sort_name=&#23478;&#38271;&#35838;&#22530;&submit_action=14" target="_blank"><font color="#0054BB">更多...</font></a></span></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:6px;"></td>
        </tr>
        <tr>
          <td valign="top"><table width="318" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td height="20" style="line-height:200%;"><?php $list="select * from news_info_data where sort_id='14' order by id desc";
		$rs_list=mysqli_query ($conn, $list);
		if (mysqli_num_rows ($rs_list)>=8) { $rows_number=8; } else { $rows_number=mysqli_num_rows ($rs_list); }
		for ($i=1;$i<=$rows_number;$i++) { $rs_news_list=mysqli_fetch_object ($rs_list); ?>　&middot;<a href="news.php?disp_type=info&news_name=<?=$rs_news_list->news_title?>&id=<?=$rs_news_list->id?>" target="_blank"><?php if (strlen($rs_news_list->news_title)>=50) { ?><?=iconv('gb2312','gbk',substr($rs_news_list->news_title,0,46))?>...<?php } else { ?><?=$rs_news_list->news_title?><?php } ?></a><br><?php } ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td style="height:5px;"></td>
        </tr>
      </table></td>
    </tr>
  </table>
<?php require('bottom.php'); ?>
</div>
</body>
</html>