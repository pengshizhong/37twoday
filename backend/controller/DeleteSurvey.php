<?php
/**
 * Created by PhpStorm.
 * User: kikym
 * Date: 2016/3/24
 * Time: 16:28
 */
namespace controller;

use model\Survey;
use model\Util;
use vendor\MyRedis;
use vendor\Output;

class DeleteSurvey extends Action
{
    public function run()
    {
        $data = I('post.data');
        if (empty($data)) {
            exit;
        }
        $data = json_decode($data,true);
        $survey_id = $data['survey_id'];
        $survey = new survey();

        $survey->survey_id = $survey_id;
        unset($data);

//        $survey->value = $data;
        $survey->delete(['survey_id' => $survey->survey_id]);

        output(0,'','问卷删除成功');

    }
}
