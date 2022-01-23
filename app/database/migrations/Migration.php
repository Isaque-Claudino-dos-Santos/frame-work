<?php

namespace  App\DataBase\Migrations;

use App\DataBase\Config\Conection;


class Migration extends Conection
{
    protected $table;

    protected function create($table,$ary)
    {
        $this->table = $table;

        Conection::createTable($ary);
    }

    protected function drop($table)
    {
        $this->deleteTable($table);
    }
}
