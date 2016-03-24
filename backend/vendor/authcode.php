<?php
    session_start();
    require '../functions.php';
    $checkCode='';
    $chars='abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPRSTUVWXYZ23456789';
    for ($i=0;$i<4;$i++) {
        $checkCode.=substr($chars,mt_rand(0,strlen($chars)-1),1);
    }
    $_SESSION['code']=strtoupper($checkCode);
    ImageCode($checkCode,60);
