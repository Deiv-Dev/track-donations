<?php

namespace models;

class Charity
{
    private $id;
    private $name;
    private $representativeEmail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getRepresentativeEmail(): ?string
    {
        return $this->representativeEmail;
    }
}
