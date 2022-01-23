<?php

namespace App\Http;

class Request {
    public static function all() {
        return $_POST;
    }

    public static function name($name) {
        return $_POST[$name];
    }
}