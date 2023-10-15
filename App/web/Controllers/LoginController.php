<?php

namespace App\web\Controllers;

use App\web\Models\CustomerModel;

class LoginController
{
    private CustomerModel $customerModel;
    
    public function __construct()
    {
        @session_start();
        $this->customerModel = new CustomerModel();
    }

    public function index(){
        // print_r();
        return view("customer/login");
    }

    public function login(){
        $result = null;
        $message = null;
        $where = "email = '".$_POST['email']."' and password = '".$_POST['password']."'";
        
        $result = $this->customerModel->getCustomer($where);

        if($result){
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['name'] = $result[0]['name'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['logged'] = true;
            // print_r($_SESSION);
        }else{
            return view("customer/login", ["message" => "Failed to login"]);
        }

        return redirect("dashboard/customer");
    }

    public function logout(){
        session_destroy();
        return view("customer/login");
    }
}