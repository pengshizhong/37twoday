<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-25
 * Time: 上午8:21
 */

namespace controller;


use model\Survey;

class GetSurveyList extends Action
{
    public function run()
    {
        $data = I('get.data');
        $data = json_decode($data,true);
        $flag = is_login();
        if ($flag === false) {
            exit;
        }
        else {
            $userid = $_SESSION['userid'];
            $survey = new Survey();
            $survey = $survey->select();
            $data=[];
            if (is_array($survey)) {
                foreach ($survey as $object) {
                    $json = $this->getJson($object->value);
                    if ($json->userid==$userid) {
                        $tmp = [];
                        $tmp['surveyid'] = $object->survey_id;
                        $tmp['surveyname'] = $json->surveyname;
                        $data[] = $tmp;
                    }
                }
                output('0',$data,'');
            }
        }
    }
}