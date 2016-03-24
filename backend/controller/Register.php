<?php
namespace controller;

use model\User;
use vendor\MyRedis;
use vendor\Output;

/**
 * Class Register
 * @package action
 * 注册接口
 */
class Register extends  Action
{
    private $authcode_url = 'http://peixun.psz.com/index.php?action=authcode';
    public function run()
    {
        if (isset($_POST['authcode'])) {
            if ($_SESSION['code'] !== strtoupper($_POST['authcode'])){
                $output->code = 4;
                $output->msg = '验证码输入错误';
                $output->data = $this->authcode_url;
                $output->transport();
                exit;
            }
            else {
                unset($_SESSION['code']);
            }
        }
        else {
            if ($this->preventRefresh() === false) {
                $output->code = 3;
                $output->msg = '抱歉，你注册的次数过多，请输入验证码';
                $output->data = $this->authcode_url;
                $output->transport();
                exit;
            }
        }
        $user = new User();
        $user->batchAssign($_POST);
        if (!$user->validate()) {
            exit();
        }
        $tmp = $user->save();
        if ( $tmp === false) {
            //注册成功
            $output->code = 2;
            $output->msg  = '使用了相同的工号或者是用户名';
            $output->data = '';
            $output->transport();
        }
        else {
            $output->code = 1;
            $output->msg  = '注册成功';
            $output->data = '';
            $output->transport();
        }
    }

    /**
     * @return bool
     * 防刷主逻辑
     */
    private function preventRefresh()
    {
        $realIp = getRealIpAddr();
        if (MyRedis::exists($realIp)) {
            return $this->judge($realIp);
        }
        else {
            $this->setInitTime($realIp);
        }
        return true;
    }

    /**
     * @param $key 当前用户注册使用的源IP地址
     * 初始化某IP对应的注册时刻表
     */
    private function setInitTime($key)
    {
        $data   = [];
        $data[1] = date('y-m-d h:i:s');
        $data[2] = false;
        $data['current'] = 1;
        MyRedis::write($key,$data);
    }

    /**
     * @param $key 当前用户注册使用的源IP地址
     * @return bool 是否判断为恶意注册
     * 1.本次如果是第二次注册，则刷新注册时刻表
     * 2.判断用户这次注册的时间距离上上次注册的时间是不是不到60秒，返回判定结果
     */
    private function judge($key)
    {
        $map = [
            1 => 2,
            2 => 1,
        ];
        $data = MyRedis::get($key);
        for ($i = 1; $i <= 2; $i++) {
            if ($data[$i] === false) {
                $data[$i] = date('y-m-d h:i:s');
                $data['current'] = $i;
                MyRedis::write($key,$data);
                return true;
            }
        }
        $oldtime = $data[$map[$data['current']]];
        $second = $this->calTime($oldtime);
        $this->refresh($key,$data);
        //var_dump($second);
        if ($second <= 60) {
            return false;
        }
        return true;
    }

    /**
     * @param $oldtime 上上次的注册时间
     * @return float 上上次注册时间和当前注册时间的差值，单位是秒
     * 计算上上次注册时间和本次注册时间的差值
     */
    private function calTime($oldtime)
    {
        $now = date('y-m-d h:i:s');
        $second=floor((strtotime($now)-strtotime($oldtime))%86400);
        return $second;

    }

    /**
     * @param $key 来源IP
     * @param $data 之前存放在redis中的注册信息
     * 删除redis中的上上次的注册时间记录，加入这次的注册时间记录
     */
    private function refresh($key, $data)
    {
        if (($data['current']+1) > 2) {
            $data['current'] =1;
        }
        else {
            $data['current']++;
        }
        $data[$data['current']] = date('y-m-d h:i:s');
        MyRedis::write($key,$data);
    }
}
    