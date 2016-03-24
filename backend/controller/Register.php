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
use model\Db;
class Register extends Action
{
    public function run()
    {
        //$res = Db::query("SELECT * from user where USER_ID = :user_id", array(":user_id"=>1));
        $user = new User();
        $res = $user->select(['USER_ID' => 1]);
        p($res);
    }
    
    private function getName()
    {
        $user = new User();
        $workid = I("post.workid");
        if(self::$me->get($username)){
            output(1, 0, self::$me->get($workid));
        }
        //$sql = "SELECT id FROM w37_user where username='{$workid}'";
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