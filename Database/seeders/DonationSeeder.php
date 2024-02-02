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
    private $databaseConnection;
    private $donationModel;

    private $generateRandomDate;

    public function __construct(
        DatabaseConnection $databaseConnection,
        Donation $donationModel,
        GenerateRandomDate $generateRandomDate
    ) {
        $this->databaseConnection = $databaseConnection;
        $this->donationModel = $donationModel;
        $this->generateRandomDate = $generateRandomDate;
    }

    public function seed(): void
    {
        $pdo = $this->databaseConnection->getConnection();

        $stmt = $pdo->query("SELECT id FROM charities");
        $charityIds = $stmt->fetchAll(\PDO::FETCH_COLUMN);

        if (empty($charityIds)) {
            echo "Error: No existing charities found.\n";
            return;
        }

        $donationsData = [];

        for ($i = 0; $i < 40; $i++) {
            $donationData = [
                'donorName' => 'Donor ' . chr(65 + $i),
                'amount' => mt_rand(1, 1000000),
                'charityId' => $charityIds[array_rand($charityIds)],
                'dateTime' => $this->generateRandomDate->generateRandomDateTime(),
            ];

            $donationsData[] = $donationData;
        }

        foreach ($donationsData as $donationData) {
            $donation = $this->donationModel;
            $donation->setDonorName($donationData['donorName']);
            $donation->setAmount($donationData['amount']);
            $donation->setCharityId($donationData['charityId']);
            $donation->setDateTime($donationData['dateTime']);

            $stmt = $pdo->prepare("
            INSERT INTO donations (donor_name, amount, charity_id, date_time) VALUES (?, ?, ?, ?)");
            $stmt->execute(
                [
                    $donation->getDonorName(),
                    $donation->getAmount(),
                    $donation->getCharityId(),
                    $donation->getDateTime()
                ]
            );
        }

        $pdo = null;
    }
}
