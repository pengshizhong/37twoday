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
        $survey_id = I('get.surveyid');
        if($survey_id == false) {
            exit;
        }
        $survey = new Survey();
        $survey = $survey->select(['survey_id' => $survey_id]);
        $tmp = stripslashes($survey->value);
        $tmp = json_decode($tmp,true);
        if(isset($tmp['isrelease']) && $tmp['isrelease'] == true) {
            $tmp['survey_id'] = $survey_id;
            output(0, $tmp, '');
        }
        else {
            output(1, '', '该问卷未发布');
        }
    }
}