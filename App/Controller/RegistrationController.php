<?php

namespace App\Controller;
use App\Model;
use App\FileStorage;

class RegistrationController implements Model {

    private array $registers;
    private FileStorage $storage;

    public function __construct() {
        $this->storage = new FileStorage();
        $this->registers = $this->storage->load($this->getModelName());
    }

    public static function getModelName(): string
    {
        return 'registers';
    }

    public function register($name, $email, $password, $type) {

        foreach ($this->registers as $key=>$value) {
            if ($value['email'] === $email) {
                printf("\nSorry! This email already exist!\n\n");
                return false;
            }
        }

        $newRegister = [
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "type" => $type,

        ];
        array_push($this->registers, $newRegister);
        printf("\n".$type." register successfully.\n\n");
        $this->storage->save($this->getModelName(), $this->registers);
        
    }
}