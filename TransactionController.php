<?php

class TransactionController {
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

    public function run() {
        while(true){

            printf("Select from the following menu:\n\n");
            
            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $choice = intval(readline("Enter your option: "));

            switch ($choice) {
                case self::DEPOSIT:
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
}