<?php
/**
 * Created by PhpStorm.
 * User: kikym
 * Date: 2016/3/24
 * Time: 22:22
 */
namespace controller;

use model\Survey;
use model\Util;
use vendor\MyRedis;

/*发布*/
class ReleaseSurvey extends Action
{
    public function run()
    {
        $data = I('post.data');
        if (empty($data)) {
            exit;
        }

        $data = stripslashes($data);
        $data = json_decode($data,true);

        $survey_id = $data['surveyid'];
        $survey = new survey();
        $survey->survey_id = $survey_id;
        unset($data['surveyid']);

        $data = [];
        $url = 'index.php?action=getSurvey&surveyid=' . $survey->survey_id;
        $data['url'] = $url;

        $info = $survey->select(['survey_id' => $survey->survey_id]);

        if($info){
            $value = json_decode($info->value,true);
            $value['isrelease'] = 1;
            $survey->value = json_encode($value);
            $survey->update(['survey_id' => $survey->survey_id]);
            output(0,$data,'问卷发布成功');
        }
    }
}