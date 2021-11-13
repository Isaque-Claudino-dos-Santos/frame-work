<?php

namespace DataBase\Config;
use PDO;

class Conection
{
    public  $pdo;

    public function __construct($HOST, $DBNAME, $USER, $PASS)
    {
        $this->pdo = new PDO('mysql:dbname=' . $DBNAME . ';host=' . $HOST, $USER, $PASS);
    }

    public function createTable($array)
    {
        $props = "";
        foreach ($array as $key => $value) {
            if ($key != "tableName") {
                $props = "{$props} {$key} {$value}";
            }
        };
        $cmd = $this->pdo->prepare("create table " . $array["tableName"] . " (" . $props . ")");
        $cmd->execute();
    }

    public function deleteTable($table)
    {
        $cmd = $this->pdo->prepare("drop table {$table}");
        $cmd->execute();
    }

    public function create($table, $array)
    {
        $model_key = "";
        $model_value = "";
        foreach ($array as  $key => $value) {
            if (end($array) == $value) {
                $model_key = "{$model_key}:{$key}";
                $model_value = "{$model_value}{$key}";
            } else {
                $model_key = "{$model_key}:{$key},";
                $model_value = "{$model_value}{$key},";
            }
        }


        $cmd = $this->pdo->prepare("insert into {$table} ({$model_value}) values({$model_key});");

        function addParam($cmd,$key,$value) {
            $cmd->bindParam(":".$key,$value);
        }
        foreach($array as $key => $value) {
            addParam($cmd,$key,$value);
        }
        $cmd->execute();
    }

    public function delete($table, $array)
    {
        $cmd = $this->pdo->prepare("delete from " . $table . " where id = :id");
        $cmd->bindParam("id", $array["id"]);
        $cmd->execute();
    }
}
