<?php

namespace App\web\Controllers;

use App\web\Models\CustomerModel;

class RegisterController
{
    private CustomerModel $register;
    
    public function __construct()
    {
        $this->register = new CustomerModel();
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

        $result = $this->register->create($column, $values);

        if($result){
            $message = "Register successfully!";
        }else{
            $message = "Failed to  register!";
        }

        return view("customer/register", ["message" => $message]);
    }
}