<?php
namespace controller;
/**
 * 检测用户是否有注册过
 * v1.0
 * @author 叶子彬
 * @version 2016年3月24号
 * 
 */
use model\User;
use vendor\MyRedis;
use vendor\Output;
use model\Db;
class CheckName extends Action
{
    public function run()
    {
        $res = $this->checkIp(40);
        if(!$res)
        {
            output(6, 0, '注册用户名修改频繁');
        }
        $user = new User();
        $workid = I("post.workid");
        if(empty($workid))
        {
            output(7, 0, "工号不能为空");
        }
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
            output(1, 0, "重复注册");
        }else output(0, 0, "没有重复注册");
    }
    
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