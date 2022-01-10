<?php

namespace App\http;

class Request
{
    public static function all($array)
    {

        
    foreach ($array as $key => $value) {
            $array[$key] = $_POST[$key];
        }
        return $array;
    }
}
