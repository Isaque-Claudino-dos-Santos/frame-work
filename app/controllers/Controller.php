<?php 

namespace app\Controllers;

use DataBase\Config\Conection;

class Controller extends Conection{
    public  function view($page) {
        return "public/views/".$page.".php";
    }
}