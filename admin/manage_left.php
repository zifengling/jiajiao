<?php
require("../conn.php");
ob_start();
session_start(); 
require('login_user_check.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>无标题文档</title>
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
<body>
<table width="200" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F0FBFF" style="border-left:1px #0052A5 solid;border-right:1px #0052A5 solid;margin-left:10px;">
  <tr>
    <td valign="top"><?php switch($_GET['disp_type']) { case 'web_set': ?>	
	
	<table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
      <tr>
        <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 系统设置</td>
      </tr>
      <tr><td style="height:10px;"></td>
      </tr>
      <tr>
        <td height="30">　　　　　<a href="web_set_manage.php?disp_type=web_content" target="info">网站基本信息</a></td>
      </tr>
      <tr>
        <td height="30">　　　　　<a href="web_set_manage.php?disp_type=password_edit" target="info">修改管理员密码</a></td>
      </tr>	  
      <tr><td style="height:10px;"></td></tr>
    </table>
	<?php break; case 'sort': ?>
  <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 分类管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=province" target="info">城市分类</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=subject" target="info">课程分类</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=occupation" target="info">教员身份</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=degree" target="info">学历学位</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=service" target="info">授课方式</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=class" target="info">年级分类</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=teaching_properties" target="info">求教性质</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=teaching_times" target="info">每周上课次数</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="sort_main.php?disp_type=sort_list&id=question" target="info">找回密码的问题</a></td>
        </tr>
		<tr>
          <td style="height:10px;"></td>
        </tr>
      </table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  

	  <?php break; case 'user': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 会员管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="user_list_manage.php?disp_type=list" target="info">所有会员</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="user_list_manage.php?disp_type=list&state_value=0" target="info">未认证会员</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="user_list_manage.php?disp_type=list&state_value=1" target="info">已认证会员</a></td>
        </tr>
        <tr>
		
		

          <td height="30">　<a href="user_list_manage.php?disp_type=list&authentication_value=1&state_value=0" target="info">已上传认证资料（未认证）会员</a></td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
      </table>
      <?php break; case 'teacher_user': ?>	  
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 教员管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30" align="right"><table width="150" height="120" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list" target="info">所有教员</a></td>
              </tr>
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list&state_value=0" target="info">未审核教员</a></td>
              </tr>
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list&state_value=1" target="info">已审核教员</a></td>
              </tr>
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list&state_value=2" target="info">已认证教员</a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="30" align="right"><table width="150" height="30" border="0" cellpadding="0" cellspacing="0" class="news_css">
	    
		<?php $check="select sort_id,sort_title from sort_info_manage where sort_id='occupation' order by order_id";
		$rs_check=mysqli_query ($conn, $check);		
	    if (mysqli_num_rows($rs_check)/2>intval(mysqli_num_rows($rs_check)/2)) { $rows_count=intval(mysqli_num_rows($rs_check)/2)+1; } else { $rows_count=intval(mysqli_num_rows($rs_check)/2); }
		while ($rs_sort=mysqli_fetch_object ($rs_check)) {
		 ?>
		 
		 
		 
            <tr>	
              <td width="180" height="30"><a href="teacher_list_manage.php?disp_type=list&occupation_value=<?=$rs_sort->sort_title?>" target="info"><?=$rs_sort->sort_title?>教员</a></td><td width="10"></td></tr><?php } ?>
		  </table></td>
        </tr>
      </table>	  
	  <?php break; case 'student_user': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 学员管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="student_list_manage.php?disp_type=list" target="info">所有学员</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="student_list_manage.php?disp_type=list&state_value=0" target="info">未审核学员</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="student_list_manage.php?disp_type=list&state_value=1" target="info">已审核学员</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="student_list_manage.php?disp_type=list&state_value=2" target="info">已认证学员</a></td>
        </tr>
      </table>
	  
	  <?php break; case 'order': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 订单管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　<a href="order_list_manage.php?disp_type=list" target="info">预约订单（游客发布的订单）</a></td>
        </tr>
      </table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <?php break; case 'finance': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 财务管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="bank_list_manage.php" target="info">收款帐号设置</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="price_list_manage.php" target="info">支付价格设置</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="financial_list_manage.php?disp_type=list" target="info">会员充值记录</a></td>
        </tr>
      </table>	  
	  
	  
	  <?php break; case 'news': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 资讯管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">　新闻中心</td>
        </tr>
        <tr>
          <td height="20">　　　<a href="news_list_manage.php?disp_type=list&submit_action=15" target="info">最新公告</a>　　　<a href="news_list_manage.php?disp_type=list&submit_action=16" target="info">家教新闻</a></td>
        </tr>
        <tr>
          <td height="20" style="font-size:14px;">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">　关于我们</td>
        </tr>
        <tr>
          <td height="20">　　　<a href="news_list_manage.php?disp_type=edit&sort_id=1" target="info">关于家教网</a>　　<a href="news_list_manage.php?disp_type=edit&sort_id=2" target="info">服务条款</a></td>
        </tr>
        <tr>
          <td height="30">　　　<a href="news_list_manage.php?disp_type=edit&sort_id=3" target="info">隐私保护</a>　　　<a href="news_list_manage.php?disp_type=edit&sort_id=4" target="info">法律声明</a></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">　收费标准</td>
        </tr>
        <tr>
          <td height="20">　　　<a href="news_list_manage.php?disp_type=edit&sort_id=5" target="info">做家教（教员）收费标准</a></td>
        </tr>
        <tr>
          <td height="30"> 　　　<a href="news_list_manage.php?disp_type=edit&sort_id=6" target="info">请家教（学员）收费标准</a></td>
        </tr>
        <tr>
          <td height="20">　　　<a href="news_list_manage.php?disp_type=edit&sort_id=7" target="info">退款细则</a>　　　<a href="news_list_manage.php?disp_type=edit&sort_id=8" target="info">付款方式</a></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">　帮助中心</td>
        </tr>
        <tr>
          <td height="20">　　　<a href="news_list_manage.php?disp_type=list&submit_action=9" target="info">教员必读</a>　　　<a href="news_list_manage.php?disp_type=list&submit_action=10" target="info">学员必读</a></td>
        </tr>
        <tr>
          <td height="30">　　　<a href="news_list_manage.php?disp_type=list&submit_action=11" target="info">新会员必读</a></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">　家教技巧</td>
        </tr>
        <tr>
          <td height="20">　　　<a href="news_list_manage.php?disp_type=list&submit_action=12" target="info">学习方法</a>　　　<a href="news_list_manage.php?disp_type=list&submit_action=13" target="info">教育方法</a></td>
        </tr>
        <tr>
          <td height="30">　　　<a href="news_list_manage.php?disp_type=list&submit_action=14" target="info">家长课堂</a></td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
        </tr>
      </table>	  
	  <?php break; case 'guest': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 咨询管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　留言列表</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
        </tr>
      </table>	  
	  <?php break; case 'sale': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 营销管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　积分设置</td>
        </tr>
        <tr>
          <td height="30">　　　　　获得积分的教员</td>
        </tr>
        <tr>
          <td height="30">　　　　　获得积分的学员</td>
        </tr>
      </table>
	  <?php break; case 'ad': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 广告管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="ad_list_manage.php?disp_type=list&submit_action=1" target="info">首页变换广告</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="ad_list_manage.php?disp_type=list&submit_action=2" target="info">首页左下侧广告</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="ad_list_manage.php?disp_type=list&submit_action=3" target="info">二级页面广告</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="ad_list_manage.php?disp_type=list&submit_action=4" target="info">详细页面广告</a></td>
        </tr>
      </table>
	  

	  <?php break; case 'link': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">　　+ 友情链接管理</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="link_list_manage.php?disp_type=list&submit_action=1" target="info">文字链接列表</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　<a href="link_list_manage.php?disp_type=list&submit_action=2" target="info">图片链接列表</a></td>
        </tr>
        <tr>
          <td height="30">　　　　　</td>
        </tr>
      </table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	 <?php } ?>
	  
	  
    </td>
  </tr>
</table>
</body>
</html>
