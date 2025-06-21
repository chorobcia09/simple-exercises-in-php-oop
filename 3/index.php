<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    interface VehicleInterface
    {
        public function start(): string;
        public function stop(): string;
        public function getInfo(): string;
    }

    abstract class Vehicle implements VehicleInterface
    {
        protected string $brand;
        protected string $model;
        protected int $year;

        public function __construct(string $brand, string $model, int $year)
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->year = $year;
        }

        public function getInfo(): string
        {
            return "Brand: {$this->brand}, Model: {$this->model}, Year: {$this->year}";
        }
    }

    class Car extends Vehicle
    {
        protected int $numberOfDoors;

        public function __construct(string $brand, string $model, int $year, int $numberOfDoors)
        {
            parent::__construct($brand, $model, $year);
            $this->numberOfDoors = $numberOfDoors;
        }

        public function start(): string
        {
            return "Odpalam samochód...";
        }

        public function stop(): string
        {
            return "Gaszę samochód...";
        }
    }

    class Motorcycle extends Vehicle
    {
        protected bool $hasSidecar;

        public function __construct(string $brand, string $model, int $year, bool $hasSidecar)
        {
            parent::__construct($brand, $model, $year);
            $this->hasSidecar = $hasSidecar;
        }

        public function start(): string
        {
            return "Odpalam motocykl...";
        }

        public function stop(): string
        {
            return "Gaszę motocykl...";
        }
    }

    class Garage
    {
        private array $vehicles = [];

        public function addVehicle(Vehicle $vehicle): void
        {
            $this->vehicles[] = $vehicle;
        }

        public function showAll(): void
        {
            foreach ($this->vehicles as $vehicle) {
                echo $vehicle->getInfo() . PHP_EOL;
                echo $vehicle->start() . PHP_EOL;
                echo $vehicle->stop() . PHP_EOL;
                echo str_repeat("-", 30) . PHP_EOL;
            }
        }
    }

    $garage = new Garage();

    $car = new Car("Toyota", "Corolla", 2020, 4);
    $motorcycle = new Motorcycle("Harley-Davidson", "Iron 883", 2019, false);

    $garage->addVehicle($car);
    $garage->addVehicle($motorcycle);

    $garage->showAll();




    ?>
</body>

</html>