<?php

use App\web\Controllers\RegisterController;
use App\web\Controllers\LoginController;

return [
    
    "/" => [LoginController::class, "index"],
    "/index" => [LoginController::class, "index"],
    "/login" => [LoginController::class, "login"],
    "/register" => [RegisterController::class, "index"],
    "/register/create" => [RegisterController::class, "create"]
    
];

?>