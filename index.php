<?php
require_once("./autoload.php");

require_once("./app/controllers/userController.php");
require_once("./database/config/Conection.php");


    
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
 $db->create("user",userController::register());

require_once(userController::index());