<?php

class Sponsor
{
    private $perAttendee;
    private $attendeeCap;

    public function __construct(float $perAttendee, int $attendeeCap)
    {
        $this->perAttendee = $perAttendee;
        $this->attendeeCap = $attendeeCap;
    }

    public function getTotalDonated(int $totalAttendees)
    {
        return $this->attendeeCap >= $totalAttendees
            ? $this->perAttendee * $this->attendeeCap
            : $this->perAttendee * $totalAttendees;
    }
}

$totalAttendees = 1000;
$totalDonated = 50.00;
$totalMatched = 0;

$sponsors = [
    new Sponsor(5.00, 100),
    new Sponsor(10.00, 200),
    new Sponsor(1.00, 150),
    new Sponsor(3.25, 1050),
];

foreach ($sponsors as $sponsor) {
    $totalMatched += $sponsor->getTotalDonated($totalAttendees);
}

echo $totalDonated + $totalMatched;
