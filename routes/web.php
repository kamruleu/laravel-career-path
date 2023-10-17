<?php

use App\web\Controllers\AdminDashboardController;
use App\web\Controllers\CustomerController;
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
    "/deposit" => [TransactionController::class, "deposit"],
    "/add_deposit" => [TransactionController::class, "add_deposit"],
    "/withdraw" => [TransactionController::class, "withdraw"],
    "/add_withdraw" => [TransactionController::class, "add_withdraw"],
    "/transfer" => [TransactionController::class, "transfer"],
    "/add_transfer" => [TransactionController::class, "add_transfer"],
    //admin route
    "/admin" => [LoginController::class, "admin"],
    "/admin-login" => [LoginController::class, "adminLogin"],
    "/admin-register" => [RegisterController::class, "adminRegister"],
    "/admin-create" => [RegisterController::class, "adminCreate"],
    "/dashboard/admin" => [AdminDashboardController::class, "admin"],
    "/transactions" => [AdminDashboardController::class, "transactions"],
    "/admin-logout" => [LoginController::class, "adminLogout"],
    "/add-customer" => [CustomerController::class, "index"],
    "/create-customer" => [CustomerController::class, "create"],
    
];

?>