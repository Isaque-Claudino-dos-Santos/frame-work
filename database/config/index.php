<?php

namespace DataBase\Config;

use PDOException;
use DataBase\Config\Conection;
require_once("./.ambienteVar.php");

try {
    $db = new Conection(
        $var["conectionDB"]["host"],
        $var["conectionDB"]["dbname"],
        $var["conectionDB"]["user"],
        $var["conectionDB"]["password"]
    );
} catch (PDOException $e) {
    echo "MySql Error " . $e->getMessage();
}
