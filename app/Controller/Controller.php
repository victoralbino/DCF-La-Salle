<?php


namespace App\Controller;


class Controller
{
    public function view(String $view)
    {
        require DIR_PUBLIC . "views\\" . $view . ".php";
    }
}