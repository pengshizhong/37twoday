<?php
/**
 * Created by PhpStorm.
 * User: kikym
 * Date: 2016/3/24
 * Time: 14:19
 */
namespace controller;

use model\Answer;
use model\Util;
use vendor\MyRedis;
use vendor\Output;

class VisitorCommit extends Action
{
    public function run(Output $output)
    {
        $data = I('post.data');
        if (empty($data)) {
            exit;
        }

        $answer = new answer();
        $answer->value = $data;
        $answer->save();

        output(0,'','游客提交成功');

    }
}
