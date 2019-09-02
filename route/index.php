<?php

require 'vendor/autoload.php';

use App\Http\Router;

$router = new Router();

$router->get( '/', 'HomeController@index');
$router->get( '/home', 'HomeController@teste');
$router->post( '/', 'HomeController@index');

$router->run();