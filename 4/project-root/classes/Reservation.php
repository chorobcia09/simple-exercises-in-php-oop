<?php

class Reservation
{
    public Guest $guest;
    public Room $room;
    public DateTime $checkInDate;
    public DateTime $checkOutDate;

    public function __construct(Guest $guest, Room $room, DateTime $checkInDate, DateTime $checkOutDate)
    {
        $this->guest = $guest;
        $this->room = $room;
        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
    }

    public function getNumberOfNights(): int
    {
        $interval = $this->checkInDate->diff($this->checkOutDate);
        return $interval->days;
    }

    public function getTotalPrice(): float
    {
        return $this->getNumberOfNights() * $this->room->pricePerNight;
    }

    public function __toString(): string
    {
        return "{$this->guest->name} {$this->guest->surname} reserved room {$this->room->number} from "
            . $this->checkInDate->format('Y-m-d') . " to " . $this->checkOutDate->format('Y-m-d')
            . ". Cost: {$this->getTotalPrice()} PLN";
    }
}
