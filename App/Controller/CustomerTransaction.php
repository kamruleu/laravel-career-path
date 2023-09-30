<?php

namespace App\Controller;
use App\Model;
use App\FileStorage;
use App\RegistrationType;

class CustomerTransaction implements Model {
    private FileStorage $storage;
    private array $transactions;
    private array $registers;
    private const DEPOSIT = 1;
    private const WITHDRAW = 2;
    private const TRANSFER = 3;
    private const VIEW_TRANSACTION = 4;
    private const VIEW_BALANCE = 5;

    private array $options = [
        self::DEPOSIT => 'Deposit money',
        self::WITHDRAW => 'Withdraw money',
        self::TRANSFER => 'Transfer money',
        self::VIEW_TRANSACTION => 'Show my transaction',
        self::VIEW_BALANCE => 'Show current balance'
    ];

    public function __construct() {
        $this->storage = new FileStorage();
        $this->transactions = $this->storage->load($this->getModelName());
        $this->registers = $this->storage->load(RegistrationController::getModelName());
    }

    public static function getModelName(): string
    {
        return 'transactions';
    }

    public function run($email) {

        while(true){

            printf("Select from the following menu:\n");

            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $choice = intval(readline("Enter your option: "));

            switch ($choice) {
                case self::DEPOSIT:
                    $amount = (float)trim(readline("Enter deposit amount: "));
                    if($amount <= 0){
                        printf("\nSorry! Amount would be greater than 0!\n\n");
                        break;
                    }
                    $this->saveTransactions($amount, $this->options[$choice], $email);
                    break;
                case self::WITHDRAW:
                    $amount = (float)trim(readline("Enter withdraw amount: "));
                    if($amount <= 0){
                        printf("\nSorry! Amount would be greater than 0!\n\n");
                        break;
                    }
                    $amount = "-".$amount;
                    $checkBalance = $this->checkBalance($amount, $email);
                    if(!$checkBalance){
                        printf("\nSorry! You don't have sufficient balance!\n\n");
                        break;
                    }
                    $this->saveTransactions($amount, $this->options[$choice], $email);
                    break;
                case self::TRANSFER:
                    $amount = (float)trim(readline("Enter transfer amount: "));
                    $toCustomer = trim(readline("To customer email: "));
                    if($amount <= 0){
                        printf("\nSorry! Amount would be greater than 0!\n\n");
                        break;
                    }
                    $checkCustomer = $this->checkCustomer($toCustomer);
                    if(!$checkCustomer){
                        printf("\nSorry! Invalid customer email!\n\n");
                        break;
                    }
                    $checkBalance = $this->checkBalance($amount, $email);
                    if(!$checkBalance){
                        printf("\nSorry! You don't have sufficient balance!\n\n");
                        break;
                    }
                    $this->saveTransactions("-".$amount, $this->options[$choice], $email);
                    $this->saveTransactions($amount, "Received money", $toCustomer);
                    break;
                case self::VIEW_TRANSACTION:
                    $this->viewTransaction($email);
                    break;
                case self::VIEW_BALANCE:
                    $this->viewBalance($email);
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
        $this->storage->save($this->getModelName(), $this->transactions);
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

    public function viewBalance($email)
    {
        printf("---------------------------------\n");

        printf("Transaction Type\tAmount\n");
        $total = 0;
        foreach ($this->transactions as $key => $value) {
            if($value['email'] === $email){
                $total += $value['amount'];
                printf($value['type']."\t\t".abs($value['amount'])."\n");
            }
        }
        printf("---------------------------------\n");
        printf("Current Balance: \t".$total."\n");

        printf("---------------------------------\n\n");
    }

    public function checkBalance($amount, $email)
    {
        $total = 0;
        foreach ($this->transactions as $key => $value) {
            if($value['email'] === $email){
                $total += $value['amount'];
            }
        }

        if($total >= abs($amount)){
            return true;
        }

        return false;
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