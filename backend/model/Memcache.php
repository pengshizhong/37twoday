<?php
namespace model;

/**
 * 缓存单例模式
 * v1.0
 * @author 叶子彬
 * 
 * @version 2016年3月23日
 */
class Memcache
{
    private static $host;
    private static $port;
    private static $instance;
    private function __construct(){}
    
    /**
     * 缓存连接
     */
    public function connect()
    {
        self::$host = C("memcache.host");
        self::$port = C("memcache.port");
       try {
           self::$instance = new \Memcache;
           self::$instance->connect(self::$host, self::$port, MEMCACHE_COMPRESSED);
       } catch (Exception $e) {
           die('Connect Failed Message: ' . $e->getMessage());
       }
    }
    
    /**
     * 单例模式入口
     */
    public static function getInstance()
    {
        if(!(self::$_instance instanceof self))
        {
            self::$_instance = new self;
        }
            return self::$_instance;
    }
    
    /**
     * 
     * @param string $key
     * @param string $value
     */
    public static function set($key, $value)
    {
        self::$instance->set($key, $value);
    }
    
    /**
     * 缓存加入
     * @param string $key
     * @param string $value
     */
    public static function add($key, $value)
    {
        self::$instance->add($key, $value);
    }
    
    public static function get($key)
    {
        return self::$instance->get($key);
    }
    
}

?>