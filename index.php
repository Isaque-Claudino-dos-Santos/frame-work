<?php


require_once("./autoload.php");

use App\Controllers\UserController;
use App\Http\Router;


//remove e criar banco de dados
// $deleteTable = false;

// if($deleteTable == false) {
//     $db->createTable(CreateUserTable::up());
// }else {
//     $db->deleteTable(CreateUserTable::down());
// }

//cria a tabela
//$db->createTable(CreateUserTable::up());


//insere dados
// $db->create("user", userController::register());

Router::get("/",UserController::index());
