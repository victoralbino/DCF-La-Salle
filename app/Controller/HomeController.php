<?php

namespace App\Controller;


use App\Customer;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view("welcome");
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

        $customer = new Customer(
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['country'],
            $_POST['areaOfInterest']
        );

        var_dump($customer);

    }
}