<?php

namespace models;

class Donation
{
    private $id;
    private $donorName;
    private $amount;
    private $charityId;
    private $dateTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDonorName(): string
    {
        return $this->donorName;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCharityId(): int
    {
        return $this->charityId;
    }

    public function getDateTime(): string
    {
        return $this->dateTime;
    }
}
