<?php
namespace controller;
/**
 * 注册接口
 * v1.0
 * @author 叶子彬
 * @version 2016年3月24号
 * 
 */
use model\User;
use vendor\MyRedis;
use vendor\Output;
use model\Db;
class Register extends Action
{
    public function run()
    {
        $workid = I("post.workid");
        $password = I("post.password");
        $comfirm_password = I("post.comfirm_password");
        $user = new User();
        $res = $user->select(['workid' => $workid]);
        $output = new Output();
        
        $output->transport();
        //账号验证
        $id = $this->getName();
        if($id){
            $output->code = 1;
            $output->msg = '用户名已被使用';
            $output->transport();
        }
        
        //工号验证
        $res_num = preg_match('/\d/', $workid);
        $num_len = strlen($workid);
        if(!$res_num)
        {
            $output->code = 2;
            $output->msg = '工号必须为正整数';
            $output->transport();
        }
        if($num_len <3 || $num_len > 9)
        {
            $output->code = 3;
            $output->msg = '工号长度必须在3-9位之间';
            $output->transport();
        }
        
        //验证码验证
        $verify = I('post.verify');
        $verify_user = strtolower($verify);
        $verify_session = strtolower($_SESSION['verify']);
        if(($verify_user != $verify_session) || empty($verify_session))
        {
            unset($_SESSION['verify']);
            $output->code = 4;
            $output->msg = '需要验证码';
            $output->transport();
        }
        unset($_SESSION['verify']);
        $salt = salt();
        $password = md5($password.$salt);
        $time = time();
        $register_time = date("Y-m-d H:i:m");
        $last_modfied_time = date("Y-m-d H:i:m");
        $user->work_id = $workid;
        $user->password = $password;
        $res = $user->save();
        if($res)
        {
            $info = array(
                'username' => $workid,
                'time'     => $time
            );
            $_SESSION['workid'] = $info;
            self::$me->add($workid, $workid);
            output(0, $info, "成功注册");
        }else {
            output(4, 0, "服务器忙，请稍后再试");
        }
        
    }
    
    private function getName()
    {
        $user = new User();
        $workid = I("post.workid");
        if(self::$me->get($workid)){
            output(1, 0, self::$me->get($workid));
        }
        $where = array(
            'WORK_ID' => $workid
        );
        $id = $user->select($where);
        if(!empty($id))
        {
            self::$me->set($workid, $workid, MEMCACHE_COMPRESSED, 3600*24);
        }
        return $id;
    }
}

?>