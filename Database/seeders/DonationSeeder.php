<?php

namespace database\seeders;

require_once __DIR__ . '/../DatabaseConnection.php';
use database\DatabaseConnection;

require_once __DIR__ . '/../../models/Donation.php';
use models\Donation;

require_once __DIR__ . '/../../helpers/GenerateRandomDate.php';
use helpers\GenerateRandomDate;

class DonationSeeder
{
    public static function seed(): void
    {
        $pdo = DatabaseConnection::getConnection();

        $stmt = $pdo->query("SELECT id FROM charities");
        $charityIds = $stmt->fetchAll(\PDO::FETCH_COLUMN);

        if (empty($charityIds)) {
            echo "Error: No existing charities found.\n";
            return;
        }

        $donationsData = [];

        // Generate random donationsData
        for ($i = 0; $i < 40; $i++) {
            $donationData = [
                'donorName' => 'Donor ' . chr(65 + $i),
                'amount' => mt_rand(1, 1000000),
                'charityId' => $charityIds[array_rand($charityIds)],
                'dateTime' => GenerateRandomDate::generateRandomDateTime(),
            ];

            $donationsData[] = $donationData;
        }

        // Insert into the database
        foreach ($donationsData as $donationData) {
            $stmt = $pdo->prepare("
            INSERT INTO donations (donor_name, amount, charity_id, date_time) VALUES (?, ?, ?, ?)");
            $stmt->execute(
                [
                    $donationData['donorName'],
                    $donationData['amount'],
                    $donationData['charityId'],
                    $donationData['dateTime']
                ]
            );
        }

        $pdo = null;
    }
}
