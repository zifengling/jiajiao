<?php
require("conn.php");
ob_start();
session_start();
$id=str_sql($_GET['id']);
$visit_number_update="update teacher_info_data set visit_count=visit_count+1 where id='$id'";
mysqli_query ($conn, $visit_number_update);
$info="select * from teacher_info_data where id='$id'";    
$rs_info=mysqli_query ($conn, $info);
if ($rs_teacher_info=mysqli_fetch_object ($rs_info)) {
$user_name=$rs_teacher_info->user_name;
$user_check="select * from user_info_manage where user_name='$user_name'";
$rs_user_check=mysqli_query ($conn, $user_check);
$rs_user=mysqli_fetch_object ($rs_user_check); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>��Ա-<?=$rs_teacher_info->occupation_info?>-<?=$rs_teacher_info->school_title?>-<?=$rs_teacher_info->professional_title?></title>
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
<body><div align="center"><?php require('top.php'); ?>
  <table width="970" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="750" align="left" valign="top">
<table width="750" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
  <tr bgcolor="#E2F1FE">
    <td height="30" colspan="4" bgcolor="#D3EAFE" style="border-bottom:1px #9DC3EA solid;" class="button_css">����Ա������Ϣ</td>
    <td width="150" height="30" bgcolor="#D3EAFE" class="news_css" style="border-bottom:1px #9DC3EA solid;">���������<?=$rs_teacher_info->visit_count?></td>
  </tr>
  <tr>
    <td width="90" height="40" align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��Ա������</td>
    <td width="210" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<?=substr($rs_user->your_name,0,strpos($rs_user->your_name,','))?>��Ա</td>
    <td width="90" align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��Ա�Ա�</td>
    <td width="210" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<?=$rs_user->sex_info?></td>
	<td height="150" rowspan="4" align="center" style="border-bottom:1px #9DC3EA solid;"><?php if ($rs_user->pic_url!='') { ?><img src="http://www.yzjiajiao.net/<?=$rs_user->pic_url?>" width="120" height="120" border="0"><?php } else { ?><img src="../images/teacher_logo.jpg" width="120" height="120" border="0"><?php } ?></td>
  </tr>
  <tr><td width="90" height="40" align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��֤�����</td>
	
	<td width="110" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<!--<?php //if ($rs_teacher_info->state_info==2) { ?>����֤<?php //} else { ?>δ��֤<?php //} ?>-->�����</td>
    <td width="90" align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">�������ڣ�</td>
    <td style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<?=$rs_teacher_info->submit_date?></td>
    </tr>
  <tr>
    <td height="70" align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��ϵ��ʽ��</td>
	<td colspan="3" align="center" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;"><?php if ($_SESSION['login_user_name']=='') { ?> <a href="../news.php?disp_type=info&sort_id=17" target="_blank">����ϵ����Ա</a>	  <?php } else { $login_user_name=str_sql($_SESSION['login_user_name']); $order_check="select * from order_info_data where student_user_name='$login_user_name' and sort_id='$id'";
		$rs_sort_check=mysqli_query ($conn, $order_check);
		if (mysqli_fetch_object ($rs_sort_check)) { ?>
        <table width="490" border="0" cellpadding="0" cellspacing="0" class="news_css">
          <tr>
            <td height="20" colspan="4" style="border-bottom:1px #9DC3EA solid;">&nbsp;</td>
          </tr>
          <tr>
            <td width="80" height="30" bgcolor="#EFF7FE" style="border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;">���̶��绰��</td>
            <td width="210" height="30" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��
                <?php if ($rs_user->tel_number!='') { ?>
                <?=$rs_user->tel_number?>
                <?php } else { ?>
                ��
                <?php } ?></td>
            <td width="80" height="30" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">���ƶ��绰��</td>
            <td width="120" height="30" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��
                <?=$rs_user->mobile_number?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#EFF7FE" style="border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;">�����棺</td>
            <td height="30" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��
                <?php if ($rs_user->fax_number!='') { ?>
                <?=$rs_user->fax_number?>
                <?php } else { ?>
                ��
                <?php } ?></td>
            <td height="30" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">���ʱࣺ</td>
            <td height="30" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��
                <?php if ($rs_user->zip_code_number!='') { ?>
                <?=$rs_user->zip_code_number?>
                <?php } else { ?>
                ��
                <?php } ?></td>
          </tr>
          <tr>
            <td height="29" bgcolor="#EFF7FE" style="border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;">���������䣺</td>
            <td height="29" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��
                <?=$rs_user->e_mail?></td>
            <td height="29" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��QQ���룺</td>
            <td height="29" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��
                <?php if ($rs_user->qq_info!='') { ?>
                <?=$rs_user->qq_info?>
                <?php } else { ?>
                ��
                <?php } ?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#EFF7FE" style="border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;border-bottom:1px #9DC3EA solid;">��������ַ��</td>
            <td height="30" colspan="3" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;"><table width="410" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td rowspan="3" style="width:12px;"></td>
                  <td style="height:10px;"></td>
                  <td rowspan="3" style="width:10px;"></td>
                </tr>
                <tr>
                  <td align="left"><?=$rs_user->address_info?></td>
                </tr>
                <tr>
                  <td style="height:10px;"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="20" colspan="4">&nbsp;</td>
          </tr>
        </table>
        <?php } else { ?>
        <table width="430" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"><a href="../news.php?disp_type=info&sort_id=17" target="_blank">����ϵ����Ա</a></td>
            </tr>
        </table>
        <?php } } ?>
	</td>
    </tr>
