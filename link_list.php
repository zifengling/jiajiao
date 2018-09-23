<?php
require("conn.php");
ob_start();
session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>友情链接</title>
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
<?php require('top.php'); ?>
<table width="970" border="0" cellpadding="0" cellspacing="0">
  <?php $ad_check="select * from ad_info_data where sort_id='4'";
		  $rs_ad_check=mysqli_query ($conn, $ad_check);
		  $rs_ad_list=mysqli_fetch_object ($rs_ad_check); ?>
  <tr>
    <td style="border:1px #BCDFFF solid;"><a href="<?=$rs_ad_list->url_info?>" target="_blank"><img src="<?=$rs_ad_list->pic_url?>" width="970" height="70" border="0"></a></td>
  </tr>
  <tr><td style="height:10px;"></td></tr>
</table>
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
          <td valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;" class="news_css">
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
	  <table width="740" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
      <?php $list="select * from link_info_data where sort_id='1' order by id desc";
	  $rs_list=mysqli_query ($conn, $list);
	  if (mysqli_num_rows($rs_list)/20>intval(mysqli_num_rows($rs_list)/20)) { $rows_number=intval(mysqli_num_rows($rs_list)/20)+1; } else { $rows_number=intval(mysqli_num_rows($rs_list)/20); } ?>		  
    <tr><td height="30" colspan="5" bgcolor="#F4FAFF" style="border-bottom:1px #9DC3EA solid;font-size:14px;font-weight:bold;">　文字链接</td></tr>		  
    <tr><td height="20" colspan="5"></td></tr>
	<?php for($i=1;$i<=20;$i++) { ?>		 
		  <tr><?php for ($k=1;$k<=5;$k++) { if ($rs_link=mysqli_fetch_object($rs_list)) { ?><td width="200" height="30" align="left">　<a href="<?=$rs_link->url_info?>" target="_blank"><?=$rs_link->url_title?></a></td>
          <?php } } ?>  
		  </tr>
	      <?php } ?><tr><td height="20" colspan="5" style="border-bottom:1px #9DC3EA solid;">&nbsp;</td></tr>
        </table><br>
      <table width="740" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
        <?php $list="select * from link_info_data where sort_id='2' order by id desc";
	  $rs_list=mysqli_query ($conn, $list);
	  if (mysqli_num_rows($rs_list)/20>intval(mysqli_num_rows($rs_list)/20)) { $rows_number=intval(mysqli_num_rows($rs_list)/20)+1; } else { $rows_number=intval(mysqli_num_rows($rs_list)/20); } ?>
        <tr>
          <td height="30" colspan="5" bgcolor="#F4FAFF" style="border-bottom:1px #9DC3EA solid;font-size:14px;font-weight:bold;">　图片链接</td>
        </tr>
        <tr>
          <td height="20" colspan="5"></td>
        </tr>
        <?php for($i=1;$i<=20;$i++) { ?>
        <tr><?php for ($k=1;$k<=5;$k++) { if ($rs_link=mysqli_fetch_object($rs_list)) { ?>
          <td width="200" height="30" align="left">　<a href="<?=$rs_link->url_info?>" target="_blank"><img src="<?=$rs_link->pic_url?>" width="120" height="50" border="0"></a></td>
          <?php } } ?>
        </tr>
        <?php } ?>
        <tr>
          <td height="20" colspan="5" style="border-bottom:1px #9DC3EA solid;">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
  <?php require('bottom.php'); ?>
  </div>
</body></html>