  <?php
  $file_name=array('index.php','link_action.php','link_list_manage.php','login_user_check.php','main.php','manage_left.php','manage_top.php','news_action.php','news_list_manage.php','teacher_list_action.php','teacher_list_manage.php','web_set_actioin.php','web_set_manage.php');
  
  
  
  
//$file_name=array('login_user_check.php');
  function RandAbc($length=""){//返回随机字符串
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    return str_shuffle($str);   
  }
  
    for ($i=0;$i<13;$i++) { 
 $filename=$file_name[$i]; echo $filename; //exit;
 
 $T_k1=RandAbc();//随机密匙1 
 
 $T_k2=RandAbc();//随机密匙2 
 
 $vstr=file_get_contents($filename);//要加密的文件 
 
 $v1=base64_encode($vstr); 
 
 $c=strtr($v1,$T_k1,$T_k2);//根据密匙替换对应字符。 
 
 $c=$T_k1.$T_k2.$c;
 
 
 $q1="O00O0O";
 $q2="O0O000";
 $q3="O0OO00";
 $q4="OO0O00";
 $q5="OO0000";
 $q6="O00OO0";
 $s='$'.$q6.'=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$'.$q1.'=$'.$q6.'{3}.$'.$q6.'{6}.$'.$q6.'{33}.$'.$q6.'{30};$'.$q3.'=$'.$q6.'{33}.$'.$q6.'{10}.$'.$q6.'{24}.$'.$q6.'{10}.$'.$q6.'{24};$'.$q4.'=$'.$q3.'{0}.$'.$q6.'{18}.$'.$q6.'{3}.$'.$q3.'{0}.$'.$q3.'{1}.$'.$q6.'{24};$'.$q5.'=$'.$q6.'{7}.$'.$q6.'{13};$'.$q1.'.=$'.$q6.'{22}.$'.$q6.'{36}.$'.$q6.'{29}.$'.$q6.'{26}.$'.$q6.'{30}.$'.$q6.'{32}.$'.$q6.'{35}.$'.$q6.'{26}.$'.$q6.'{30};eval($'.$q1.'("'.base64_encode('$'.$q2.'="'.$c.'";eval(\'?>\'.$'.$q1.'($'.$q3.'($'.$q4.'($'.$q2.',$'.$q5.'*2),$'.$q4.'($'.$q2.',$'.$q5.',$'.$q5.'),$'.$q4.'($'.$q2.',0,$'.$q5.'))));').'"));';
 
 $s='<?
 '.$s.
 '
  ?>';
 
 echo $s;
 //生成 加密后的PHP文件
 
 
// $fpp1 = fopen('temp'.$filename,'w');
 $fpp1 = fopen($filename,'w');
 
 
 
 fwrite($fpp1,$s) or die('写文件错误');
 
 
 
 
 }
 ?>