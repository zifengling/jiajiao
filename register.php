<?php require("conn.php"); ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>会员注册</title>
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
function refresh_code() { user_form.imgcode.src="verifycode.php?a="+Math.random(); }
function onfocus_check(id) { id.style.border='2px #FF0000 solid'; }
function onblur_check(id) { id.style.border='1px #6CB5FF solid'; }

function user_form_check() {
if (user_form.username.value=='') { alert('请输入用户名!'); user_form.username.focus(); return false; }
check_value='abcdefghijklmnopqrstuvwxyz0123456789_';
username_length=user_form.username.value.length;
for(i=1;i<=username_length;i++) {
if (check_value.indexOf(user_form.username.value.charAt(i))==-1) { alert('用户名只能输入字母、数字、下划线!'); user_form.username.focus(); return false; } }
if (username_length<4 || username_length>20) { alert('用户名的长度在4-20之间!'); user_form.username.focus(); return false; }
if (user_form.userpassword.value=='') { alert('请输入密码!'); user_form.userpassword.focus(); return false; }
if (user_form.userpassword_1.value=='') { alert('请再次输入密码!'); user_form.userpassword_1.focus(); return false; }
if (user_form.userpassword.value!=user_form.userpassword_1.value) { alert('两次输入密码必须相同!'); user_form.userpassword_1.focus(); return false; }
if (user_form.question_value.value=='') { alert('请选择密码问题!'); user_form.question_value.focus(); return false; }
if (user_form.question_value.value=='自定义问题') { if (user_form.question_value_1.value=='') { alert('请输入密码问题!'); user_form.question_value_1.focus(); return false; } }
if (user_form.ask_value.value=='') { alert('请输入密码答案!'); user_form.ask_value.focus(); return false; }
if (user_form.email.value=='') { alert('请输入电子邮箱!'); user_form.email.focus(); return false; }
var filter=/^\s*([A-Za-z0-9_-]+(\.\w+)*@(\w+\.)+\w{2,3})\s*$/;
if (!filter.test(document.user_form.email.value)) { alert('请输入正确的电子邮箱格式!'); user_form.email.focus(); return false; }
if (user_form.yourname.value=='') { alert('请输入姓名!'); user_form.yourname.focus(); return false; }
if (user_form.province_name.value=='') { alert('请选择所在区域!'); user_form.province_name.focus(); return false; }
if (user_form.city_name.value=='') { alert('请选择所在区域!'); user_form.city_name.focus(); return false; }
if (user_form.address.value=='') { alert('请输入地址!'); user_form.address.focus(); return false; }
if (user_form.mobile.value=='') { alert('请输入移动电话!'); user_form.mobile.focus(); return false; }
if (isNaN(user_form.mobile.value)) { alert('移动电话必须为数字!'); user_form.mobile.focus(); return false; }
if (user_form.mobile.value.length<11 || user_form.mobile.value.length>11) { alert('请输入正确的移动电话号码!'); user_form.mobile.focus(); return false; }
if (user_form.code.value=='') { alert('请输入验证码!'); user_form.code.focus(); return false; }
}

