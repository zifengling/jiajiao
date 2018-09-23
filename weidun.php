<?php
    // 加密的文件格式必须固定！！
    // 要解密的文件，去掉php标识
    $encode_sourcecode = file_get_contents("./city_select.php");
    $encode_sourcecode = str_replace('<?php','', $encode_sourcecode);
    $encode_sourcecode = str_replace('?>','', $encode_sourcecode);
    // 提取第一次需要解密的内容
    // 即JE8wTzAwMD0iTmV5SElCamZRdk......1UYVNuUUpnY21UYVVoOCtoTm89IjtldmFsKCc/==
    echo '</br></br>------------------------------$encode_sourcecode_content</br>';
    $start = strripos($encode_sourcecode, '("') + 2;
    $end = strripos($encode_sourcecode, '")');
    $encode_sourcecode_content = substr($encode_sourcecode, $start, $end - $start);
    echo $encode_sourcecode_content;
    // 解密加密部分的代码后的内容
    // $O0O000="NeyHIBjfQvDMwo......JoSptgMdl3M3JgSKQTiB0nuh8+hNo="; eval('......OO0000))));
    echo '</br></br>------------------------------$decode_sourcecode_content</br>';
    $decode_sourcecode_content = base64_decode($encode_sourcecode_content);
    echo $decode_sourcecode_content;
    // 解密后还是一个加密的代码，需要再次解码，所以要再次提取需要被解密的内容出来
    // 即NeyHIBjfQvDMwo......JoSptgMdl3M3JgSKQTiB0nuh8+hNo=
    echo '</br></br>------------------------------$decode_sourcecode_content_encode_content</br>';
    $start = stripos($decode_sourcecode_content, '"') + 1;
    $end = strripos($decode_sourcecode_content, '"') ;
    $decode_sourcecode_content_encode_content = substr($decode_sourcecode_content, $start, $end - $start);
    echo $decode_sourcecode_content_encode_content;
    // 根据加密规则，替换字符并解码，即可得到原文件
    echo '</br></br>------------------------------$decode_sourcecode_content_encode_content</br>';
    $origin_content = base64_decode(strtr(
        substr($decode_sourcecode_content_encode_content, 104),
        substr($decode_sourcecode_content_encode_content, 52, 52),
        substr($decode_sourcecode_content_encode_content, 0, 52)));
    var_dump($origin_content);
    file_put_contents('./city_select.php', $origin_content);
 ?>