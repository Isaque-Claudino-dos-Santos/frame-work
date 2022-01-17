<?php

namespace App\Http;

class Router
{

    private $routers = [];
    private $surnames = [];
    private $current_uri = [];

    public function __get($surnames)
    {
        return $this->surnames;
    }

    public function __construct()
    {
        $this->app_uri = $_SERVER['REQUEST_URI'];
        $this->app_method = $_SERVER['REQUEST_METHOD'];
    }

    public function get($url, $controller)
    {
        $this->routers[$url] = $controller;
        $this->current_uri = $url;
        $uri = $this->validateUrl($url);
        $method = $this->validateMethod('GET');
        return $this;
        if (!$method && !$uri) {
            //Aqui vem um menssagen de erro
        }
    }

    public function post($url, $controller)
    {
        $this->routers[$url] = $controller;
        $this->current_uri = $url;
        $uri = $this->validateUrl($url);
        $method = $this->validateMethod('POST');
        return $this;
        if (!$method && !$uri) {
            //Aqui vem um menssagen de erro
        }
    }

    private function validateMethod($method)
    {
        switch ($method && $this->app_method) {
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
        if ($this->app_uri == $url) {

            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        $controller = isset($this->routers[$this->app_uri]) ? $this->routers[$this->app_uri] : $this->routers['/'];

        $func = $controller[0];
        $action = $controller[1];
        $param = isset($controller[2]) ? $controller[2] : null;
        (new $func)->$action($param);
    }

    public function name($name)
    {
        $this->surnames[$name] = $this->current_uri;
    }
}
