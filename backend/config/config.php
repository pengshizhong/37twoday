<?php
return array(
    'smarty' => array(
        'template_dir' => 'templates/',
        'compile_dir'  => 'templates_c/',
        'left_delimiter' => '<{',
        'right_delimiter' => '}>'
    ),
    
    'mysql' => array(
        "servername" => "localhost:3306",//服务器地址和端口号
		"username"   => "root",//用户名
		"password"   => "root",//密码
		"database"   => "w37_register", //数据库
    ),
    
    'memcache' => array(
        'host' => '127.0.0.1',
        'port' => 11211,
    ),
    
    'pathinfo' => 2,//1是get的形式拿到控制器和方法，2是通过url来取的
);