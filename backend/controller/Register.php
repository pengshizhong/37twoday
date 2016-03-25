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
        $res = $this->checkIp();
         if(!$res)
         {
             output(6, 0, "注册用户名修改频繁");
         }
        $workid = I("post.workid");
        $password = I("post.password");
        $comfirm_password = I("post.repassword");
        $user = new User();
        $res = $user->select(['WORK_ID' => $workid]);
        //账号验证
        $id = $this->getName();
        if($id){
            output(1, 0, '用户名已被使用');
        }
        
        //密码验证
        $password_len = strlen($password);
        if ( !preg_match('/^[a-zA-Z0-9\_]{6,20}$/', $password) ) {
            output(8, 0, '密码格式不正确!');
        }
        if($password != $comfirm_password)
        {
            output(9, 0, "密码不匹配");
        }
        
        //工号验证
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


        //验证码验证
        
         $verify = I('get.verify');
         $verify_user = strtolower($verify);
         $verify_session = strtolower($_SESSION['verify']);
//          if(($verify_user != $verify_session) || empty($verify_session))
//          {
//              unset($_SESSION['verify']);
//              output(5, '' , '验证码错误');
//          }
        unset($_SESSION['verify']);

        $salt = salt();
        $password = md5($password.$salt);
        $time = time();
        $register_time = date("Y-m-d H:i:m");
        $last_modfied_time = date("Y-m-d H:i:m");
        $user->work_id = $workid;
        $user->password = $password;
        $user->salt = $salt;
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
        
        if(@self::$me->get($workid)){
            
            output(1, 0, "重复注册");
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
    
    /**
     * 防刷逻辑
     * @param number $num
     * @param number $expire
     */
    private function checkIp($num=3, $expire=60)
    {
        $ip = get_real_ip();
        $cache = self::$me->get($ip);
        if(empty($cache))
        {
            $arr = array(
                'ip' => $ip,
                'num' => 1,
                'time' => time()
            );
            self::$me->set($ip, $arr, MEMCACHE_COMPRESSED, $expire);
            return true;
        }else {
            $cache_time = intval($cache['time']);
            $now = time();
            $range = $now - $cache_time;
            if($range < $expire)
            {
                if($cache['num'] > $num)
                {
                    return false;
                }else{
                    $cache['num'] += 1;
                    self::$me->set($ip, $cache);
                    return true;
                }
            }else{
                $cache['time'] = time();
                $cache['num'] = 1;
                self::$me->set($ip, $cache);
                return true;
            }
        }
    }
}

?>