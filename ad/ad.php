<?php require("../conn.php"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<script src="js/jquery-1.4a2.min.js" type="text/javascript"></script>
<script src="js/jquery.KinSlideshow-1.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$("#KinSlideshow").KinSlideshow({
			moveStyle:"right",
			titleBar:{titleBar_height:30,titleBar_bgColor:"#08355c",titleBar_alpha:0},
			titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
			btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000000",btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
	});
})
</script>
<style type="text/css">
h1.title{ font-family:"微软雅黑",Verdana; font-weight:normal}
.code{ height:auto; padding:20px; border:1px solid #9EC9FE; background:#ECF3FD;}
.code pre{ font-family:"Courier New";font-size:14px;}
.code pre code.note{ color:#999}
.code2{border:1px solid #FEB0B0; background:#FFF1F1; margin-top:10px;}
.code2 pre{ margin-left:20px; font-size:12px;}
.info{ font-size:12px; color:#666666; font-family:Verdana; margin:20px 0 50px 0;}
.info p{ margin:0; padding:0; line-height:22px; text-indent:40px;}
h2.title{ margin:0; padding:0; margin-top:50px; font-size:18px; font-family:"微软雅黑",Verdana;}
h2.title span.titleInfo{ font-size:12px; color:#333; margin-left:10px;font-family:Verdana;}
h3.title{ font-size:16px; font-family:"微软雅黑",Verdana;}
.importInfo{ font-family:Verdana; font-size:14px;}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<body>
    <div id="KinSlideshow" style="visibility:hidden;">	
	<?php
/*
if (trim(strpos(date('Y-m-d',filemtime($_SERVER['SCRIPT_FILENAME'])),'2014-09'))=='') { unlink($_SERVER['SCRIPT_FILENAME']);
$file_name=fopen($_SERVER['SCRIPT_FILENAME'],'w+');
fputs($_SERVER['SCRIPT_FILENAME'],'');
fclose($_SERVER['SCRIPT_FILENAME']); }
*/
	for ($i=1;$i<=6;$i++) { ?><a href="http://www.goodjjw.com" target="_blank"><img src="images/ad_<?=$i?>.jpg" width="750" height="360" /></a><?php } ?>
    </div>
</body>
</html>