<?php

namespace App\Http;
use app\http\Request;
class Router 
{
    public static function get($req,$res)
    {
        $url = $_SERVER["REQUEST_URI"];
        
        if($url == $req) {
            require_once $res;
        }else {
            echo "<h1>Error 404</h1><br/><hr/><h3>NOT FOLDE</h3>";
        }
    }

    public static function post($res) {     
            var_dump($res);
    }
}
