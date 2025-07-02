<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel Reservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h2 {
            color: #2c3e50;
        }

        .section {
            margin-bottom: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px #ccc;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>

    <?php

    require_once 'classes/Room.php';
    require_once 'classes/Guest.php';
    require_once 'classes/Reservation.php';
    require_once 'classes/Hotel.php';

    echo "<div class='section'>";
    echo "<h2>Creating hotel and rooms</h2>";

    $hotel = new Hotel("Hotel Warsaw");

    $hotel->addRoom(new Room(101, 'single', 200));
    $hotel->addRoom(new Room(102, 'single', 200));
    $hotel->addRoom(new Room(201, 'double', 300));
    $hotel->addRoom(new Room(202, 'double', 300));
    $hotel->addRoom(new Room(301, 'suite', 500));

    echo "<p><strong>Added 5 rooms to the hotel:</strong></p>";
    foreach ($hotel->rooms as $room) {
        echo "<p>$room</p>";
    }
    echo "</div>";


    echo "<div class='section'>";
    echo "<h2>Creating guests</h2>";

    $guest1 = new Guest("John", "Smith", "john@example.com");
    $guest2 = new Guest("Anna", "Nowak", "anna@example.com");

    echo "<p>Guest 1: $guest1</p>";
    echo "<p>Guest 2: $guest2</p>";
    echo "</div>";


    echo "<div class='section'>";
    echo "<h2>Reservations</h2>";

    $checkIn = new DateTime("2025-07-01");
    $checkOut = new DateTime("2025-07-05");

    try {
        $reservation1 = $hotel->makeReservation($guest1, $hotel->rooms[2], $checkIn, $checkOut);
        echo "<p class='success'>Reservation 1: $reservation1</p>";

        $reservation2 = $hotel->makeReservation($guest2, $hotel->rooms[2], $checkIn, $checkOut);
        echo "<p class='success'>Reservation 2: $reservation2</p>";
    } catch (Exception $e) {
        echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
    }
    echo "</div>";


    echo "<div class='section'>";
    echo "<h2>Available double rooms from 2025-07-01 to 2025-07-05</h2>";

    $available = $hotel->findAvailableRooms('double', $checkIn, $checkOut);
    if (count($available) > 0) {
        foreach ($available as $room) {
            echo "<p>$room</p>";
        }
    } else {
        echo "<p>No available rooms of this type.</p>";
    }
    echo "</div>";

    ?>

</body>

</html>