<?php

namespace App\Http;

class Router
{
    private $routers = [];

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function get($url, $controller)
    {
        $this->routers[$url] = $controller;
        $uri = $this->validateUrl($url);
        $method = $this->validateMethod('GET');

        if ($method && $uri) {
            $this->execute($url);
        }
    }

    private function validateMethod($method)
    {
        switch ($method && $this->method) {
            case 'GET':
                return true;
                break;
            case 'POST':
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    private function validateUrl($url)
    {
        if ($this->uri == $url) {
            return true;
        }else {
            return false;
        }
    }

    private function execute($url)
    {
        $controller = $this->routers[$url];


        $func =isset($controller[0]) &&  $controller[0] ?  $controller[0] : 'App\Http\Controllers\HomeController';
        $action = isset($controller[1]) &&  $controller[1] ?  $controller[1] : 'index';
        $param = isset($controller[2]) &&  $controller[2] ?  $controller[2] : null;
        (new $func)->$action($param);
    }
}
