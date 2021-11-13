<?php


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
