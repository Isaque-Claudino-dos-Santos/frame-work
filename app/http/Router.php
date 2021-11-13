<?php

namespace App\Http;

class Router {
  public static function get($req,$res)
  {

    $url = $_GET[$req];
    if($url == "/") {
        require_once $res;
    }
  }
}