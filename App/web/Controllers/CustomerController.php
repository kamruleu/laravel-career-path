<?php

namespace App\web\Controllers;

use App\web\Models\LoginModel;

class CustomerController
{
    private LoginModel $loginModel;

    public function __construct()
    {
        @session_start();
        if(!$_SESSION['admin_logged']){
            redirect(URL."/admin");
        }
        
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        return view("admin/add_customer");
    }

    public function create()
    {
        //print_r($_POST);
        $result = null;
        $message = null;
        $column = "name, email, password";
        $values = "('".$_POST['first-name']."','".$_POST['email']."','".$_POST['password']."')";

        $result = $this->loginModel->create($column, $values);

        if($result){
            $message = "Create successfully!";
        }else{
            $message = "Failed to  create!";
        }

        return view("admin/add_customer", ["message" => $message]);
    }
}