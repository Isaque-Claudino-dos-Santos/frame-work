<?php
require_once('../bootstrep.php');
require_once('../apis/loadApis.php');
require_once('../autoload.php');

require_once('../routers/web.php');

$router->execute();