<?php require("../conn.php"); 
$web_title_check="select web_title,web_title_1,web_keywords,web_description from web_info_manage";
$rs_web_title_check=mysqli_query ($conn, $web_title_check);?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php if ($rs_web_title=mysqli_fetch_object ($rs_web_title_check)) { ?>
<title><?=$rs_web_title->web_title_1?>后台管理</title>
<?php } else { ?>
<title>家教网后台管理</title><?php } ?>
</head>
<frameset rows="60,*" cols="*" frameborder="0" border="0">
  
  
  <frame src="manage_top.php" scrolling="no" frameborder="0">
    <frameset rows="*" cols="236,*">
      <frame src="manage_left.php" frameborder="0" name="left_link">
      <frame src="" scrolling="yes" frameborder="0" name="info">
    </frameset>

</frameset>
<noframes><body>
</body></noframes>
</html>
