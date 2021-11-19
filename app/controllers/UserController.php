<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return $this->view("user");
    }

    public function register()
    {
        $dados = Request::all(User::$lable);
        $this->insert($dados);
        return $dados;
    }
}
