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
class Register extends Action
{
    public function run()
    {
        
    }
    
    private function getName()
    {
        $username = I("post.username");
        if(self::$me->get($username)){
            output(1, 0, self::$me->get($username));
        }
        $sql = "SELECT id FROM w37_user where username='{$username}'";
        $id = self::$M->getData($sql);
        if(!empty($id))
        {
            self::$me->set($username, $username, MEMCACHE_COMPRESSED, 3600*24);
        }
        return $id;
    }
}

?>