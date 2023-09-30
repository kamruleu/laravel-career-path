<?php
namespace App;
use App\Controller\RegistrationController;

require_once __DIR__ . '/vendor/autoload.php';

class CreateAdmin {
    private RegistrationController $registrationController;

    public function __construct()
    {
        $this->registrationController = new RegistrationController();
    }
    public function run(){
        $name = trim(readline("Enter name: "));
        $email = trim(readline("Enter email: "));
        $password = trim(readline("Enter password: "));

        if(!$name || !$email || !$password){
            printf("\nPlease fill in all fields.\n\n");
            return null;
        }

        $this->registrationController->register($name, $email, $password, RegistrationType::$ADMIN);
    }
}

$admin = new CreateAdmin();
$admin->run();