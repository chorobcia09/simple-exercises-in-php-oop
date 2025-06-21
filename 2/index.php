<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Car
    {
        protected string $brand;
        protected string $model;
        protected int $year;

        public function __construct(string $brand, string $model, int $year)
        {
            if ($year < 1886) {
                throw new InvalidArgumentException("Year must be greater than or equal to 1886.");
            }

            $this->brand = $brand;
            $this->model = $model;
            $this->year = $year;
        }

        public function getDescription(): string
        {
            return "Brand: " . $this->brand . "<br>Model: " . $this->model . "<br>Year: " . $this->year;
        }
    }

    class ElectricCar extends Car
    {
        protected float $batteryCapacity;

        public function __construct(string $brand, string $model, int $year, float $batteryCapacity)
        {
            parent::__construct($brand, $model, $year);

            if ($batteryCapacity <= 0) {
                throw new InvalidArgumentException("Battery capacity must be positive.");
            }

            $this->batteryCapacity = $batteryCapacity;
        }

        public function getDescription(): string
        {
            return parent::getDescription() . "<br>BatteryCapacity: " . $this->batteryCapacity . " kWh";
        }
    }

    // Przykładowe użycie:

    try {
        $c1 = new Car("BMW", "E46", 2000);
        echo $c1->getDescription();
        echo "<br><br>";

        $c2 = new Car("BMW", "E36", 1999);
        echo $c2->getDescription();
        echo "<br><br>";

        $ec1 = new ElectricCar("BMW", "ElectricX1", 2025, 500.5);
        echo $ec1->getDescription();
        echo "<br><br>";

        // To rzuci wyjątek, bo rok jest przed 1886
        $ec2 = new ElectricCar("BMW", "ElectricX2", 1111, 500.5);
        echo $ec2->getDescription();
    } catch (InvalidArgumentException $e) {
        echo "Błąd: " . $e->getMessage();
    }

    ?>
</body>

</html>