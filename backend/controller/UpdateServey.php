<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午1:05
 */

namespace controller;


class Updatesurvey extends Action
{
    public function run()
    {
        $data = I('post.data');
        $data = json_decode($data,true);
        $survey_id = $data['survey_id'];
        $survey = new survey();
        $survey->survey_id = $survey_id;
        unset($data['survey_id']);
        $survey->value = $data;
        $survey->update(['survey_id' => $survey->id]);
        $output = new Output();
        $output->code = 0;
        $output->msg = '修改新问卷成功';
        $output->transport();
    }
}