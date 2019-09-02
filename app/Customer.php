<?php

namespace App;

class Customer
{
    public $firstName;
    public $lastName;
    public $email;
    public $country;
    public $areaOfInterest;

    public function __construct(String $firstName, String $lastName, String $email, String $country, String $areaOfInterest)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->country = $country;
        $this->areaOfInterest = $areaOfInterest;
    }

}