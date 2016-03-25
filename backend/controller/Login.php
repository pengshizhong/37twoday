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
        $workid = I("post.workid");
        $password = I("post.password");
        $verifyl = I("post.verify");
        $verifyl_check = $_SESSION['verify'];
//         if($verifyl != $verifyl_check || empty($verifyl_check))
//         {
//             output(5, 0, "验证码错误");
//         }

        $res_num = preg_match('/\d/', $workid);
        $num_len = strlen($workid);
        if(!$res_num)
        {
            output(2, 0, '工号必须为正整数');
        }
        if($num_len <6 || $num_len > 20)
        {
            output(3, 0, '工号长度必须在6-20位之间');
        }
        $user = new User();
        $where = array(
            'WORK_ID' => $workid
        );
        $info = $user->select($where);
        if (!$info) {
            output('11','','没有这个用户');
        }
        $user_id = $info->user_id;
        $workid = $info->work_id;
        $salt = $info->salt;
        $password_c = $info->password;
//        var_dump($password_c);
        $password_v = md5($password . $salt);
//        var_dump($password_v);
        if($password_c != $password_v)
        {
            output(10, 0, "密码错误");
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