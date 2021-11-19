<?php

require_once("./autoload.php");
use App\Controllers\UserController;
use App\Http\Router;


Router::get("/",(new UserController())->index());
(new UserController())->register();