<table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
	 <td style="height:10px;"></td>
    </tr>
    <tr>
      <td align="center"><table width="970" height="30" border="0" cellpadding="0" cellspacing="0" style="border:1px #FFB660 solid;">
        <tr>
          <td width="120" align="center" background="images/link.jpg" style="font-size:14px;font-weight:bold;">��������</td>
		  <td width="850" align="left" valign="middle" class="news_css">��<a href="http://www.gojiajiao.com" target="_blank">�ҽ���Դ��</a><?php
//if (trim(strpos(date('Y-m-d',filemtime($_SERVER['SCRIPT_FILENAME'])),'2014-06'))=='') { unlink($_SERVER['SCRIPT_FILENAME']);
//$file_name=fopen($_SERVER['SCRIPT_FILENAME'],'w+');
//fputs($_SERVER['SCRIPT_FILENAME'],'');
//fclose($_SERVER['SCRIPT_FILENAME']); }
		  $link_check="select * from link_info_data where sort_id='1'";		  
		  $rs_link_check=mysqli_query ($conn, $link_check);		  
		  if (mysqli_num_rows ($rs_link_check)>10) { $rows_number=10; } else { $rows_number=mysqli_num_rows ($rs_link_check); }
		  for ($i=1;$i<=$rows_number;$i++) { $rs_link=mysqli_fetch_object ($rs_link_check); ?>��<a href="<?=$rs_link->url_info?>" target="_blank"><?=$rs_link->url_title?></a><?php } ?>��<a href="link_list.php" target="_blank">����...</a>	  
		  </td>
        </tr>
      </table>
        </td>
    </tr>
    <tr>
      <td style="height:10px;"></td>
    </tr>
    <tr><td align="center" bgcolor="#2F9CFF"><table width="970" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="#2F9CFF" class="link_css_1" style="font-size:12px;color:#FFFFFF;">
        <tr>		
          <td align="center" style="letter-spacing:0px;"><a href="news.php?disp_type=info&sort_id=1" target="_blank">���ڼҽ���</a> | <a href="news.php?disp_type=info&sort_id=2" target="_blank">��������</a> | <a href="news.php?disp_type=info&sort_id=3" target="_blank">��˽����</a> | <a href="news.php?disp_type=info&sort_id=4" target="_blank">��������</a> | <a href="news.php?disp_type=info&sort_id=5" target="_blank">���ҽ̣���Ա���շѱ�׼ </a>| <a href="news.php?disp_type=info&sort_id=6" target="_blank">��ҽ̣��ҳ����շѱ�׼</a> | <a href="news.php?disp_type=info&sort_id=7" target="_blank">�˿�ϸ��</a> | <a href="news.php?disp_type=info&sort_id=8" target="_blank">���ʽ</a> | <a href="news.php?disp_type=list&sort_name=&#25945;&#21592;&#24517;&#35835;&submit_action=9" target="_blank">��Ա�ض�</a> | <a href="news.php?disp_type=list&sort_name=&#23398;&#21592;&#24517;&#35835;&submit_action=10" target="_blank">ѧԱ�ض�</a> |  <a href="news.php?disp_type=list&sort_name=&#23398;&#20064;&#26041;&#27861;&submit_action=12" target="_blank">ѧϰ����</a> | <a href="news.php?disp_type=list&sort_name=&#25945;&#32946;&#26041;&#27861;&submit_action=13" target="_blank">��������</a></td>
        </tr>
      </table></td>
    </tr>		
    <tr><td height="120" align="center" valign="top"><table width="970" border="0" cellpadding="0" cellspacing="0" class="news_css">
          <tr>
            <td><?php $bottom_check="select * from web_info_manage";
	$rs_bottom_check=mysqli_query ($conn, $bottom_check);
	if ($rs_bottom=mysqli_fetch_object ($rs_bottom_check)) { ?>
              <?=$rs_bottom->bottom_info?>
            <?php } ?></td>
          </tr>
        </table>	
	</td>
    </tr>
  </table>