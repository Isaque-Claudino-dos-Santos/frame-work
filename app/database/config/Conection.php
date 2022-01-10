<?php

namespace App\DataBase\Config;

class Conection 
{
    public  $pdo;
    public $table;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO('mysql:dbname='.DB_DBNAME.';host='.DB_HOST.';port='.DB_PORT,DB_USER,DB_PASS);
        } catch (\PDOException $e) {
            echo 'MYSQL error ' . $e->getMessage();
        }
    }

    public function up()
    {
        return [];
    }

    public function createTable()
    {
        $array = $this->up();
        $props = "";
        foreach ($array as $key => $value) {
            if ($key != "tableName") {
                $props = "{$props} {$key} {$value}";
            }
        };
        $cmd = $this->pdo->prepare("create table " . $this->table . " (" . $props . ")");
        $cmd->execute();
    }



    public function deleteTable()
    {
        $cmd = $this->pdo->prepare("drop table {$this->table}");
        $cmd->execute();
    }

    public function insert($array)
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

        $cmd = $this->pdo->prepare("insert into {$this->table} ({$model_value}) values({$model_key});");

        function addParam($cmd, $key, $value)
        {
            $cmd->bindParam(":" . $key, $value);
        }
        foreach ($array as $key => $value) {
            addParam($cmd, $key, $value);
        }
        $cmd->execute();
    }

    public function delete($array)
    {
        $cmd = $this->pdo->prepare("delete from " . $this->table . " where id = :id");
        $cmd->bindParam("id", $array["id"]);
        $cmd->execute();
    }
}
