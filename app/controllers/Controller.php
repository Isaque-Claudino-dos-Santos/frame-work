<?php 

namespace app\Controllers;


class Controller {
    public  function view($page) {
        return "public/views/".$page.".php";
    }
}