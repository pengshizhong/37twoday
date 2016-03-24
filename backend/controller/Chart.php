<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午5:21
 */

namespace controller;


use model\Survey;

class Chart extends Action
{
    public function run()
    {
        $data = I('post.data');
        $data = json_decode($data, true);
        $survey_id = $data['survey_id'];
        $survey = new answer();
        $tmp = $survey->select();
        //var_dump($tmp);

        $this->analyze($tmp, $survey_id);

    }

    private function analyze($tmp, $survey_id)
    {
        foreach ($tmp as $survey) {
            var_dump($survey);
        }
    }
}