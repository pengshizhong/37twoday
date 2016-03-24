<?php
/**
 * Created by PhpStorm.
 * User: psz
 * Date: 16-3-24
 * Time: 下午1:05
 */

namespace controller;


class UpdateServey extends Action
{
    public function run()
    {
        $data = I('post.data');
        $servey_id = json_decode($data,true);
        $servey = new servey();
        $servey->id = $servey_id;
        unset($data['servey_id']);
        $servey->value = $data;
        $servey->update(['servey_id' => $servey->id]);
    }
}