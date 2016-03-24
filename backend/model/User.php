<?php
namespace model;

use vendor\MyException;

/**
 * Class User
 * @package db
 * 对应用户表的实体类
 */
class User extends Util
{
    public $password;
    public $birth;
    public $register_time;
    public $mail;
    public $id;
    public $salt;

    //时间类型
    public function __construct()
    {
        $this->register_time = date('Y-m-d H:i:s');
    }

    public function save()
    {
        $this->encypt();
        return parent::save();
    }

    private function encypt()
    {
        $this->password = md5($this->mail . $this->password);
    }

    public function validate()
    {
        $pattern = '/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/';
        if (!preg_match($pattern, $this->mail)) {
            return false;
        }
        if (strlen($this->password) < 6) {
            return false;
        }
        return true;
    }
}