<?php

class CreateUserTable
{

    public static function up()
    {
        return $array = [
            "tableName" => "user",
            "id" => "int not null auto_increment primary key,",
            "name" => "varchar(200) not null,",
            "year" => "int(4) not null"
        ];
    }

    public static function down()
    {
        return "user";
    }
}
