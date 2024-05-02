<?php


define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/build/img/');


function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function isAdmin() : void{
    
    if(!isset($_SESSION['admin'])){
        header('Location: /');
    }
}