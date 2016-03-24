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
        $survey = new Survey();
        $survey->value = stripcslashes($data);
        $survey->save();
        $survey_id = $survey->getLastId();
        $data = [];
        $url = 'index.php?action=getSurvey&surveyid=' . $survey_id;
        $data['url'] = $url;
        output(1,$data,'增加新问卷成功');
    }
}