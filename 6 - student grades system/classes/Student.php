<?php
class Student
{
    private string $firstName;
    private string $lastName;
    private string $studentId;

    public function __construct(string $firstName, string $lastName, string $studentId)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->studentId = $studentId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getStudentId(): string
    {
        return $this->studentId;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
