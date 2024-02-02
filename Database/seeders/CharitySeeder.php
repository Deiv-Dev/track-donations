<?php

namespace database\seeders;

require_once __DIR__ . '/../DatabaseConnection.php';
use database\DatabaseConnection;

require_once __DIR__ . '/../../models/Charity.php';
use models\Charity;

class CharitySeeder
{
    private $databaseConnection;
    private $charityModel;

    public function __construct(DatabaseConnection $databaseConnection, Charity $charityModel)
    {
        $this->databaseConnection = $databaseConnection;
        $this->charityModel = $charityModel;
    }

    public function seed(): void
    {
        $charitiesData = [];

        for ($i = 0; $i < 20; $i++) {
            $charityData = [
                'name' => 'Charity ' . chr(65 + $i),
                'representativeEmail' => 'rep_' . chr(97 + $i) . '@example.com',
            ];

            $charitiesData[] = $charityData;
        }

        $pdo = $this->databaseConnection->getConnection();

        foreach ($charitiesData as $charityData) {
            $charity = $this->charityModel;
            $charity->setName($charityData['name']);
            $charity->setRepresentativeEmail($charityData['representativeEmail']);

            $stmt = $pdo->prepare("INSERT INTO charities (name, representative_email) VALUES (?, ?)");
            $stmt->execute([$charity->getName(), $charity->getRepresentativeEmail()]);
        }

        $pdo = null;
    }
}
