<?php

namespace App\Controller;

use App\FileStorage;
use App\RegistrationType;

class AdminTransaction {
    private FileStorage $storage;
    private array $transactions;
    private array $registers;
    private const ALL_TRANSACRION = 1;
    private const INDIVIDUAL_TRANSACTION = 2;
    private const CUSTOMER_LIST = 3;

    private array $options = [
        self::ALL_TRANSACRION => 'All Transaction',
        self::INDIVIDUAL_TRANSACTION => 'Individual Transaction',
        self::CUSTOMER_LIST => 'Customer List',
    ];

    public function __construct() {
        $this->storage = new FileStorage();
        $this->transactions = $this->storage->load(CustomerTransaction::getModelName());
        $this->registers = $this->storage->load(RegistrationController::getModelName());
    }

    public function run($email) {

        while(true){

            printf("Select from the following menu:\n");

            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $choice = intval(readline("Enter your option: "));

            switch ($choice) {
                case self::ALL_TRANSACRION:
                    $this->viewAllTransaction();
                    break;
                case self::INDIVIDUAL_TRANSACTION:
                    $toEmail = trim(readline("customer email: "));
                    $checkCustomer = $this->checkCustomer($toEmail);
                    if(!$checkCustomer){
                        printf("\nSorry! Invalid customer email!\n\n");
                        break;
                    }
                    $this->viewTransaction($toEmail);
                    break;
                case self::CUSTOMER_LIST:
                    $this->viewCustomer();
                    break;
                default:
                    printf("\nSorry! Your selected option invalid\n\n");
                    break;
            }
        }
    }

    public function saveTransactions($amount, $type, $email)
    {
        $newTransaction = [
            "email" => $email,
            "type" => $type,
            "amount" => $amount,

        ];
        array_push($this->transactions, $newTransaction);
        printf("\nTransaction save successfully.\n\n");
        $this->storage->save(CustomerTransaction::getModelName(), $this->transactions);
    }

    public function viewAllTransaction()
    {
        printf("---------------------------------\n");

        printf("Email\tTransaction Type\tAmount\n");
        foreach ($this->transactions as $key => $value) {
            printf($value['email']."\t".$value['type']."\t\t".abs($value['amount'])."\n");
        }

        printf("---------------------------------\n\n");
    }

    public function viewTransaction($email)
    {
        printf("---------------------------------\n");

        printf("Transaction Type\tAmount\n");
        
        foreach ($this->transactions as $key => $value) {
            if($value['email'] === $email){
                printf($value['type']."\t\t".abs($value['amount'])."\n");
            }
        }

        printf("---------------------------------\n\n");
    }

    public function viewCustomer()
    {
        printf("---------------------------------\n");

        printf("SL\tEmail\n");
        $sl = 0;
        foreach ($this->registers as $key => $value) {
            
            if($value['type'] === RegistrationType::$CUSTOMER){
                $sl++;
                printf($sl."\t".$value['email']."\n");
            }
        }

        printf("---------------------------------\n\n");
    }

    public function checkCustomer($email)
    {
        foreach ($this->registers as $key => $value) {
            if($value['email'] === $email && $value['type'] === RegistrationType::$CUSTOMER){
                return true;
            }
        }

        return false;
    }
}