<?php

namespace Apis;

use PHPEnv;

require_once("./.ambienteVar.php");

class Comands extends PHPEnv{
    public function serve() {
        exec("php -S " . $this->conectionHost['host'] . ":" . $this->conectionHost['port'] . " -t .");
    }

    private function istanciarClass($file, $namespace)
    {
        $file = explode(".", $file)[0];
        $class = $namespace . "\\" . $file;
        return new $class;
    }

    public function migrateUp() {
        $defaulDir = "database/migrations";

        if (is_dir($defaulDir)) {
            $files = scandir($defaulDir);
            array_map(function ($file) {
                if ($file != "." && $file != "..") {
                    $class = $this->istanciarClass($file, "DataBase\Migrations");
                    $class->createTable();
                }
            }, $files);
        } else {
            mkdir($defaulDir);
        }
    }
}