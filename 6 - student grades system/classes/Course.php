<?php

class Course
{
    private string $name;
    private array $students = [];
    private array $grades = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addStudent(Student $student): void
    {
        $this->students[$student->getStudentId()] = $student;
        $this->grades[$student->getStudentId()] = [];
    }

    public function addGrade(string $studentid, float $grade) {}
}
