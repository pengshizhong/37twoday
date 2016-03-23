<?php
namespace controller;

use model\User;
use model\Verify;
use vendor\MyRedis;
use vendor\Output;

class Test extends Action
{
    public function run(Output $output)
    {
        echo "ok" ;
        $verify = new Verify();
        self::$s->display('index.html');
    }
}