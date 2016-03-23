<?php
namespace controller;

use vendor\Output;

/**
 * Interface Action
 * @package 控制器行为接口
 */
class Action
{
    public static $s; //smarty对象
    public static $M; //数据库对象
    public static $me; //memcache对象

    public function run(Output $output)
    {

    }

    public function getView($data,$tpl = '')
    {
        if ($tpl==='') {
            //var_dump('view/' . substr(static::class,'11') . '.php');
            require 'view/' . substr(static::class, '11') . '.php';
        }
        else {
            require 'view/' . $tpl . '.php';
        }
    }

    public function getParam($name,$default='',$filter=null,$datas=null)
    {
        //过滤代码
        return isset($_GET[$name])?$_GET[$name]:$default;
    }

    public function postParm($name,$default='',$filter=null,$datas=null)
    {
        return isset($_POST[$name])?$_POST[$name]:$default;
    }


    public function __construct(){

        self::$s = new \Smarty;
        self::$s->template_dir = C("smarty.template_dir");
        self::$s->compile_dir = C("smarty.compile_dir");
        self::$s->left_delimiter = C("smarty.left_delimiter");
        self::$s->right_delimiter = C("smarty.right_delimiter");
        self::$me = new \Memcache;
        var_dump(self::$me);
        $host = C("memcache.host");
        $port = C("memcache.port");
        self::$me->connect($host,$port,MEMCACHE_COMPRESSED);
    }
}