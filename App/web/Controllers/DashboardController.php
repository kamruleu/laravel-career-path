<?php

namespace App\web\Controllers;

class DashboardController
{
    public function __construct()
    {
        @session_start();
        if(!$_SESSION['logged']){
            redirect(URL."/index");
        }
    }

    public function customer(){
        return view("customer/dashboard");
    }
}