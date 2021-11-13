<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Http\Request;
use App\Model\User;

class UserController extends Controller
{

    public static function index()
    {
        return Controller::view("user");
    }

    public static function register()
    {
        return Request::all(User::$lable);
    }
}
