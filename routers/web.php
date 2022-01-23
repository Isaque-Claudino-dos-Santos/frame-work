<?php

use App\Http\Router;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

$router = new Router();

$router->get('/',[HomeController::class,'index'])->name('home.index');

$router->get('/users/create',[UserController::class,'create'])->name('user.create');
$router->post('/users',[UserController::class,'store'])->name('user.store');

