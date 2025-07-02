<?php

class BankAccount
{
    private string $owner;
    private float $balance;
    private array $transactions = [];

    public function __construct(string $owner, float $balance = 0)
    {
        $this->owner = $owner;
        $this->balance = $balance;
    }

    public function deposit(float $amount)
    {
        try {
            if ($amount <= 0) {
                throw new InvalidArgumentException("Error! The entered number must be greater than 0! You entered: {$amount}");
            }
            $this->balance += $amount;
            echo "<br>Successfully deposited {$amount}. New balance: {$this->balance}";
        } catch (InvalidArgumentException $e) {
            echo "<br>" . $e->getMessage();
        }

        $this->recordTransaction('deposit', $amount);
    }

    public function withdraw(float $amount): void
    {
        try {
            if ($amount <= 0) {
                throw new InvalidArgumentException("Amount must be greater than 0! You entered: {$amount}");
            }

            if ($this->balance < $amount) {
                throw new RuntimeException("Insufficient funds! Your balance: {$this->balance}, attempted withdrawal: {$amount}");
            }

            $this->balance -= $amount;
            echo "<br>Successfully withdrew {$amount}. New balance: {$this->balance}";
        } catch (InvalidArgumentException $e) {
            echo "<br>Validation error: " . $e->getMessage();
        } catch (RuntimeException $e) {
            echo "<br>Transaction failed: " . $e->getMessage();
        } catch (Exception $e) {
            echo "<br>Unexpected error: " . $e->getMessage();
        }

        $this->recordTransaction('withdraw', $amount);
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function recordTransaction(string $type, float $amount)
    {
        $this->transactions[] = [
            "type" => $type,
            "amount" => $amount,
            "timestamp" => date("Y-m-d H:i:s"),
        ];
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }
}
