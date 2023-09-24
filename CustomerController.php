<?php

class CustomerController {

    public function customerLogin($email, $password){
        //printf($email.$password);
        if (file_exists("data/customerRegisters.txt")) {
            $data = unserialize(file_get_contents("data/customerRegisters.txt"));
        }
        // if (!is_array($data)) {
        //     return [];
        // }
        // print_r($data);die;
        foreach ($data as $key=>$customer) {
            //print_r($customer);
            if ($customer['email'] === $email && $customer['password'] === $password) {
                return true;
            }
        }

        return false;
    }

    public function customerRegister($name, $email, $password) {

        $data[] = [
            "name" => $name,
            "email" => $email,
            "password" => $password,

        ];
        printf("Customer register successfully.\n");
        file_put_contents("data/customerRegisters.txt", serialize($data));
        
    }

    public function FunctionName() {
        
    }
}