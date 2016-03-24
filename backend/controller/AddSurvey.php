<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午12:43
 */

namespace controller;


use vendor\Output;

class AddSurvey extends Action
{
    public function run()
    {
        $data = I('post.data');
        $servey = new servey();
        $servey->value = $data;
        $servey->insert();

        $output = new Output();
        $output->code = 1;
        $output->msg = '增加新问卷成功';
        $output->transport();
    }
}