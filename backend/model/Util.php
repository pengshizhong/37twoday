<?php
namespace model;

/**
 * Class Util
 * @package db
 * 数据实体类基类
 */
class Util
{
    public function hasNull()
    {
        foreach ($this as $property) {
            if (!$property) {
                return false;
            }
        }
        return true;
    }

    public function batchAssign($data)
    {
        foreach ($this as $key => $value) {
            if (array_key_exists($key,$data)) {
                $this->$key = $data[$key];
            }
        }
    }

    public function save()
    {
        $classname = strtolower(str_replace('db\\','',static::class));
        $sql = 'INSERT INTO ' . $classname . ' SET ';
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $sql = $sql . $key . '=:' . $key . ',';
            }
        }
        $sql = substr($sql, 0, strlen($sql)-1);
        $data = $this->getBindData();
        return Db::query($sql, $data);
    }

    public function getBindData()
    {
        $data = [];
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $data[':' . $key] = $value;
            }
        }
        return $data;
    }
}