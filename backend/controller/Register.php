<?php
namespace controller;

use model\User;
use vendor\MyRedis;
use vendor\Output;
class Register extends Action
{
    public function run()
    {
        self::$s->display("index.html");
    }
}

?>