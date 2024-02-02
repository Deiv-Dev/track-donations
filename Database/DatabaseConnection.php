<?php

namespace database;

class DatabaseConnection
{
    private $pdo;

    public function getConnection(): \PDO
    {
        global $rootDsn, $rootUsername, $rootPassword, $dbName;

        require_once __DIR__ . '/../config.php';

        if (!isset($this->pdo)) {
            try {
                $dsn = $rootDsn . ';dbname=' . $dbName;

                $this->pdo = new \PDO($dsn, $rootUsername, $rootPassword);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        return $this->pdo;
    }
}
