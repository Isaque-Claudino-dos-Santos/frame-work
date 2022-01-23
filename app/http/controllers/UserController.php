<?php
namespace App\Http\Controllers;

use App\Http\Request;

class UserController {
    public function create() {
        view('user.create');
    }

    public function store() {
       dd('PAGE USER STORE USER',false);
    }
}