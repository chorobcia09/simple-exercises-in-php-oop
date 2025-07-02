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

    public function addGrade(string $studentId, float $grade): void
    {
        if (!isset($this->students[$studentId])) {
            throw new InvalidArgumentException("Student o ID $studentId nie istnieje w tym kursie.");
        }
        if ($grade < 1 || $grade > 5) {
            throw new InvalidArgumentException("Ocena musi być w zakresie 1-5.");
        }
        $this->grades[$studentId][] = $grade;
    }

    public function getStudentGrades(string $studentId): array
    {
        return $this->grades[$studentId] ?? [];
    }

    public function getStudentAverage(string $studentId): float
    {
        $grades = $this->getStudentGrades($studentId);
        if (empty($grades)) {
            return 0.0;
        }
        return array_sum($grades) / count($grades);
    }

    public function getCourseAverage(): float
    {
        $allGrades = array_merge(...array_values($this->grades));
        if (empty($allGrades)) {
            return 0.0;
        }
        return round(array_sum($allGrades) / count($allGrades), 2);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
