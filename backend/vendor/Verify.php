<?php
require "./ValidateCode.php";
$verify = new ValidateCode;
$verify->doimg();
$verify_code = $verify->getCode();
session_start();
$_SESSION['verify'] = $verify_code;