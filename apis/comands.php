<?php


require_once('./autoload.php');

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

function executeMigration($cmd)
{
    $defaulDir = "./app/database/migrations";

    if (is_dir($defaulDir)) {

        $files = scandir($defaulDir);
        $files = array_diff($files, ['.', '..', 'Migration.php']);

        foreach ($files as $file) {
            $class = istanciarClass($file, "App\DataBase\Migrations");
            if ($cmd == 'migrateUp') {
                $class->up();
            } else if ($cmd == 'migrateDown') {
                $class->down();
            }
        }
    } else {
        mkdir($defaulDir);
    }
}
