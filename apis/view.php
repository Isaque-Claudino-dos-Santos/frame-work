<?php


function view($page)
{
    
    $viewPath = '../resources/views/';
    
    $page = str_replace('.','/',$page);
    
    require_once($viewPath.$page.'.php');
}


