<?php

use App\Http\Router;

use App\Http\Controllers\HomeController;

$router = new Router();

$router->get('/',[HomeController::class,'index']);
