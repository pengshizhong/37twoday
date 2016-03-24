<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午12:43
 */

namespace controller;


use model\Survey;
use vendor\Output;

class AddSurvey extends Action
{
    public function run()
    {
        $data = I('get.data');
        if (empty($data)) {
           exit;
        }
        $servey = new Survey();
        $servey->value = $data;
        $servey->save();

        $output = new Output();
        $output->code = 1;
        $output->msg = '增加新问卷成功';
        $output->transport();
    }
}