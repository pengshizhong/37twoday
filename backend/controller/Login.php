<?php
namespace controller;

use model\User;
/**
 * 登陆接口
 * v1.0
 * @author 叶子彬
 * @version 2016年3月24号
 * 
 */

class Login extends CheckIp
{
    public function run()
    {
        $res = $this->checkIp();
        if(!$res)
        {
            output(6, 0, "注册用户名修改频繁");
        }
        $workid = I("get.workid");
        $password = I("get.password");
        $verifyl = I("get.verify");
        $verifyl_check = $_SESSION['verify'];
//         if($verifyl != $verifyl_check || empty($verifyl_check))
//         {
//             output(4, 0, "验证码错误");
//         }
        $user = new User();
        $where = array(
            'WORK_ID' => $workid
        );
        $info = $user->select($where);
        $user_id = $info->user_id;
        $workid = $info->work_id;
        $salt = $info->salt;
        $password_c = $info->password;
        $password_v = md5($password.$salt);
        if($password_c == $password_v)
        {
            output(9, 0, "密码错误");
        }
        $userInfo = array(
            'user_id' => $user_id,
            'workid' => $workid
        );
        $_SESSION['workid'] = $userInfo;
        output(0, $userInfo, "登陆成功");
    }
}

?>