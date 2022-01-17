<?php
require_once('../bootstrep.php');
require_once('../apis/loadApis.php');
require_once('../autoload.php');
require_once('../routers/web.php');


//garante a execucão das rotas no final da validação
$router->execute();
 
// função que pega a rota pelo apelido
function route($name) {
    global $router;
    echo $router->surnames[$name];
}
