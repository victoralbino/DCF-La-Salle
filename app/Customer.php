<?php

namespace App;

use Database\SQLiteConnection;

class Customer extends Model
{
    public $firstName;
    public $lastName;
    public $email;
    public $country;
    public $areaOfInterest;

    static protected $attributes = ['firstName', 'lastName', 'email', 'country', 'areaOfInterest'];
    static protected $table = 'customers';
    static protected $primaryKey = 'email';

    public function __construct(String $firstName, String $lastName, String $email, String $country, String $areaOfInterest)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->country = $country;
        $this->areaOfInterest = $areaOfInterest;
    }

    public static function selectByEmail($email)
    {
        $conn = new \PDO("sqlite:". DIR_DATABASE ."database.sqlite");

        $smtp = $conn->prepare("SELECT * FROM customers WHERE customers.email = :email");
        $smtp->bindValue(':email', $email);

        $result = $smtp->fetchAll();

        if(count($result) > 0){
            $result = $result[0];

            $customer = new Customer(
                $result['firstName'],
                $result['lastName'],
                $result['email'],
                $result['country'],
                $result['areaOfInterest']
            );

            return $customer;
        }
    }

    public static function selectAll()
    {
        $conn = new \PDO("sqlite:". DIR_DATABASE ."database.sqlite");
        $query = $conn->query("SELECT * FROM customers", \PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        return $result;
    }

}