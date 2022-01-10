<?php


function loadApi()
{
    $apiPath = scandir('../apis');
    $apiPath = array_diff($apiPath, ['..', '.', 'loadApis.php']);
    foreach ($apiPath as $files) {
        require_once($files);
    }
}

loadApi();
