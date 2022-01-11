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

        if (!$method && !$uri) {
            //Aqui vem um menssagen de erro
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
        } else {
            return false;
        }
    }

    public function execute()
    {
        $controller = isset($this->routers[$this->uri]) ? $this->routers[$this->uri] : $this->routers['/'];
        
        $func = $controller[0];
        $action = $controller[1];
        $param = isset($controller[2]) ? $controller[2] : null;
        (new $func)->$action($param);
    }
}
