<?php

function dd($txt,$die = true) {
    echo '<pre>';
    print_r($txt);
    echo '</pre>';

    if($die) die();
}