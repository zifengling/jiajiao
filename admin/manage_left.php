<?php
require("../conn.php");
ob_start();
session_start(); 
require('login_user_check.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�ޱ����ĵ�</title>
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
        <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ϵͳ����</td>
      </tr>
      <tr><td style="height:10px;"></td>
      </tr>
      <tr>
        <td height="30">����������<a href="web_set_manage.php?disp_type=web_content" target="info">��վ������Ϣ</a></td>
      </tr>
      <tr>
        <td height="30">����������<a href="web_set_manage.php?disp_type=password_edit" target="info">�޸Ĺ���Ա����</a></td>
      </tr>	  
      <tr><td style="height:10px;"></td></tr>
    </table>
	<?php break; case 'sort': ?>
  <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ �������</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=province" target="info">���з���</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=subject" target="info">�γ̷���</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=occupation" target="info">��Ա���</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=degree" target="info">ѧ��ѧλ</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=service" target="info">�ڿη�ʽ</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=class" target="info">�꼶����</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=teaching_properties" target="info">�������</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=teaching_times" target="info">ÿ���Ͽδ���</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="sort_main.php?disp_type=sort_list&id=question" target="info">�һ����������</a></td>
        </tr>
		<tr>
          <td style="height:10px;"></td>
        </tr>
      </table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  

	  <?php break; case 'user': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ��Ա����</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">����������<a href="user_list_manage.php?disp_type=list" target="info">���л�Ա</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="user_list_manage.php?disp_type=list&state_value=0" target="info">δ��֤��Ա</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="user_list_manage.php?disp_type=list&state_value=1" target="info">����֤��Ա</a></td>
        </tr>
        <tr>
		
		

          <td height="30">��<a href="user_list_manage.php?disp_type=list&authentication_value=1&state_value=0" target="info">���ϴ���֤���ϣ�δ��֤����Ա</a></td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
      </table>
      <?php break; case 'teacher_user': ?>	  
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ��Ա����</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30" align="right"><table width="150" height="120" border="0" cellpadding="0" cellspacing="0" class="news_css">
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list" target="info">���н�Ա</a></td>
              </tr>
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list&state_value=0" target="info">δ��˽�Ա</a></td>
              </tr>
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list&state_value=1" target="info">����˽�Ա</a></td>
              </tr>
              <tr>
                <td><a href="teacher_list_manage.php?disp_type=list&state_value=2" target="info">����֤��Ա</a></td>
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
              <td width="180" height="30"><a href="teacher_list_manage.php?disp_type=list&occupation_value=<?=$rs_sort->sort_title?>" target="info"><?=$rs_sort->sort_title?>��Ա</a></td><td width="10"></td></tr><?php } ?>
		  </table></td>
        </tr>
      </table>	  
	  <?php break; case 'student_user': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ѧԱ����</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">����������<a href="student_list_manage.php?disp_type=list" target="info">����ѧԱ</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="student_list_manage.php?disp_type=list&state_value=0" target="info">δ���ѧԱ</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="student_list_manage.php?disp_type=list&state_value=1" target="info">�����ѧԱ</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="student_list_manage.php?disp_type=list&state_value=2" target="info">����֤ѧԱ</a></td>
        </tr>
      </table>
	  
	  <?php break; case 'order': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ��������</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">����<a href="order_list_manage.php?disp_type=list" target="info">ԤԼ�������οͷ����Ķ�����</a></td>
        </tr>
      </table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <?php break; case 'finance': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ �������</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">����������<a href="bank_list_manage.php" target="info">�տ��ʺ�����</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="price_list_manage.php" target="info">֧���۸�����</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="financial_list_manage.php?disp_type=list" target="info">��Ա��ֵ��¼</a></td>
        </tr>
      </table>	  
	  
	  
	  <?php break; case 'news': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ��Ѷ����</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">����������</td>
        </tr>
        <tr>
          <td height="20">������<a href="news_list_manage.php?disp_type=list&submit_action=15" target="info">���¹���</a>������<a href="news_list_manage.php?disp_type=list&submit_action=16" target="info">�ҽ�����</a></td>
        </tr>
        <tr>
          <td height="20" style="font-size:14px;">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">����������</td>
        </tr>
        <tr>
          <td height="20">������<a href="news_list_manage.php?disp_type=edit&sort_id=1" target="info">���ڼҽ���</a>����<a href="news_list_manage.php?disp_type=edit&sort_id=2" target="info">��������</a></td>
        </tr>
        <tr>
          <td height="30">������<a href="news_list_manage.php?disp_type=edit&sort_id=3" target="info">��˽����</a>������<a href="news_list_manage.php?disp_type=edit&sort_id=4" target="info">��������</a></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">���շѱ�׼</td>
        </tr>
        <tr>
          <td height="20">������<a href="news_list_manage.php?disp_type=edit&sort_id=5" target="info">���ҽ̣���Ա���շѱ�׼</a></td>
        </tr>
        <tr>
          <td height="30"> ������<a href="news_list_manage.php?disp_type=edit&sort_id=6" target="info">��ҽ̣�ѧԱ���շѱ�׼</a></td>
        </tr>
        <tr>
          <td height="20">������<a href="news_list_manage.php?disp_type=edit&sort_id=7" target="info">�˿�ϸ��</a>������<a href="news_list_manage.php?disp_type=edit&sort_id=8" target="info">���ʽ</a></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">����������</td>
        </tr>
        <tr>
          <td height="20">������<a href="news_list_manage.php?disp_type=list&submit_action=9" target="info">��Ա�ض�</a>������<a href="news_list_manage.php?disp_type=list&submit_action=10" target="info">ѧԱ�ض�</a></td>
        </tr>
        <tr>
          <td height="30">������<a href="news_list_manage.php?disp_type=list&submit_action=11" target="info">�»�Ա�ض�</a></td>
        </tr>
        <tr>
          <td height="20">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" style="font-size:14px;">���ҽ̼���</td>
        </tr>
        <tr>
          <td height="20">������<a href="news_list_manage.php?disp_type=list&submit_action=12" target="info">ѧϰ����</a>������<a href="news_list_manage.php?disp_type=list&submit_action=13" target="info">��������</a></td>
        </tr>
        <tr>
          <td height="30">������<a href="news_list_manage.php?disp_type=list&submit_action=14" target="info">�ҳ�����</a></td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
        </tr>
      </table>	  
	  <?php break; case 'guest': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ��ѯ����</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">���������������б�</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
        </tr>
      </table>	  
	  <?php break; case 'sale': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ Ӫ������</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">������������������</td>
        </tr>
        <tr>
          <td height="30">������������û��ֵĽ�Ա</td>
        </tr>
        <tr>
          <td height="30">������������û��ֵ�ѧԱ</td>
        </tr>
      </table>
	  <?php break; case 'ad': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ ������</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">����������<a href="ad_list_manage.php?disp_type=list&submit_action=1" target="info">��ҳ�任���</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="ad_list_manage.php?disp_type=list&submit_action=2" target="info">��ҳ���²���</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="ad_list_manage.php?disp_type=list&submit_action=3" target="info">����ҳ����</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="ad_list_manage.php?disp_type=list&submit_action=4" target="info">��ϸҳ����</a></td>
        </tr>
      </table>
	  

	  <?php break; case 'link': ?>
      <table width="200" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="30" background="../images/manage_left_button.jpg" style="font-size:14px;border-bottom:1px #0052A5 solid;">����+ �������ӹ���</td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td height="30">����������<a href="link_list_manage.php?disp_type=list&submit_action=1" target="info">���������б�</a></td>
        </tr>
        <tr>
          <td height="30">����������<a href="link_list_manage.php?disp_type=list&submit_action=2" target="info">ͼƬ�����б�</a></td>
        </tr>
        <tr>
          <td height="30">����������</td>
        </tr>
      </table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	 <?php } ?>
	  
	  
    </td>
  </tr>
</table>
</body>
</html>
