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
        $classname = $this->getTableName();
        $sql = 'INSERT INTO ' . $classname . ' SET ';
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $sql = $sql . $key . '=:' . $key . ',';
            }
        }
        $sql = substr($sql, 0, strlen($sql)-1);
        $data = $this->getBindData();
        return Db::query($sql, $data,false);
    }

    public function getTableName()
    {
        $classname = strtolower(str_replace('model\\','',static::class));
        return $classname;
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

    public function update()
    {
        $table_name = $this->getTableName();
        $sql = 'UPDATE ' . $table_name . ' SET ';
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $sql = $sql . $key . '=:' . $key . ',';
            }
        }
        $sql = substr($sql, 0, strlen($sql)-1);
        $sql = $sql . ' WHERE id=:id';
        $data = $this->getBindData();
        return Db::query($sql, $data, false);
    }

    public function delete(array $where=[])
    {
        $table_name = $this->getTableName();
        $sql = 'DELETE FROM ' . $table_name . ' WHERE ';
        $tmp = [];
        foreach ($where as $key => $value) {
                $sql = $sql . $key . '=:' . $key . ' AND ';
                $tmp[':' . $key] = $value;
        }
        $sql = $sql . ' 1=1 ';
        return Db::query($sql, $tmp ,false);
    }

    public function select(array $where)
    {
        $table_name = $this->getTableName();
        $sql  = 'SELECT * FROM ' . $table_name . ' WHERE ';
        $tmp = [];
        foreach ($where as $key => $value) {
            $tmp[':' . $key] = $value;
            $sql = $sql . $key . '=:' . $key . ' and';
        }
        $sql = $sql . ' 1=1';
        $result = Db::query($sql, $tmp);
        $num = count($result);
        //var_dump($result);
        $class_name = static::class;
        switch ($num){
            case 0 : return false;
                          break;

            case 1: $result = $result[0];
                          $tmp = new $class_name;
                          foreach ($result as $key => $value) {
                              $pro_name = strtolower($key);
                              //var_dump($pro_name);
                              $tmp->$pro_name = $result[$key];
                          }
                          return $tmp;

            default:     $objects = [];
                         foreach ($result as $object) {
                             $tmp = new $class_name;
                             foreach ($object as $key => $value) {
                                 $pro_name = strtolower($key);
                                 $tmp->$pro_name = $object[$key];
                             }
                             $objects[] = $tmp;
                         }
                         return $objects;
        }
    }

}