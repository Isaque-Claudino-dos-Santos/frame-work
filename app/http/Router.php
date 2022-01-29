<?php

namespace App\Http;


class Router
{

    private $routers = [];

    public function getRouters() {
        return $this->routers;
    }

    public function __construct()
    {
        $this->app_uri = $_SERVER['REQUEST_URI'];
        $this->app_method = $_SERVER['REQUEST_METHOD'];
    }

    public function get($uri, $controller)
    {
        $this->routers[$uri] = [
            "uri" => $uri,
            "controller" => $controller[0],
            "action" => $controller[1],
            "method" =>"GET",
            "surname" => null,
        ];
    
        return $this;
    }

    public function post($uri, $controller)
    {
        $this->routers[$uri] = [
            "uri" => $uri,
            "controller" => $controller[0],
            "action" => $controller[1],
            "method" =>"POST"
        ];
    
        return $this;
    }

    private function validateMethod()
    {

        $method = $this->routers[$this->app_uri]["method"];
       return $method === $this->app_method;
    }

    private function getUri()
    {
        if (isset($this->routers[$this->app_uri])) return $this->routers[$this->app_uri];
    }

    public function execute()
    {

        $isMethod = $this->validateMethod();
        if($isMethod) {
            $uri = $this->getUri();
        }else {
            dd("Method Not Valide");
        }
        
        $func = $uri["controller"];
        $action = $uri["action"];
        $param = null;
        (new $func)->$action($param);
    }

    public function name($name)
    {
        $key = array_key_last($this->routers);

        $this->routers[$key]["surname"] = $name;
    }
}
