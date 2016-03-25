<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午5:21
 */

namespace controller;

use model\Answer;
class Chart extends Action
{
    public function run()
    {
        $data = I('get.data');
        $data = stripcslashes($data);
        $data = json_decode($data,true);
        $survey_id = $data['surveyid'];
        $survey = new Answer();
        $tmp = $survey->select();
        $this->analyze($tmp, $survey_id);
    }

    private function analyze($tmp, $survey_id)
    {
        $count = [];
        $count['total'] = count($tmp);
        foreach ($tmp as $survey) {
            $survey = stripcslashes($survey->answer_value);
            $survey = json_decode($survey, true);
            if ($survey['survey_id'] == $survey_id) {
                $answers = $survey['answers'];
                foreach ($answers as $qid => $answer) {
                    switch ($answer['qtype']) {
                        case 1: if (array_key_exists($qid, $count)) {
                                    if (is_array($count[$qid]) && array_key_exists($answer['option'], $count[$qid])) {
                                        $count[$qid][$answer['option']]++;
                                    }
                                    else {
                                        $count[$qid][$answer['option']] = 1;
                                    }
                                }
                                else {
                                    $count[$qid] = [];
                                    $count[$qid][$answer['option']] = 1;
                                }
                                break;

                        case 2: foreach ($answer['option'] as $option) {
                                    if (array_key_exists($qid, $count)) {
                                        if (is_array($count[$qid]) && array_key_exists($option, $count[$qid])) {
                                            $count[$qid][$option]++;
                                        }
                                        else {
                                            $count[$qid][$option] = 1;
                                        }
                                    }
                                    else {
                                        $count[$qid] = [];
                                        $count[$qid][$option] = 1;
                                    }
                                }
                                break;
                    }
                }
            }
        }
        $data = [];
        $data['total'] = $count['total'];
        unset($count['total']);
        $data['count'] = json_encode($count);
        self::$s->assign("data", $data);
        self::$s->display('chart.html');
    }
}