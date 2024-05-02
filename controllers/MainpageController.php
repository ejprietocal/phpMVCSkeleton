<?php


namespace Controllers;

use MVC\Router;

class MainpageController{
    public static function index(Router $router){
        
        $router->render('main/index',[
        ]);
    }
}