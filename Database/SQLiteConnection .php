<?php

namespace Database;

class SQLiteConnection
{
    const PATH_TO_SQLITE_FILE = __DIR__ . 'database.db';
    private $pdo;

    public function connect()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . self::PATH_TO_SQLITE_FILE);
        }
        return $this->pdo;
    }
}