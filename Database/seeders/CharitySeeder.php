<?php

namespace database\seeders;

require_once __DIR__ . '/../DatabaseConnection.php';
use database\DatabaseConnection;

require_once __DIR__ . '/../../models/Charity.php';
use models\Charity;

class CharitySeeder
{
    public static function seed(): void
    {
        $charitiesData = [];

        for ($i = 0; $i < 20; $i++) {
            $charityData = [
                'name' => 'Charity ' . chr(65 + $i),
                'representativeEmail' => 'rep_' . chr(97 + $i) . '@example.com',
            ];

            $charitiesData[] = $charityData;
        }

        $pdo = DatabaseConnection::getConnection();

        foreach ($charitiesData as $charityData) {
            $charity = new Charity();
            $charity->setName($charityData['name']);
            $charity->setRepresentativeEmail($charityData['representativeEmail']);

            $stmt = $pdo->prepare("INSERT INTO charities (name, representative_email) VALUES (?, ?)");
            $stmt->execute([$charity->getName(), $charity->getRepresentativeEmail()]);
        }

        $pdo = null;
    }
}


