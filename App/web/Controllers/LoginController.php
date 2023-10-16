<?php

namespace App\web\Controllers;

use App\web\Models\LoginModel;

class LoginController
{
    private LoginModel $loginModel;
    
    public function __construct()
    {
        @session_start();
        $this->loginModel = new LoginModel();
    }

    public function index(){
        // print_r();
        return view("customer/login");
    }

    public function login(){
        $result = null;
        $message = null;
        $where = "email = '".$_POST['email']."' and password = '".$_POST['password']."'";
        
        $result = $this->loginModel->getCustomer($where);

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

    public function admin(){

        return view("admin/index");
    }

    public function adminLogin(){
        // echo "Test";die;
        $result = null;
        $message = null;
        $where = "email = '".$_POST['email']."' and password = '".$_POST['password']."'";
        
        $result = $this->loginModel->getUser($where);
        // print_r($result);die;
        if($result){
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['name'] = $result[0]['name'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['admin_logged'] = true;
            // print_r($_SESSION);
        }else{
            return view("admin/index", ["message" => "Failed to login"]);
        }

        return redirect("dashboard/admin");
    }

    public function logout(){
        session_destroy();
        return view("customer/login");
    }

    public function adminLogout(){
        session_destroy();
        return view("admin/index");
    }
}