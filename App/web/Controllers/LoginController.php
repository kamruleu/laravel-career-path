<?php

namespace App\web\Controllers;

use App\web\Models\CustomerModel;

class LoginController
{
    public function __construct()
    {
        @session_start();
    }

    public function index(){
        // print_r();
        return view("customer/login");
    }

    public function login(){
        $result = null;
        $message = null;
        $where = "email = '".$_POST['email']."' and password = '".$_POST['password']."'";
        $customerModel = new CustomerModel();
        $result = $customerModel->getCustomer($where);

        if($result){
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['name'] = $result[0]['name'];
            $_SESSION['email'] = $result[0]['email'];
            // print_r($_SESSION);
        }else{
            return view("customer/login", ["message" => "Failed to login"]);
        }

        return redirect("dashboard/customer");
    }
}