</table>
<br><table width="750" border="0" cellpadding="0" cellspacing="0" style="border-top:1px #9DC3EA solid;border-left:1px #9DC3EA solid;border-right:1px #9DC3EA solid;" class="news_css">
  <tr bgcolor="#E2F1FE">
    <td height="30" colspan="5" bgcolor="#D3EAFE" style="border-bottom:1px #9DC3EA solid;" class="button_css">����Ա�ҽ���Ϣ</td>
    </tr>
  <tr>
    <td width="160" height="40" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">����Ա��ݣ�</td>
    <td width="250" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<?=$rs_teacher_info->occupation_info?></td>
    <td width="90" align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��ѧרҵ��</td>
    <td colspan="2" style="border-bottom:1px #9DC3EA solid;">��<?=$rs_teacher_info->professional_title?></td>
    </tr>
  <tr>
    <td height="40" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">����ҵ���ڶ�ѧУ��</td>
    <td style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<?=$rs_teacher_info->school_title?></td>
    <td align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">�������飺</td>
    <td colspan="2" style="border-bottom:1px #9DC3EA solid;">��<?=$rs_teacher_info->experience_info?></td>
    </tr>
  <tr>
    <td height="40" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��ѧ��ѧλ��</td>
    <td style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<?=$rs_teacher_info->degree_info?>
	</td>
    <td align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">������ʽ��</td>
    <td colspan="2" style="border-bottom:1px #9DC3EA solid;">��<?=$rs_teacher_info->service_type?></td>
    </tr>
  <tr>
    <td height="40" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">���Ƿ��ܿ�С�ࣺ</td>
    <td style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">��<?php if ($rs_teacher_info->class_student!='0') { ?>��<?php } else { ?>����<?php } ?></td>
    <td align="center" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">С���ģ��</td>
    <td colspan="2" style="border-bottom:1px #9DC3EA solid;">��<?php switch ($rs_teacher_info->class_student) { case '1-5��': ?>1-5��<?php break; case '5-10��': ?>5-10��<?php break; case '10-15��': ?>10-15��<?php break; case '15-20��': ?>15-20��<?php break; case '20-30��': ?>20-30��<?php break; case 'ȫ��': ?>ȫ��<?php } ?></td>
    </tr>
  <tr>
    <td height="40" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">����������</td>
    <td height="0" colspan="4" style="border-bottom:1px #9DC3EA solid;"><table width="590" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td rowspan="3" style="width:12px;"></td>
          <td style="height:10px;"></td>
          <td rowspan="3" style="width:10px;"></td>
        </tr>
        <tr>
		  
		  
		  
		  
		  <td align="left"><?=substr($rs_teacher_info->area_title,1,strlen($rs_teacher_info->area_title)-2)?></td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">���ɸ����γ̣�</td>
    <td height="0" colspan="4" style="border-bottom:1px #9DC3EA solid;"><table width="590" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="3" style="width:12px;"></td>
        <td style="height:10px;"></td>
        <td rowspan="3" style="width:10px;"></td>
      </tr>
      <tr>
        <td align="left"><?=substr($rs_teacher_info->subject_title,1,strlen($rs_teacher_info->subject_title)-2)?></td>
      </tr>
      <tr>
        <td style="height:10px;"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="120" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">�����ڿ�ʱ�䣺</td>
    <td height="0" colspan="4" style="border-bottom:1px #9DC3EA solid;">      <table width="560" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td style="width:10px;"></td>
          <td><table width="540" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="70" height="30"><input name="service_time[]" id="service_time"  type="checkbox" value="��һ��" <?php if (trim(strpos($rs_teacher_info->service_time_info,'��һ��'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'��һ��'))!='') { ?><font color="#FF0000">��һ��</font><?php } else { ?>��һ��<?php } ?></td>	  
              <td width="70"><input name="service_time[]" id="service_time"  type="checkbox" value="�ܶ���" <?php if (trim(strpos($rs_teacher_info->service_time_info,'�ܶ���'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'�ܶ���'))!='') { ?><font color="#FF0000">�ܶ���</font><?php } else { ?>�ܶ���<?php } ?></td>
              <td width="70"><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td width="70"><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td width="70"><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td width="70"><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td width="70"><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
            </tr>
            <tr>
              <td height="30"><input name="service_time[]" id="service_time"  type="checkbox" value="��һ��" <?php if (trim(strpos($rs_teacher_info->service_time_info,'��һ��'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'��һ��'))!='') { ?><font color="#FF0000">��һ��</font><?php } else { ?>��һ��<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="�ܶ���" <?php if (trim(strpos($rs_teacher_info->service_time_info,'�ܶ���'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'�ܶ���'))!='') { ?><font color="#FF0000">�ܶ���</font><?php } else { ?>�ܶ���<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
            </tr>
            <tr>
              <td height="30"><input name="service_time[]" id="service_time"  type="checkbox" value="��һ��" <?php if (trim(strpos($rs_teacher_info->service_time_info,'��һ��'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'��һ��'))!='') { ?><font color="#FF0000">��һ��</font><?php } else { ?>��һ��<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="�ܶ���" <?php if (trim(strpos($rs_teacher_info->service_time_info,'�ܶ���'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'�ܶ���'))!='') { ?><font color="#FF0000">�ܶ���</font><?php } else { ?>�ܶ���<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
              <td><input name="service_time[]" id="service_time"  type="checkbox" value="������" <?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?> checked<?php } ?> disabled><?php if (trim(strpos($rs_teacher_info->service_time_info,'������'))!='') { ?><font color="#FF0000">������</font><?php } else { ?>������<?php } ?></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td height="40" align="left" bgcolor="#EFF7FE" style="border-bottom:1px #9DC3EA solid;border-right:1px #9DC3EA solid;">�������������س�չʾ��</td>
    <td height="50" colspan="4" style="border-bottom:1px #9DC3EA solid;"><table width="590" border="0" cellpadding="0" cellspacing="0" class="news_css">
        <tr>
          <td height="19" rowspan="3" style="width:12px;"></td>
          <td width="570">&nbsp;</td>
          <td rowspan="3" style="width:8px;">&nbsp;</td>
        </tr>
        <tr>
          <td><?=str_replace('<br>',chr(13),$rs_teacher_info->person_info)?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
</table>
      </td>
      <td width="220" align="right" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;">
        <tr>
          <td height="30" background="../images/sort_top.jpg"><table width="210" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="156" align="left" style="font-size:14px;font-weight:bold;">���γ̷���</td>
                <td width="54" style="font-size:12px;">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
        <tr><td style="height:20px;"></td></tr>
        <tr>
          <td align="left" valign="top"><table width="210" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
              <tr>
                <td height="40" valign="top" class="sort_css">��<a href="../teacher_list.php">����</a></td>
                <td>&nbsp;</td>
              </tr>
              <?php 
			  $sort_check="select * from sort_info_manage where sort_id='subject' order by order_id";
			  $rs_sort_check=mysqli_query ($conn, $sort_check);
			  while ($rs_sort_list=mysqli_fetch_object ($rs_sort_check)) {
			  $id=$rs_sort_list->id;
			  ?>
              <tr>
                <td height="30" style="font-size:14px;">��<?=$rs_sort_list->sort_title?></td>
                <td>&nbsp;</td>
              </tr>
              <?php $sort_check_1="select * from sort_info_manage where sort_id='$id' order by order_id";			  
			  $rs_sort_check_1=mysqli_query ($conn, $sort_check_1);
			  if (intval(mysqli_num_rows($rs_sort_check_1)/2)==mysqli_num_rows($rs_sort_check_1)/2) { $rows_number=mysqli_num_rows($rs_sort_check_1)/2; } else { $rows_number=intval(mysqli_num_rows($rs_sort_check_1))/2+1; }			  
			  for ($i=1;$i<=$rows_number;$i++) {
			  ?>
              <tr>
                <?php for ($k=1;$k<=2;$k++) { if ($rs_sort_list_1=mysqli_fetch_object ($rs_sort_check_1)) { ?>
                <td height="20" class="news_css">�� <a href="../teacher_list.php?subject_content=,<?=$rs_sort_list->sort_title?>&#65288;<?=$rs_sort_list_1->sort_title?>&#65289;,&subject_off=1"><?=$rs_sort_list_1->sort_title?></a></td>
                <?php } } ?>
              </tr>
              <?php } ?>
              <tr><td height="20" colspan="2">&nbsp;</td></tr>
              <?php } ?>
          </table></td>
        </tr>
        <tr><td style="height:10px;"></td></tr>
      </table></td>
    </tr>
  </table>    
  <?php require('bottom.php'); ?>
  </div>
</body></html><?php } ?>