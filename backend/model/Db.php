<?php
namespace model;
use vendor\MyException;

/**
 * Class Db
 * @package db
 * 数据库操作类
 */
class Db
{
    private static $username = 'root';
    private static $password = '123456';
    private static $host     = 'localhost';
    private static $port     = 3306;
    private static $dbtype  = 'mysql';
    private static $dbnam    = 'w37_psz';
    private static $instance;

    private function __construct()
    {

    }

    public static function connect()
    {
        $dsn = self::$dbtype . ':host=' . self::$host. ':' . self::$port
                . ';' . 'dbname=' . self::$dbnam;
        try {
            self::$instance = new \PDO($dsn, self::$username, self::$password,
                [
                    \PDO::ATTR_PERSISTENT =>true ,
                    \PDO::ATTR_ERRMODE => true,
                ]);
            self::$instance->query('SET NAMES UTF8');
        } catch(Exception $e) {
            die('Connect Failed Message: ' . $e->getMessage());
        }
    }

    public static function query($sql, $data='', $isselect=true)
    {
        if (!self::$instance) {
            self::connect();
        }
        $stmt = self::$instance->prepare($sql);
        $result = $stmt->execute($data);
        if ($result === false) {
            $info = $stmt->errorInfo();
            //var_dump($info);
            throw new MyException($info[2] , $info[0]);
        }
        else {
            if($isselect === false) {
                return true;
            }
            else {
                $stmt->setFetchMode(\PDO::FETCH_ASSOC);    //设置结果集返回格式,此处为关联数组,即不包含index下标
                $result = $stmt->fetchAll();
                //var_dump($result);
                return $result;
            }
        }
    }

//    public static function queryNoPrepare($sql)
//    {
//        if (!self::$instance) {
//            self::connect();
//        }
//        self::$instance->query($sql);
//        if (self::$instance->errorCode()!='00000') {
//            return
//        }
//        return true;
//    }

}