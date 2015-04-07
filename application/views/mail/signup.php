<?php
    // $mail_title
    // $nick_name
    // $email
    // $add_msg

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> vmaker 啟動信 </title>
</head>
<body marginheight="0" marginwidth="0" topmargin="0" bottommargin="0">

    <p><?=h($nick_name)?> 先生/小姐 您好 ~ </p>
    <p>您的登入帳號：<?=h($email)?></p>
    <p><?=$add_msg?></p>
    <p>感謝您加入 vmaker，請點上面的網址啟動您的帳號。</p>

    <p></p>
    <p> vmaker.tw 敬上 </p>                
</body>
</html>
