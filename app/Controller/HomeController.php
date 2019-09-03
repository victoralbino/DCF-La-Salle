<?php

namespace App\Controller;


use App\Customer;
use Enumeration\Country;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view("welcome");
    }

    public function show()
    {
        return $this->view("customers");
    }

    public function saveCustomer()
    {
        list($fail, $errors) = $this->validate($_POST, [
            "firstName" => "string",
            "lastName" => "string",
            "email" => "email",
            "country" => "required",
            "areaOfInterest" => "required",
        ]);

        if ($fail){
            return $this->redirect('/', $errors, true);
        }

        $_POST['country'] = Country::returnNameFromAcronym($_POST['country']);

        $customer = new Customer(
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['country'],
            $_POST['areaOfInterest']
        );

        $conn = new \PDO("sqlite:". DIR_DATABASE ."database.sqlite");
        $sql = 'INSERT INTO customers VALUES (:firstName, :lastName, :email, :country, :areaOfInterest)';
        $smtp = $conn->prepare($sql);
        $smtp->bindValue(':firstName', $customer->firstName);
        $smtp->bindValue(':lastName', $customer->lastName);
        $smtp->bindValue(':email', $customer->email);
        $smtp->bindValue(':country', $customer->country);
        $smtp->bindValue(':areaOfInterest', $customer->areaOfInterest);

        if ($smtp->execute()){
            return $this->redirect('/', ["saved" => true]);
        }else{
            return $this->redirect('/', ["saved" => true]);
        }


    }
}