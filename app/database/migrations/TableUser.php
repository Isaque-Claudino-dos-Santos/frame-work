<?php

namespace App\DataBase\Migrations;

use App\DataBase\Migrations\Migration;

class TableUser extends Migration
{
    public function up()
    {
       Migration::create('user',[
           "id" => "int AUTO_INCREMENT PRIMARY KEY",
           "name" => "varchar(150) not null",
           "year" => "int(4) not null"
       ]);
    }

    public function down()
    {
        Migration::drop('user');
    }
}
