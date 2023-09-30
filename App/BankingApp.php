<?php

namespace App;
use App\Controller\RegistrationController;
use App\Controller\LoginController;
use App\RegistrationType;

class BankingApp {
    private RegistrationController $registrationController;
    private LoginController $loginController;
    
    private const LOGIN = 1;
    private const REGISTER = 2;

    private array $options = [
        self::LOGIN => 'Login',
        self::REGISTER => 'Register',
    ];

    public function __construct()
    {
        $this->registrationController = new RegistrationController();
        $this->loginController = new LoginController();
    }

    public function run(){
        while(true){

            printf("Select from the following menu:\n");
            
            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $choice = intval(readline("Enter your option: "));

            switch ($choice) {
                case self::LOGIN:
                    $email = trim(readline("Enter Email: "));
                    $password = trim(readline("Enter Password: "));
                    if(!$email || !$password){
                        printf("\nPlease fill in all fields.\n\n");
                        break;
                    }
                    $this->loginController->login($email, $password);
                    break;
                case self::REGISTER:
                    $name = trim(readline("Enter Name: "));
                    $email = trim(readline("Enter Email: "));
                    $password = trim(readline("Enter Password: "));
                    if(!$name || !$email || !$password){
                        printf("\nPlease fill in all fields.\n\n");
                        break;
                    }
                    $this->registrationController->register($name, $email, $password, RegistrationType::$CUSTOMER);
                    break;
                default:
                    printf("\nSorry! Invalid option.\n\n");
                    break;
            }
        }
    }
}