<?php

namespace App\Http;

class Request
{
    public static function all()
    {
        return $_POST;
    }

    public static function name(array $names)
    {
        $post = [];
        foreach($names as $name) {
            $valor = $_POST[$name];
            $post[$name] = $valor;
        }
        return $post;
    }
}