var xmlHttp
function sort_list(id)
{
var url='city_select.php?id='+id;
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

function question_select_check(id) { if (id=='自定义问题') { user_form.question_value_1.style.display=''; } else { user_form.question_value_1.style.display='none'; } }
</script>














<body onLoad="javascript:sort_list('');">	
	<div align="center">
  <table width="970" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
    <tr>
      <td height="20" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="310"><a href="index.php"><img src="images/logo.jpg" width="310" height="80" border="0"></a></td>
      <td align="right">&nbsp;</td>
      </tr>
    <tr>
      <td height="10" colspan="2"></td>
    </tr>
  </table>
  <form name="user_form" method="post" action="login_action.php?type_action=add" onSubmit="return user_form_check()" enctype="multipart/form-data">
      <table width="970" border="0" cellpadding="0" cellspacing="0" style="border:1px #BCDFFF solid;">
        <tr>
          <td height="30" colspan="4" align="left" background="images/sort_top.jpg"><table width="960" border="0" cellpadding="0" cellspacing="0">
              <tr><td width="120" align="left" style="font-size:14px;font-weight:bold;">　会员注册</td>
                <td width="850" style="font-size:12px;">请认真填写您的真实有效的信息，否则本站无法通过您的身份认证。（温馨提示：带 <font color="#FF0000">*</font> 号的为必填项）</td>
              </tr>
          </table></td>
        </tr>
        <tr><td height="20" colspan="4"></td></tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 用 户 名：              </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input type="text" name="username" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(username);" onBlur="javascript:onblur_check(username);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;"><font color="#FF0000">（只能输入字母，数字，下划线，长度在4-20之间）</font></td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 密　　码：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="userpassword" type="password" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(userpassword);" onBlur="javascript:onblur_check(userpassword);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 确定密码：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="userpassword_1" type="password" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(userpassword_1);" onBlur="javascript:onblur_check(userpassword_1);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td width="291" height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 密码问题：              </td>
          <td width="220" colspan="2" align="left" style="font-size:12px;line-height:160%;">
            <div style="width:200px;height:22px;border:1px #6CB5FF solid;"><div style="width:197px;height:19px;margin-top:1px;overflow:hidden;">
              <select name="question_value" onChange="javascript:question_select_check(this.value);" style="width:200px;height:22px;margin-top:-1px;margin-left:-1px;">
                <option value="">选择</option>
                <?php $sort_check="select * from sort_info_manage where sort_id='question' order by order_id";
				  $rs_sort_check=mysqli_query ($conn, $sort_check);
				  
				  while ($rs_sort=mysqli_fetch_object ($rs_sort_check)) { ?><option value="<?=$rs_sort->sort_title?>"><?=$rs_sort->sort_title?></option><?php } ?>			
	              <option value="自定义问题">自定义问题</option>
              </select>
            </div></div>
          </td>
          <td width="459" align="left" style="font-size:12px;line-height:160%;"><input name="question_value_1" type="text" id="question_value_1" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;display:none;" onFocus="javascript:onfocus_check(question_value_1);" onBlur="javascript:onblur_check(question_value_1);"></td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 密码答案：                </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="ask_value" type="text" id="ask_value" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(ask_value);" onBlur="javascript:onblur_check(ask_value);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>			
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 电子邮箱：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="email" type="text" id="email" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(email);" onBlur="javascript:onblur_check(email);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>			
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 姓　　名：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="yourname" type="text" id="yourname" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(yourname);" onBlur="javascript:onblur_check(yourname);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 性　　别：</td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="sex" type="radio" value="男" checked>男　<input type="radio" name="sex" value="女">女</td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 所在区域：</td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><select name="province_name" id="province_name" onChange="javascript:sort_list(this.value);">
              <option value="">选择</option>	  
              <?php $sort_check="select * from sort_info_manage where sort_id='province' order by order_id";
				  $rs_sort_check=mysqli_query ($conn, $sort_check);
				  while ($rs_sort=mysqli_fetch_object ($rs_sort_check)) { ?>
              <option value="<?=$rs_sort->id?>"><?=$rs_sort->sort_title?></option><?php } ?>
            </select> <!--<span id="city_sort"></span>--></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td></td>
          <td height="15" colspan="3" style="height:10px;"></td>
        </tr>
        <tr>
          <td height="20" align="left" style="font-size:12px;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 地　　址： </td>
          <td height="20" colspan="3" align="left" style="font-size:12px;line-height:160%;"><input name="address" type="text" id="address" style="width:460px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(address);" onBlur="javascript:onblur_check(address);"></td>
        </tr>
        <tr>
          <td style="font-size:12px;">&nbsp;</td>
          <td height="23" colspan="3" align="left" valign="top" style="font-size:12px;line-height:160%;"><font color="#FF0000">请填写您准确的工作地址或家庭地址，精确到某小区，某号楼，某室。</font></td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　　邮政编码：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="zip_code" type="text" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(zip_code);" onBlur="javascript:onblur_check(zip_code);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　　固定电话：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="tel" type="text" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(tel);" onBlur="javascript:onblur_check(tel);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 移动电话：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="mobile" type="text" id="mobile" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(mobile);" onBlur="javascript:onblur_check(mobile);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　　传　　真：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="fax" type="text" id="fax" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(fax);" onBlur="javascript:onblur_check(fax);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　　　QQ号码：
          </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="qq_number" type="text" id="qq_number" style="width:200px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(qq_number);" onBlur="javascript:onblur_check(qq_number);"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<font color="#FF0000">*</font> 您的身份：                </td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="user_type" type="radio" value="教员" checked>教员</td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　　您的相片：</td>
          <td height="40" colspan="2" align="left" style="font-size:12px;line-height:160%;"><input name="file_info" type="file"></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;"> 　<font color="#FF0000">尺寸：90 * 90</font></td>
        </tr>
        <tr>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">　　　　　　　　　　　　　　　　　<label for="code"><font color="#FF0000">*</font> 验 证 码：</label>              </td>
          <td width="60" height="40" align="left" style="font-size:12px;line-height:160%;"><input type="text" name="code" id="textfield" style="width:40px;height:20px;line-height:20px;border:1px #6CB5FF solid;" onFocus="javascript:onfocus_check(code);" onBlur="javascript:onblur_check(code);"/></td>
          <td width="160" align="left" style="font-size:12px;line-height:160%;"><a href="javascript:refresh_code();"><img id="imgcode" src="VerifyCode.php" alt="验证码" border="0" /></a></td>
          <td height="40" align="left" style="font-size:12px;line-height:160%;">&nbsp;</td>
        </tr>
        <tr>
          <td height="80" colspan="4" align="center" style="font-size:12px;line-height:160%;"><input name="imageField" type="image" src="images/register_button.jpg" width="60" height="30" border="0"></td>
        </tr>			
      </table>
  </form>
  <table width="970" height="150" border="0" cellpadding="0" cellspacing="0" class="news_css">
    <tr>
      <td height="20">&nbsp;</td>
    </tr>
    <tr>
      <td height="130" align="left" valign="top" style="border-top:1px #7FBEFF solid;"><?php $bottom_check="select * from web_info_manage";
	$rs_bottom_check=mysqli_query ($conn, $bottom_check);
	if ($rs_bottom=mysqli_fetch_object ($rs_bottom_check)) { ?>
          <?=$rs_bottom->bottom_info?>
          <?php } ?>
      </td>
    </tr>
      </table>
</div>
</body>
</html>