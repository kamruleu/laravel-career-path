<?php

namespace App\web\Controllers;

use App\web\Models\CustomerModel;

class RegisterController
{
    public function __construct()
    {
        
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

        $model = new CustomerModel();
        $result = $model->create($column, $values);

        if($result){
            $message = "Register successfully!";
        }else{
            $message = "Failed to  register!";
        }

        return view("customer/register", ["message" => $message]);
    }
}