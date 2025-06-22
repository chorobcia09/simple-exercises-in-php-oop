<?php

class Guest
{
    protected string $name;
    protected string $surname;
    protected string $email;

    public function __construct(string $name, string $surname, string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email: $email");
        }

        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }

    public function __toString(): string
    {
        return "Name: {$this->name} | Surname: {$this->surname} | Email: {$this->email}";
    }
}
