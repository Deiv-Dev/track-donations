<?php

namespace database\migrations;

require_once __DIR__ . '/./CreateDatabase.php';
require_once __DIR__ . '/./CreateCharityTable.php';
require_once __DIR__ . '/./CreateDonationTable.php';
require_once __DIR__ . '/../DatabaseConnection.php';

use database\DatabaseConnection;
use database\migrations\CreateDatabase;

class MigrationRunner
{
    private $pdo;

    public function __construct(DatabaseConnection $databaseConnection)
    {
        $this->pdo = $databaseConnection;
    }

    public function runMigrations(): void
    {
        $migrationFiles = [
            'CreateCharityTable',
            'CreateDonationTable',
        ];

        foreach ($migrationFiles as $migrationFile) {
            $className = 'database\\migrations\\' . $migrationFile;

            if (class_exists($className)) {
                $migration = new $className();
                $migration->up($this->pdo->getConnection());
                echo "Migration created: $migrationFile\n";
            } else {
                echo "Migration class not found: $migrationFile\n";
            }
        }
    }
}

try {
    $createDb = new DatabaseConnection();
    $createCharityDb = new CreateDatabase($createDb);
    $createCharityDb->createDatabase();
    $mig = new MigrationRunner($createDb);
    $mig->runMigrations();
    $pdo = null;
} catch (\PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
