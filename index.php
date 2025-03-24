<?php


const BASE_PATH = __DIR__ . '/../';


require 'Core/functions.php';

spl_autoload_register(function($class){
    //Core/Database
    $class  = str_replace('\\', '/', $class);
    require ("{$class}.php");
});




$router = new Core\Router;
$routes = require('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
