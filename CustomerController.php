<?php

class CustomerController {

    private array $customers;

    public function __construct() {
        $this->customers = $this->load();
    }

    public function customerLogin($email, $password){
        //print_r($this->customers);die;
        if (file_exists("data/customerRegisters.txt")) {
            $data = unserialize(file_get_contents("data/customerRegisters.txt"));
        }

        foreach ($data as $key=>$customer) {
            if ($customer['email'] === $email && $customer['password'] === $password) {
                return true;
            }
        }

        return false;
    }

    public function customerRegister($name, $email, $password) {

        $newCustomers = [
            "name" => $name,
            "email" => $email,
            "password" => $password,

        ];
        array_push($this->customers, $newCustomers);
        printf("Customer register successfully.\n\n");
        file_put_contents("data/customerRegisters.txt", serialize($this->customers));
        
    }

    public function load() {
        if (file_exists("data/customerRegisters.txt")) {
            $data = unserialize(file_get_contents("data/customerRegisters.txt"));
        }

        if (!is_array($data)) {
            return [];
        }

        return $data;
    }
}