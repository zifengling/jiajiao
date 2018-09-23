<?php
require("conn.php");
ob_start();
session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?php if ($_GET['sort_name']!='') { ?><?=$_GET['sort_name']?><?php } else { ?><?=$_GET['news_name']?><?php } ?></title>
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
</script>
<body><div align="center">
<?php require('top.php');
//if ($_GET['disp_type']=='info') { ?>
<?php //} ?>
<table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="230" align="left" valign="top"><table width="230" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="120" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;" class="news_css">
            <tr>
              <td height="30" background="images/sort_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="156" align="left" style="font-size:14px;font-weight:bold;">　关于我们</td>
                    <td width="54" style="font-size:12px;">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="50">　　　<a href="news.php?disp_type=info&sort_id=1">关于家教网</a>　　<a href="news.php?disp_type=info&sort_id=2">服务条款</a></td>
            </tr>
            <tr>
              <td height="30" valign="top">　　　<a href="news.php?disp_type=info&sort_id=3">隐私保护</a>　　　<a href="news.php?disp_type=info&sort_id=4">法律声明</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="150" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;" class="news_css">
            <tr>
              <td height="30" background="images/sort_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="156" align="left" style="font-size:14px;font-weight:bold;">　收费标准</td>
                    <td width="54" style="font-size:12px;">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="50">　　　<a href="news.php?disp_type=info&sort_id=5">做家教（教员）收费标准</a></td>
            </tr>
            <tr>
              <td height="30" valign="top"> 　　　<a href="news.php?disp_type=info&sort_id=6">请家教（学员）收费标准</a></td>
            </tr>
            <tr>
              <td height="30" valign="top">　　　<a href="news.php?disp_type=info&sort_id=7">退款细则</a>　　　<a href="news.php?disp_type=info&sort_id=8">付款方式</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="120" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;" class="news_css">
            <tr>
              <td height="30" background="images/sort_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="156" align="left" style="font-size:14px;font-weight:bold;">　帮助中心</td>
                    <td width="54" style="font-size:12px;">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr>			
              <td height="50">　　　<a href="news.php?disp_type=list&sort_name=教员必读&submit_action=9">教员必读</a>　　　<a href="news.php?disp_type=list&sort_name=学员必读&submit_action=10">学员必读</a></td>
            </tr>
            <tr>
              <td height="30" valign="top">　　　<a href="news.php?disp_type=list&sort_name=新会员必读&submit_action=11">新会员必读</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="120" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;" class="news_css">
            <tr>
              <td height="30" background="images/sort_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="156" align="left" style="font-size:14px;font-weight:bold;">　家教技巧</td>
                    <td width="54" style="font-size:12px;">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="50">　　　<a href="news.php?disp_type=list&sort_name=学习方法&submit_action=12">学习方法</a>　　　<a href="news.php?disp_type=list&sort_name=教育方法&submit_action=13">教育方法</a></td>
            </tr>
            <tr>
              <td height="30" valign="top">　　　<a href="news.php?disp_type=list&sort_name=家长课堂&submit_action=14">家长课堂</a></td>
            </tr>
          </table></td>
        </tr>
      </table>       
	  </td>
      <td width="740" align="left" valign="top" class="news_css">
        <?php switch ($_GET['disp_type']) { 
	   case 'list':
	   $submit_action=str_sql($_GET['submit_action']);
	   if ($_POST['search_value']!='') { $search_value=str_sql($_POST['search_value']); } else { $search_value=str_sql($_GET['search_value']); }
	  $list="select * from news_info_data where sort_id='$submit_action'";
	  if ($search_value!='') { $list=$list." and news_title='$search_value' order by id desc"; }	  
	  $rs_list=mysqli_query ($conn, $list);
	  if (mysqli_num_rows($rs_list)/20>intval(mysqli_num_rows($rs_list)/20)) { $rows_count=intval(mysqli_num_rows($rs_list)/20)+1; } else { $rows_count=intval(mysqli_num_rows($rs_list)/20); }
	 $page=$_GET['page'];
	 if($page==0 || $page=='') { $page=1; }
	 if($page>$rows_count) { $page=$rows_count; }
	 if($rows_count<1) { $rows_count=1; } 	 
	 if(mysqli_fetch_object($rs_list)) { ?>
<table width="740" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
          <tr align="left" bgcolor="#F4FAFF" background="images/sort_background_1.jpg">
            <form action="news.php?disp_type=list&sort_name=<?=$_GET['sort_name']?>&submit_action=<?=$_GET['submit_action']?>&page=<?=$page?>" method="post">
            <td height="30" colspan="4" style="border-bottom:1px #9DC3EA solid;">
			  <table width="740" border="0" cellpadding="0" cellspacing="0" class="news_css" style="border:0px #9DC3EA solid;">
              <tr>
                <td width="20" height="40" style="font-size:14px;font-weight:bold;">&nbsp;</td>
                <td width="110" style="font-size:14px;font-weight:bold;"><?=$_GET['sort_name']?></td>
                <td width="40" style="font-size:12px;">标题：                    </td>
                <td width="410" style="font-size:12px;"><input name="search_value" type="text" id="search_value" style="width:400px;height:16px;font-size:12px;"></td>
                <td width="160" style="font-size:12px;"><input name="imageField" type="image" src="images/search_button_1.jpg" width="50" height="22" border="0"></td>
              </tr>
            </table></td></form>
          </tr>
     <?php 
	 if(mysqli_data_seek($rs_list,($page-1)*20)) {
	 for($i=1;$i<=20;$i++) {
	 if($rs_news_list=mysqli_fetch_object($rs_list)) { ?>
          <tr><td colspan="4" style="height:10px;"></td></tr>
	      <tr>
            <td width="20" height="20">&nbsp;</td>
            <td width="620" align="left" style="border-bottom:1px #F0F0F0 solid;"><a href="news.php?disp_type=info&id=<?=$rs_news_list->id?>" target="_blank"><?=$rs_news_list->news_title?></a></td>
            <td width="80" style="border-bottom:1px #F0F0F0 solid;"><?=$rs_news_list->submit_date?></td>
            <td width="20">&nbsp;</td>
          </tr>		  
	      <?php } } } ?><tr align="center"><td height="50" colspan="4" style="border-bottom:1px #9DC3EA solid;"><a href="news.php?disp_type=list&sort_name=<?=$_GET['sort_name']?>&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>">第一页</a>　　　<a href="news.php?disp_type=list&sort_name=<?=$_GET['sort_name']?>&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$page-1?>">上一页</a>　　　　　　<?=$page?>　　　　　　 共 <?=$rows_count?> 页　　　　　<a href="news.php?disp_type=list&sort_name=<?=$_GET['sort_name']?>&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$page+1?>">下一页</a>　　　<a href="news.php?disp_type=list&sort_name=<?=$_GET['sort_name']?>&submit_action=<?=$submit_action?>&search_value=<?=$search_value?>&page=<?=$rows_count?>">最后一页</a> </td></tr>
        </table>
	<?php } else { ?><br><br><br><br><center>暂无记录!</center><?php }
    break; case 'info':
	$id=str_sql($_GET['id']);
	if ($id!='') {
	$news_check="select * from news_info_data where id='$id'";
	} else {	
	$sort_id=str_sql($_GET['sort_id']);
	$news_check="select * from news_info_data where sort_id='$sort_id'"; }
	$rs_news_check=mysqli_query ($conn, $news_check);	
	if ($rs_news_info=mysqli_fetch_object ($rs_news_check)) { ?>
<?=$rs_news_info->content_info?><?php } } ?>
      </td>
    </tr>
  </table>
  <?php require('bottom.php'); ?>
  </div>
</body></html>