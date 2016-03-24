<?php
namespace controller;
/**
 * 登陆接口
 * v1.0
 * @author 叶子彬
 * @version2016年3月24号
 *
 */
use model\User;
use vendor\MyRedis;
use vendor\Output;
use model\ValidateCode;
require '../ValidateCode.php';
class Verifydisplay extends Action
{
    public function run()
    {
        $verify = new ValidateCode;
        //file_put_contents("a.log", $verify_code.' 1',FILE_APPEND);
        $verify->doimg();
        $verify_code = $verify->getCode();
        $_SESSION['verify'] = $verify_code;
               
    }
}

?>