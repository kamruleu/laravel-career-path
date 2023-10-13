<?php

use App\web\Controllers\RegisterController;
use App\web\Controllers\LoginController;
$project_path = "/laravel-career-path";

return [
    
    $project_path."/" => [LoginController::class, "index"],
    $project_path."/login" => [LoginController::class, "index"],
    $project_path."/register" => [RegisterController::class, "index"],
    $project_path."/register/customer" => [RegisterController::class, "create"]
    
];

?>