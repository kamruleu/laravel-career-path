<?php

class TransactionController {
    private array $transactions;
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
        $this->transactions = $this->load();
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
                    $this->saveTransactions($amount, $this->options[$choice], $email);
                    break;
                case self::WITHDRAW:
                    $amount = "-".(float)trim(readline("Enter withdraw amount: "));
                    $this->saveTransactions($amount, $this->options[$choice], $email);
                    break;
                case self::TRANSFER:
                    $amount = (float)trim(readline("Enter transfer amount: "));
                    $toCustomer = trim(readline("To customer email: "));
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
                    printf("Sorry! Your selected option invalid\n\n");
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
        printf("Transaction save successfully.\n\n");
        file_put_contents("data/transactions.txt", serialize($this->transactions));
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
        printf("Current Balance: \t\t".$total."\n");

        printf("---------------------------------\n\n");
    }

    public function load() {
        if (file_exists("data/transactions.txt")) {
            $data = unserialize(file_get_contents("data/transactions.txt"));
        }

        if (!is_array($data)) {
            return [];
        }

        return $data;
    }
}