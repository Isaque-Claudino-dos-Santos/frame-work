<?php

require_once("./app/controllers/Controller.php");
require_once("./app/models/User.php");

require_once("./app/http/Request.php");


class userController extends Controller{

    public static function index() {
        return Controller::view("user");
    }

    public static function register() {
        return Request::all(User::$lable);
    }
} 