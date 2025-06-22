<?php

class Room
{
    protected int $number;
    protected string $type;
    protected float $pricePerNight;
    protected bool $isAvailable = true;

    public function __construct(int $number, string $type, float $pricePerNight)
    {
        $allowedTypes = ['single', 'double', 'suite'];
        if (!in_array($type, $allowedTypes)) {
            throw new InvalidArgumentException("Invalid room type: $type");
        }

        $this->number = $number;
        $this->type = $type;
        $this->pricePerNight = $pricePerNight;
    }


    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function markAsUnavailable(): void
    {
        $this->isAvailable = false;
    }

    public function markAsAvailable(): void
    {
        $this->isAvailable = true;
    }

    public function __toString(): string
    {
        return "Room {$this->number} ({$this->type}) - {$this->pricePerNight} PLN/night ";
    }
}
