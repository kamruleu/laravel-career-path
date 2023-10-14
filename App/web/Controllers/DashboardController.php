<?php

namespace App\web\Controllers;

class DashboardController
{
    public function __construct()
    {
        @session_start();
    }

    public function customer(){
        return view("customer/dashboard");
    }
}