<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午9:20
 */

namespace controller;


use model\Survey;

class Release extends Action
{
    public function run()
    {
        $data = I('post.data');
        $data = $this->getJson($data);

        //已经验证
        $survey_id = $data['surveyid'];
        $survey_id = 22;
        $survey = new Survey();
        $survey = $survey->select(['survey_id' => $survey_id]);
        var_dump($survey);
        $tmp = $this->getJson($survey->value);

    }
}