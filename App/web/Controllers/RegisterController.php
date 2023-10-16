<?php

namespace App\web\Controllers;

use App\web\Models\LoginModel;

class RegisterController
{
    private LoginModel $loginModel;
    
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        return view("customer/register");
    }

    public function create(){
        //print_r($_POST);
        $result = null;
        $message = null;
        $column = "name, email, password";
        $values = "('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."')";

        $result = $this->loginModel->create($column, $values);

        if($result){
            $message = "Register successfully!";
        }else{
            $message = "Failed to  register!";
        }

        return view("customer/register", ["message" => $message]);
    }
}