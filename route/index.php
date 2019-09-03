<?php

require 'vendor/autoload.php';

use App\Http\Router;

$router = new Router();

$router->get( '/', 'HomeController@index');
$router->get( '/home', 'HomeController@teste');
$router->post( '/save', 'HomeController@saveCustomer');
$router->get( '/customers', 'HomeController@show');

$router->run();