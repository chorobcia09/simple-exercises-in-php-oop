# SIMPLE EXERCISES IN PHP OOP (EDU)

## 1. [PHP Library System](https://github.com/chorobcia09/simple-exercises-in-php-oop/blob/main/1/index.php)

This project demonstrates a simple library management system in PHP using object-oriented programming.

### Classes

#### Book

Represents a book with the following properties:
- **title** (string)
- **author** (string)
- **year** (int)
- **isBorrowed** (bool) — status whether the book is currently borrowed.

Main methods:
- `borrow()` — marks the book as borrowed.
- `returnBook()` — marks the book as available.
- `getStatus()` — returns `"Borrowed"` or `"Available"`.
- `__toString()` — returns a string with the book details.

### Library

Manages a collection of `Book` objects.

Main functionalities:
- Add and remove books.
- List all available books.
- Borrow and return books by title.

---

## 2. [PHP Car and Electric Car Classes](https://github.com/chorobcia09/simple-exercises-in-php-oop/blob/main/2/index.php)

This project demonstrates basic object-oriented programming concepts in PHP with classes representing cars.

### Classes

#### Car

Represents a standard car with the following properties:
- **brand** (string)
- **model** (string)
- **year** (int) — must be 1886 or later (the year the first car was invented).

Main features:
- Constructor validates the year.
- `getDescription()` returns a formatted string with car details.

### ElectricCar

Extends the `Car` class and adds the following property:
- **batteryCapacity** (float) — battery size in kWh, must be positive.

Additional features:
- Constructor validates battery capacity.
- Overrides `getDescription()` to include battery capacity.

---

## 3. [PHP Vehicle Management System](https://github.com/chorobcia09/simple-exercises-in-php-oop/blob/main/3/index.php)

This project demonstrates object-oriented programming concepts in PHP, including interfaces, abstract classes, and inheritance, through a simple vehicle management system.

### Overview

#### VehicleInterface

Defines the contract for vehicles with the following methods:
- `start(): string` — starts the vehicle.
- `stop(): string` — stops the vehicle.
- `getInfo(): string` — returns a description of the vehicle.

#### Vehicle (Abstract Class)

Implements `VehicleInterface` partially and serves as a base class for specific vehicle types.

Properties:
- `brand` (string)
- `model` (string)
- `year` (int)

Implements:
- `getInfo()` — returns basic vehicle info.

#### Car

Extends `Vehicle` and adds:
- `numberOfDoors` (int)

Implements:
- `start()` — returns a string indicating the car is starting.
- `stop()` — returns a string indicating the car is stopping.

#### Motorcycle

Extends `Vehicle` and adds:
- `hasSidecar` (bool)

Implements:
- `start()` — returns a string indicating the motorcycle is starting.
- `stop()` — returns a string indicating the motorcycle is stopping.

#### Garage

Manages a collection of vehicles. Methods include:
- `addVehicle(Vehicle $vehicle)` — adds a vehicle to the garage.
- `showAll()` — displays information about all vehicles and simulates starting and stopping them.

---

## 4. [PHP Hotel Reservations](https://github.com/chorobcia09/simple-exercises-in-php-oop/blob/main/4/project-root/index.php)

A simple hotel reservation system implemented in PHP using object-oriented programming (OOP) principles. This project demonstrates basic OOP concepts such as classes, objects, properties, methods, exception handling, and date management.

### Features

- Define hotel rooms with different types (`single`, `double`, `suite`), prices, and availability.
- Manage guests with validated email addresses.
- Create reservations while checking for room availability in specified date ranges.
- Prevent double booking of rooms.
- Cancel reservations and update room availability.
- Display lists of rooms, guests, and reservations.
- Simple web interface showcasing functionality with PHP and HTML.

### Classes

#### Guest

- Represents a hotel guest.
- Properties: `name`, `surname`, `email` (validated).
- String representation includes guest details.

#### Room

- Represents a hotel room.
- Properties: `number`, `type` (`single`, `double`, `suite`), `pricePerNight`, and availability status.
- Methods to mark rooms as available or unavailable.
- String representation shows room details.

#### Reservation

- Represents a booking made by a guest for a room.
- Stores guest, room, check-in and check-out dates.
- Calculates number of nights and total price.
- String representation shows booking summary.

#### Hotel

- Manages collections of rooms and reservations.
- Methods to add rooms, find available rooms by type and dates.
- Makes and cancels reservations with availability checks.

### Usage

- The main script initializes a hotel with sample rooms and guests.
- Demonstrates making reservations and handling booking conflicts.
- Displays available rooms for given dates.
- Provides feedback on success or error conditions.

## 5. [PHP Bank Account ]

This exercise demonstrates basic Object-Oriented Programming concepts in PHP by implementing a simple bank account system. The solution includes classes that handle bank account operations while maintaining proper encapsulation.

### Features

- Bank account class with balance management
- Deposit and withdrawal operations
- Balance validation
- Example usage demonstrating the functionality

### Installation
1. Clone the repository or download the files
2. Make sure you have PHP installed (version 7.4 or higher recommended)
3. Run the script from command line: `php index.php`

### Code Structure
- `Account.php` - Main Account class implementation
- `index.php` - Demonstration of the Account class usage

