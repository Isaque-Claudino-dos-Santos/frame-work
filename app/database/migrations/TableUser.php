<?php

namespace App\DataBase\Migrations;

use App\DataBase\Migrations\Migration;

use App\DataBase\Migrations\ModelPrint;

class TableUser extends Migration
{
    public function up()
    {
        $prop = new ModelPrint();
        Migration::create('user', [
            $prop->int('id',null,true,true,true),
            $prop->string('name',200),
            $prop->int('year',4)
        ]);
    }

    public function down()
    {
        Migration::drop('user');
    }
}
