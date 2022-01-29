<?php


 // função que pega a rota pelo apelido
 function route($name) {
    global $router;
    $routerinfo = array_filter($router->getRouters(),function($r)use($name) {
        return $r["surname"] === $name;
    });


    echo current($routerinfo)["uri"];
}
