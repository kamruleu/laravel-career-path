<?php

//autoload classess
require_once __DIR__ . '/vendor/autoload.php';

//get all routes
$routes = require_once __DIR__ . '/routes/web.php';

$request = $_SERVER['REQUEST_URI'];

$request = explode("?", $request)[0];

if(isset($routes[$request])){

    [$controller, $action] = $routes[$request] ?? [null, null];

    // $controller = $routes[$request][0] ?? null;
    // $action = $routes[$request][1] ?? null;

    if($controller && $action){
        $newController = new $controller();
        $newController->$action();
    }else{
        echo "404 not found";
        exit;
    }
}else{
    echo "404 not found";
}
