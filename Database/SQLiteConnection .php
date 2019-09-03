<?php

namespace Database;


use PDO;

class SQLiteConnection extends PDO
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new \PDO("sqlite:database.sqlite");
        } catch (\Exception $e) {
            die("Erro ao conectar com o Banco de Dados");
        }
    }

}