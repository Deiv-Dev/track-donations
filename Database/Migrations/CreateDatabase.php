<?php

namespace database\migrations;

require_once __DIR__ . '/../DatabaseConnection.php';
use database\DatabaseConnection;

class CreateDatabase
{
    private $pdo;

    public function __construct(DatabaseConnection $databaseConnection)
    {
        $this->pdo = $databaseConnection;
    }

    public function createDatabase(): void
    {
        global $rootDsn, $rootUsername, $rootPassword, $dbName;

        require_once '../../config.php';

        try {
            $pdoConnection = $this->pdo->getConnection();
            $pdoConnection->exec("CREATE DATABASE IF NOT EXISTS $dbName");

            echo "Database '$dbName' created successfully.\n";
        } catch (\PDOException $e) {
            die('Database creation failed: ' . $e->getMessage());
        }
    }
}
