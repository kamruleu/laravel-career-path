<?php

namespace App\Controller;

use App\FileStorage;
use App\RegistrationType;

class LoginController
{
    private array $registers;
    private FileStorage $storage;
    private CustomerTransaction $customerTransaction;
    private AdminTransaction $adminTransaction;

    public function __construct() {
        $this->storage = new FileStorage();
        $this->customerTransaction = new CustomerTransaction();
        $this->adminTransaction = new AdminTransaction();
        $this->registers = $this->storage->load(RegistrationController::getModelName());
        
    }

    public function login($email, $password) {
        var_dump($this->registers);
        foreach ($this->registers as $key=>$value) 
        {
            if ($value['email'] === $email && $value['password'] === $password && $value['type'] === RegistrationType::$CUSTOMER) 
            {

                $this->customerTransaction->run($email);
                
            }else if($value['email'] === $email && $value['password'] === $password && $value['type'] === RegistrationType::$ADMIN)
            {
                $this->adminTransaction->run($email);
            }
        }

        return null;
    }
}