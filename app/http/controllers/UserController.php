<?php

namespace App\Http\Controllers;

use App\DataBase\Config\Conection;
use App\Http\Request;
use App\Models\User;

class UserController extends Conection
{
    public function create()
    {
        view('user.create');
    }

    public function store()
    {
        Request::name(User::$lable);
        Conection::insert('user', Request::all());
        redirectView('home.index');
    }
}
