<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

spl_autoload_register(
    function ($classes) {
        $descompact = explode("\\", $classes);
        $path = "";
        
        foreach($descompact as $files) {
            if(end($descompact) == $files) {
                $path .= $files;
            }else {
                $path .= strtolower($files)."/";
            }
        }

        require_once $path.".php";
    }
);
