<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    require_once 'classes/Room.php';
    require_once 'classes/Guest.php';
    require_once 'classes/Reservation.php';

    // Create some Room objects
    $room1 = new Room(101, 'double', 300.00);
    $room2 = new Room(102, 'single', 200.00);
    $room3 = new Room(103, 'suite', 500.00);

    // Display room details
    echo $room1 . "<br>";
    echo $room2 . "<br>";
    echo $room3 . "<br>";

    // Check availability status
    echo "Room 101 availability: " . ($room1->isAvailable() ? "Available" : "Unavailable") . "<br>";

    // Change availability to unavailable
    $room1->markAsUnavailable();
    echo "Room 101 after marking as unavailable: " . ($room1->isAvailable() ? "Available" : "Unavailable") . "<br>";

    // Change availability back to available
    $room1->markAsAvailable();
    echo "Room 101 after marking as available again: " . ($room1->isAvailable() ? "Available" : "Unavailable") . "<br>";

    echo str_repeat("-", 300);
    echo "<br><br>";

    
    $guest1 = new Guest("Jan", "Kowalski", "jankowalski@example.com");
    echo $guest1->__toString();
    echo "<br>";
    // $guest2 = new Guest("Jan", "Nowak", "wrongmail");
    // echo $guest2->__toString();

    echo str_repeat("-", 300);
    echo "<br><br>";

    $checkIn = new DateTime("2025-06-22");
    $checkOut = new DateTime("2025-06-30");

    $r1 = new Reservation($guest1, $room1, $checkIn, $checkOut);
    echo $r1->__toString();
    


    ?>
</body>

</html>