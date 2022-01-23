<?php

function serve()
{
    exec("php -S " . APP_HOST . ":" . APP_POST . " -t ./public/");
}

function istanciarClass($file, $namespace)
{
    $file = explode(".", $file)[0];
    $class = $namespace . "\\" . $file;
    return new $class;
}

function migrateUp()
{
    $defaulDir = "./app/database/migrations";
    if (is_dir($defaulDir)) {
        $files = scandir($defaulDir);
        array_map(function ($file) {
            if ($file != "." && $file != "..") {
                $class = istanciarClass($file, "DataBase\Migrations");
                $class->createTable();
            }
        }, $files);
    } else {
        mkdir($defaulDir);
    }
}
