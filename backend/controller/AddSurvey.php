<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午12:43
 */

namespace controller;


class AddSurvey extends Action
{
    public function run()
    {
        $data = I('post.data');
        $data = [
            'userid' => 1,
            'survey' => 'surveyname',
        ];

    }
}