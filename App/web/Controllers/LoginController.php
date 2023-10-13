<?php

namespace App\web\Controllers;

use App\web\Models\CustomerModel;

class LoginController
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $allCustomer = new CustomerModel();
        // print_r();
        return view("customer/login", ["allcustomer"=>$allCustomer->getAll()]);
    }

    public function getAllCustomer(){
        $all = new CustomerModel();
        $all->getAll();
    }
}