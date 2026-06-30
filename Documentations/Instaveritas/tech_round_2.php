<?php

abstract class BankAccount
{
    protected string $accountNumber;
    protected float $balance;

    public function __construct(string $accountNumber, float $balance = 0)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Invalid deposit amount.");
        }

        $this->balance += $amount;

        echo "Deposited: ₹{$amount}\n";
    }

    abstract public function withdraw(float $amount): void;

    public function getBalance(): float
    {
        return $this->balance;
    }
}

class SavingAccount extends BankAccount
{
    private const WITHDRAW_LIMIT = 10000;

    public function withdraw(float $amount): void
    {
        if ($amount > self::WITHDRAW_LIMIT) {
            throw new Exception("Saving Account: Maximum withdrawal limit is ₹10000.");
        }

        if ($amount > $this->balance) {
            throw new Exception("Insufficient Balance.");
        }

        $this->balance -= $amount;

        echo "Saving Account Withdraw: ₹{$amount}\n";
    }
}

class CurrentAccount extends BankAccount
{
    public function withdraw(float $amount): void
    {
        if ($amount > $this->balance) {
            throw new Exception("Insufficient Balance.");
        }

        $this->balance -= $amount;

        echo "Current Account Withdraw: ₹{$amount}\n";
    }
}

class FixedDepositAccount extends BankAccount
{
    private DateTime $maturityDate;

    public function __construct(
        string $accountNumber,
        float $balance,
        DateTime $maturityDate
    ) {
        parent::__construct($accountNumber, $balance);
        $this->maturityDate = $maturityDate;
    }

    public function withdraw(float $amount): void
    {
        $today = new DateTime();

        if ($today < $this->maturityDate) {
            throw new Exception("Cannot withdraw before maturity.");
        }

        if ($amount > $this->balance) {
            throw new Exception("Insufficient Balance.");
        }

        $this->balance -= $amount;

        echo "Fixed Deposit Withdraw: ₹{$amount}\n";
    }
}

class BankService
{
    public function processWithdrawal(BankAccount $account, float $amount): void
    {
        $account->withdraw($amount);
    }

    public function processDeposit(BankAccount $account, float $amount): void
    {
        $account->deposit($amount);
    }
}


// -------------------- Usage --------------------

$bank = new BankService();

try {

    echo "===== Saving Account =====\n";

    $saving = new SavingAccount("SA101", 50000);

    $bank->processDeposit($saving, 5000);

    $bank->processWithdrawal($saving, 8000);

    echo "Balance: ₹".$saving->getBalance();

    echo "\n\n";


    echo "===== Current Account =====\n";

    $current = new CurrentAccount("CA101", 100000);

    $bank->processWithdrawal($current, 60000);

    echo "Balance: ₹".$current->getBalance();

    echo "\n\n";


    echo "===== Fixed Deposit =====\n";

    $fd = new FixedDepositAccount(
        "FD101",
        200000,
        new DateTime("2026-12-31")
    );

    $bank->processWithdrawal($fd, 10000);

} catch (Exception $e) {

    echo "\nError : ".$e->getMessage();
}