<?php
 /*
  ͼƬ��֤�� Powered By KASON test <a href="http://www.hzhuti.com/nokia/c6/">http://www.hzhuti.com/nokia/c6/</a>   */
  session_start();
  $num=4;//��֤�����
  $width=80;//��֤����
  $height=20;//��֤��߶�
  $code=' ';
  for($i=0;$i<$num;$i++)//������֤��
  {
   switch(rand(0,2))
   {
    case 0:$code[$i]=chr(rand(48,57));break;//����
    case 1:$code[$i]=chr(rand(65,90));break;//��д��ĸ
    case 2:$code[$i]=chr(rand(97,122));break;//Сд��ĸ
   }
  }
  $_SESSION["VerifyCode"]=$code;
  $image=imagecreate($width,$height);
  imagecolorallocate($image,255,255,255);
  for($i=0;$i<80;$i++)//���ɸ�������
  {
   $dis_color=imagecolorallocate($image,rand(0,2555),rand(0,255),rand(0,255));
   imagesetpixel($image,rand(1,$width),rand(1,$height),$dis_color);
  }
  for($i=0;$i<$num;$i++)//��ӡ�ַ���ͼ��
  {
   $char_color=imagecolorallocate($image,rand(0,2555),rand(0,255),rand(0,255));
   imagechar($image,60,($width/$num)*$i,rand(0,5),$code[$i],$char_color);
  }
  header("Content-type:image/png");
  imagepng($image);//���ͼ�������
  imagedestroy($image);//�ͷ���Դ
?>   