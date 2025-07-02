<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "classes/Student.php";
    require "classes/Course.php";

    // Tworzenie studentów
    $student1 = new Student("Jan", "Kowalski", "S001");
    $student2 = new Student("Anna", "Nowak", "S002");

    // Tworzenie kursu
    $math = new Course("Matematyka");

    // Dodawanie studentów do kursu
    $math->addStudent($student1);
    $math->addStudent($student2);

    // Dodawanie ocen
    $math->addGrade("S001", 4.5);
    $math->addGrade("S001", 5.0);
    $math->addGrade("S002", 3.0);

    // Wyświetlanie statystyk
    echo "Średnia Jana Kowalskiego: " . $math->getStudentAverage("S001") . "\n"; // 4.75
    echo "Średnia Anny Nowak: " . $math->getStudentAverage("S002") . "\n";      // 3.0
    echo "Średnia przedmiotu: " . $math->getCourseAverage() . "\n";                  // 4.17
    ?>
</body>

</html>