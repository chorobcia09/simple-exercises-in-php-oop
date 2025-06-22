<?php

class Hotel
{
    public string $name;

    /** @var Room[] */
    public array $rooms = [];

    /** @var Reservation[] */
    public array $reservations = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addRoom(Room $room): void
    {
        $this->rooms[] = $room;
    }

    public function findAvailableRooms(string $type, DateTime $from, DateTime $to): array
    {
        $availableRooms = [];

        foreach ($this->rooms as $room) {
            if ($room->type !== $type) continue;

            $isReserved = false;

            foreach ($this->reservations as $reservation) {
                if ($reservation->room === $room) {
                    // check for overlapping dates
                    if (
                        $from < $reservation->checkOutDate &&
                        $to > $reservation->checkInDate
                    ) {
                        $isReserved = true;
                        break;
                    }
                }
            }

            if (!$isReserved) {
                $availableRooms[] = $room;
            }
        }

        return $availableRooms;
    }


    public function makeReservation(Guest $guest, Room $room, DateTime $from, DateTime $to): Reservation
    {
        // Check if the room is available
        $availableRooms = $this->findAvailableRooms($room->type, $from, $to);
        if (!in_array($room, $availableRooms, true)) {
            throw new Exception("Room not available");
        }

        $reservation = new Reservation($guest, $room, $from, $to);
        $this->reservations[] = $reservation;

        // Mark the room as unavailable
        $room->markAsUnavailable();

        return $reservation;
    }

    public function cancelReservation(Reservation $reservation): void
    {
        $key = array_search($reservation, $this->reservations, true);
        if ($key !== false) {
            unset($this->reservations[$key]);
            $this->reservations = array_values($this->reservations);

            // Mark the room as available again
            $reservation->room->markAsAvailable();
        }
    }
}
