<?php
namespace model;
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

    public static function query($sql, $data)
    {
        if (!self::$instance) {
            self::connect();
        }
        $stmt = self::$instance->prepare($sql);
        if (!$stmt->execute($data)) {
            return false;
        }
        return true;
    }

    public static function queryNoPrepare($sql)
    {
        if (!self::$instance) {
            self::connect();
        }
        $query = self::$instance->query($sql);
        $query->setFetchMode(\PDO::FETCH_ASSOC);    //设置结果集返回格式,此处为关联数组,即不包含index下标
        $result = $query->fetchAll();
        return $result;
    }

}