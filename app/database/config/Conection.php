<?php

namespace App\DataBase\Config;

class Conection
{
    private  $pdo;
    protected $table;


    public function __construct()
    {
        try {
            $this->pdo = new \PDO('mysql:dbname=' . DB_DBNAME . ';host=' . DB_HOST . ';port=' . DB_PORT, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            echo 'MYSQL error ' . $e->getMessage();
        }
    }

    public function createTable($props)
    {
        $array = $props;
        $query = '';
        foreach ($array as $key => $value) {
            if (end($array) == $value) {
                $query .= "{$key} {$value} ";
            } else {
                $query .= "{$key} {$value}, ";
            }
        };

        $cmd = $this->pdo->prepare("create table " . $this->table . " (" . $query . ")");
        $cmd->execute();
    }



    public function deleteTable($table)
    {
        $cmd = $this->pdo->prepare("drop table {$table};");
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
