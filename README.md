# SIMPLE EXERCISES IN PHP OOP (EDU)

## 1. PHP Library System

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

## 2. PHP Car and Electric Car Classes

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

## 3. PHP Vehicle Management System

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
