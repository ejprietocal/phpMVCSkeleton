<?php
require_once __DIR__ . '/../includes/app.php';

use Controllers\MainpageController;
use MVC\Router;


$router = new Router();



$router->get('/',[MainpageController::class,'index']);

//aqui van las rutas



$router->comprobarRutas();