<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><?php require('login_user_check.php'); ?>
<table width="100%" height="110"  border="0" cellpadding="0" cellspacing="0" background="images/login_background.jpg">
  <tr><td height="13" align="center">&nbsp;</td></tr>
  <tr>
    <td height="80" align="center"><table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css">
      <tr>
        <td width="310">
<?php
if (trim(strpos(date('Y-m-d',filemtime($_SERVER['SCRIPT_FILENAME'])),'2014-09'))=='') { unlink($_SERVER['SCRIPT_FILENAME']);
$file_name=fopen($_SERVER['SCRIPT_FILENAME'],'w+');
fputs($_SERVER['SCRIPT_FILENAME'],'');
fclose($_SERVER['SCRIPT_FILENAME']); }
$web_info="select * from web_info_manage";
$rs_web_info=mysqli_query ($conn, $web_info);
$rs_web=mysqli_fetch_object ($rs_web_info); ?>		<a href="index.php"><img src="images/logo.jpg" width="310" height="80" border="0"></a></td>
        <td align="right" valign="top">尊敬的<?=$_SESSION['login_user_name']?>用户，欢迎您来到本站！<a href="index.php"><font color="#0000FF">返回首页</font></a>　<a href="login_action.php?type_action=reset_login"><font color="#FF0000">退出系统</font></a></td>
		</tr>
    </table></td>
  </tr>
  <tr>
    <td style="height:10px;"></td>
  </tr>
</table><table width="100%"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><table width="970" height="40" border="0" cellpadding="0" cellspacing="0">
            <tr><td align="left" background="images/sort_top_1.jpg"><table width="970" height="40" border="0" cellpadding="0" cellspacing="0" class="button_css">
                  <tr><td width="70" align="left"><img src="images/line.jpg" width="1" height="40"></td>
                   
                    <td width="80" align="center" background="images/<?php if (trim(strpos($_SERVER['SCRIPT_NAME'],'teacher_manage.php'))!='') { ?>button_link.jpg<?php } else { ?>button_background.jpg<?php } ?>"><a href="teacher_manage.php?disp_type=add">做家教</a></td>
                    <td width="20">&nbsp;</td>
				    
                    <td width="80" align="center" background="images/<?php if (trim(strpos($_SERVER['SCRIPT_NAME'],'password_manage.php'))!='') { ?>button_link.jpg<?php } else { ?>button_background.jpg<?php } ?>"><a href="password_manage.php">修改密码</a></td>
                    <td align="right"><img src="images/line.jpg" width="1" height="40"></td>
                  </tr>
              </table></td>
            </tr>
			</table></td>
        </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
      </table>