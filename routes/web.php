<?php

use App\web\Controllers\DashboardController;
use App\web\Controllers\RegisterController;
use App\web\Controllers\LoginController;
use App\web\Controllers\TransactionController;

return [
    
    "/" => [LoginController::class, "index"],
    "/index" => [LoginController::class, "index"],
    "/login" => [LoginController::class, "login"],
    "/logout" => [LoginController::class, "logout"],
    "/register" => [RegisterController::class, "index"],
    "/register/create" => [RegisterController::class, "create"],
    "/dashboard/customer" => [DashboardController::class, "customer"],
    "/dashboard/customer" => [DashboardController::class, "customer"],
    "/dashboard/customer" => [DashboardController::class, "customer"],
    "/deposit" => [TransactionController::class, "deposit"],
    "/add_deposit" => [TransactionController::class, "add_deposit"],
    "/withdraw" => [TransactionController::class, "withdraw"],
    "/add_withdraw" => [TransactionController::class, "add_withdraw"],
    "/transfer" => [TransactionController::class, "transfer"],
    "/add_transfer" => [TransactionController::class, "add_transfer"],
    
];

?>