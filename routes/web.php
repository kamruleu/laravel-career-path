<?php

use App\web\Controllers\DashboardController;
use App\web\Controllers\RegisterController;
use App\web\Controllers\LoginController;
use App\web\Controllers\TransactionController;

return [
    
    "/" => [LoginController::class, "index"],
    "/index" => [LoginController::class, "index"],
    "/login" => [LoginController::class, "login"],
    "/register" => [RegisterController::class, "index"],
    "/register/create" => [RegisterController::class, "create"],
    "/dashboard/customer" => [DashboardController::class, "customer"],
    "/dashboard/customer" => [DashboardController::class, "customer"],
    "/dashboard/customer" => [DashboardController::class, "customer"],
    "/deposit" => [TransactionController::class, "deposit"],
    "/withdraw" => [TransactionController::class, "withdraw"],
    "/transfer" => [TransactionController::class, "transfer"],
    
];

?>