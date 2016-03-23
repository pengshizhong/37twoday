<?php
namespace vendor;

/**
 * Class MyRedis
 * @package vendor
 * redis封装层
 */

class MyRedis
{
    private static $redis;
    private static $prefix = 'my_';
    private static $host = '127.0.0.1';
    private static $port = '6379';

    private static function connect()
    {
        $redis = new \redis();
        if ($redis->connect(self::$host, self::$port)) {
            self::$redis = $redis;
        }
        else {
            throw new MyException('redis连接失败');
        }
    }

    private function __construct()
    {
        //防止实例化
    }

    private static function getInstance()
    {
        if (!self::$redis) {
            self::connect();
        }
        //var_dump(self::$redis);
        return self::$redis;
    }

    public static function write($key, $value)
    {
        $key = self::getKey($key);
        if (self::getInstance()->set($key,json_encode($value))) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function get($key,$array = true)
    {
        $key = self::getKey($key);
        return json_decode(self::getInstance()->get($key),$array);
    }

    public static function exists($key)
    {
        $key = self::getKey($key);
        return self::getInstance()->exists($key);
    }

    public static function expire($key, $time)
    {
        $key = self::getKey($key);
        return self::getInstance()->expire($key,$time);
    }

    private static function getKey($key)
    {
        return $key = self::$prefix . $key;
    }
}