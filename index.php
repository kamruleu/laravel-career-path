<?php

//autoload classess
require_once __DIR__ . '/vendor/autoload.php';

//get all routes
$routes = require_once __DIR__ . '/routes/web.php';
// print_r($_SERVER);
$project_name = "/laravel-career-path";
$project_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$project_name;

define("URL", $project_url);

$request = str_replace($project_name, "", $_SERVER['REQUEST_URI']);

$request_array = explode("?", $request);
$request = $request_array[0];
$request2 = "";
if(count($request_array) > 1){
    $request2 = $request_array[1];
}

if(isset($routes[$request])){

    [$controller, $action] = $routes[$request] ?? [null, null];

    // $controller = $routes[$request][0] ?? null;
    // $action = $routes[$request][1] ?? null;

    if($controller && $action){
        $newController = new $controller();
        $newController->$action($request2);
    }else{
        echo "404 not found";
        exit;
    }
}else{
    echo "404 not found";
}
