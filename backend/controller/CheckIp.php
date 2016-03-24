<?php
/**
 * IP防刷逻辑
 * v1.0
 * @author 叶子彬
 * @version 2016年3月24号
 * 
 */
namespace controller;
use model\Db;
class CheckIp extends Action
{
    public function checkIp($num=3, $expire=60)
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