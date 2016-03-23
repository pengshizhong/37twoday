<?php
   // error_reporting(0);
    date_default_timezone_set('PRC');
    $tpl_dir = __DIR__ . '/view/';
    ini_set("session.cookie_httponly", 1);
    function echobr($str)
    {
        echo $str . "<br>";
    }
    function autoload($className)
    {
        $fileName = str_replace('\\','/',$className) . '.php';
        if (file_exists($fileName)) {
            include $fileName;
        }
        else {
            //匹配smarty
            if (substr($className,0,6) == 'Smarty') {
                $fileName = 'vendor/smarty/sysplugins/' . strtolower($className) . '.php';
                require $fileName;
            }
            else {
                throw new \vendor\MyException("找不到类文件" . $className);
            }
        }
    }
    //自动载入类
    spl_autoload_register('autoload');
    //获取工具函数
    require 'functions.php';
    require 'vendor/smarty/Smarty.class.php';
    $config = require 'config/config.php';
    $GLOBALS['config'] = $config;