<?php

namespace DataBase\Config;

use PDO;
use PDOException;
use PHPEnv;

require_once("./.ambienteVar.php");

class Conection extends PHPEnv
{
    public  $pdo;
    public $table = 'user';

    public function __construct()
    {
        try {

            $this->pdo = new PDO(
                'mysql:dbname=' . $this->conectionDB["dbname"] .
                    ';host=' .  $this->conectionDB["host"] .
                    ';port=' . $this->conectionDB["port"],
                $this->conectionDB["user"],
                $this->conectionDB["password"]
            );
        } catch (PDOException $e) {
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
