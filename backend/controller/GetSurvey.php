<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午2:09
 */

namespace controller;

use model\Survey;
use vendor\Output;

/**
 * Class GetSurvey
 * @package controller
 * 获取问卷接口
 */
class GetSurvey
{
    public function run()
    {
        $survey_id = I('get.survey_id');
        if($survey_id == false) {
            exit;
        }
        $survey = new Survey();
        $survey = $survey->select(['survey_id' => $survey_id]);
        //echo $survey->value;
        //$data = myJsonDecode($survey->value,false);
        var_dump($survey->value);
        var_dump(stripslashes($survey->value));
        $data = json_decode($survey->value,true);
        var_dump($data);
//        $data['survey_id'] = $survey_id;
//        var_dump($data);


        //var_dump($survey);
    }
}