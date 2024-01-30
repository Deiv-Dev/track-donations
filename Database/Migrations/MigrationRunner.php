<?php

namespace Database\Migrations;

require_once './CreateDatabase.php';
require_once './CreateCharityTable.php';
require_once './CreateDonationTable.php';
require_once '../DatabaseConnection.php';

class MigrationRunner
{
    public static function runMigrations(\PDO $pdo)
    {
        $migrationFiles = [
            'CreateCharityTable',
            'CreateDonationTable',
        ];

        foreach ($migrationFiles as $migrationFile) {
            $className = 'Database\\Migrations\\' . $migrationFile;

            if (class_exists($className)) {
                $migration = new $className();
                $migration->up($pdo);
                echo "Migration created: $migrationFile\n";
            } else {
                echo "Migration class not found: $migrationFile\n";
            }
        }
    }
}

try {
    $createDb = new DatabaseCreator();
    DatabaseCreator::createDatabase();
    $pdo = \Database\DatabaseConnection::getConnection();
    $mig = new MigrationRunner();
    MigrationRunner::runMigrations($pdo);
} catch (\PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
