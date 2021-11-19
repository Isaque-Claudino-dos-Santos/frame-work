<?php

namespace DataBase\Migrations;
use DataBase\Config\Conection;

class CreateUserTable extends Conection
{ 
    public $table = "user";

    public function up()
    {
        return [
            "id" => "int not null auto_increment primary key,",
            "name" => "varchar(200) not null,",
            "year" => "int(4) not null"
        ];
    }
}
