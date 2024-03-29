<?php

namespace App\Http;

use ReflectionClass;

class Router
{
    protected $routes = [];

    /**
     * @param $method
     * @param $route
     * @param $controller
     * @return Router
     * @throws \Exception
     */
    public function setRoute($method, $route, $controller): self
    {
        $method = strtolower($method);
        if (isset($this->routes[$method][$route]) && $this->routes[$method][$route] == $controller) {
            throw new \Exception("Já existe uma rota com esses parametros!");
        }

        if (!isset($this->routes[$method])) {
            $this->routes[$method] = [];
        }

        if (!isset($this->routes[$method][$route])) {
            $this->routes[$method][$route] = [];
        }

        $this->routes[$method][$route] = $controller;

        return $this;

    }

    /**
     * @param $route
     * @param $controller
     */
    public function get($route, $controller)
    {
        try {
            $this->setRoute('get', $route, $controller);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    /**
     * @param $route
     * @param $controller
     */
    public function post($route, $controller)
    {
        try {
            $this->setRoute('post', $route, $controller);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }


    public function run() : void
    {
        try {
            if (isset($this->routes[$this->method()][$this->uri()])) {
                $route = $this->routes[$this->method()][$this->uri()];

                list($controller, $function) = $this->setController($route);

                $class = "App\\Controller\\" . $controller;
                $controller = new ReflectionClass($class);
                if (!$controller->hasMethod($function)) {
                    throw new \Exception("Erro ao chamar função: " . $function . "() da classe: " . $controller->getName());
                }

                call_user_func(array($controller->newInstance(), $function));


            } else {
                http_response_code(404);
                require DIR_PUBLIC . "views\\error\\404.php";
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    /**
     * @return string
     */
    public function method() : string
    {
        return isset($_SERVER['REQUEST_METHOD']) ? strtolower($_SERVER['REQUEST_METHOD']) : 'cli';
    }

    /**
     * @return string|string[]|null
     */
    public function uri() : string
    {
        $self = isset($_SERVER['PHP_SELF']) ? str_replace('index.php/', '', $_SERVER['PHP_SELF']) : '';
        $uri = isset($_SERVER['REQUEST_URI']) ? explode('?', $_SERVER['REQUEST_URI'])[0] : '';
        if ($self !== $uri) {
            $peaces = explode('/', $self);
            array_pop($peaces);
            $start = implode('/', $peaces);
            $search = '/' . preg_quote($start, '/') . '/';
            $uri = preg_replace($search, '', $uri, 1);
        }
        return $uri;
    }

    /**
     * @param $controller
     * @return array
     */
    public function setController($controller) : array
    {
        $action = explode('@', $controller);
        return $action;
    }

}