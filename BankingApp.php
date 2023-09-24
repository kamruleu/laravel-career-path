<?php

class BankingApp {
    private CustomerController $customerController;
    private TransactionController $transactionController;
    
    private const LOGIN = 1;
    private const REGISTER = 2;
    private $IS_LOGIN = false;

    private array $options = [
        self::LOGIN => 'Login',
        self::REGISTER => 'Register',
    ];

    public function __construct()
    {
        $this->customerController = new CustomerController();
        $this->transactionController = new TransactionController();
    }

    public function run(){
        while(true){

            printf("Select from the following menu:\n\n");
            
            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $choice = intval(readline("Enter your option: "));

            switch ($choice) {
                case self::LOGIN:
                    $email = trim(readline("Enter Email: "));
                    $password = trim(readline("Enter Password: "));
                    $check = $this->customerController->customerLogin($email, $password);
                    if($check){
                        $this->IS_LOGIN = true;
                        $this->transactionController->run();
                    }else{
                        printf("Sorry! Invalid credentials\n");
                    }
                    break;
                case self::REGISTER:
                    $name = trim(readline("Enter Name: "));
                    $email = trim(readline("Enter Email: "));
                    $password = trim(readline("Enter Password: "));
                    $this->customerController->customerRegister($name, $email, $password);
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
}