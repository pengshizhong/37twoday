<?php
namespace controller;

use model\User;
use model\Verify;
use vendor\MyRedis;
use vendor\Output;

class Test extends Action
{
    public function run()
    {
 var_dump($_SESSION);
//        file_put_contents('text.txt','my_tesd    ',FILE_APPEND);
//        $user = new User();
////        insert demo
//        $user->birth='20123121231';
//        $user->username=md5(date("Y-m-d H-i:s"));
//        //$user->username='851dc01a61edf27becdbfce1448b13b7';
//        $user->password='123456';
//        $user->number=md5(date("Y-m-d H-i:s"));
//        $user->mail='523724329@qq.com';
//        $flag = $user->save();
//        $a = I("post.a");

//select demo
//        $user = $user->select(['id' => '91']);
//        $user = $user->select(['birth' => '1980-1-1']);
//        var_dump($user);

//        update demo
//        $user->birth = '789';
//        $user->update();
//        $user = $user->select(['id' => '91']);
//        var_dump('修改后');
//        var_dump($user);

//        delete demo
//        $deleteflag = $user->delete(['id' => '131']);
//        var_dump($deleteflag);
//        $user = $user->select(['id' => '91']);
//        var_dump($user);

    }
}