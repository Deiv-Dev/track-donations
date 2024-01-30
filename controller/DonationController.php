<?php

namespace controller;

require_once __DIR__ . '/../database/DatabaseConnection.php';
use database\DatabaseConnection;

require_once __DIR__ . '/../models/Donation.php';
use models\Donation;

class DonationController
{
    public function create(Donation $donation): void
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("INSERT INTO donations (donor_name, amount, charity_id, date_time) VALUES (?, ?, ?, ?)");
        $stmt->execute(
            [
                $donation->getDonorName(),
                $donation->getAmount(),
                $donation->getCharityId(),
                $donation->getDateTime()
            ]
        );
        $pdo = null;
    }

    public function getAllDonations(): array
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->query("SELECT * FROM donations");

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function read(int $donationId): array
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM donations WHERE id = ?");
        $stmt->execute([$donationId]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $pdo = null;

        return $result;
    }

    public function update(Donation $donation): void
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare(
            "UPDATE donations SET donor_name = ?, amount = ?, charity_id = ?, date_time = ? WHERE id = ?"
        );
        $stmt->execute(
            [
                $donation->getDonorName(),
                $donation->getAmount(),
                $donation->getCharityId(),
                $donation->getDateTime(),
                $donation->getId()
            ]
        );
        $pdo = null;
    }

    public function delete(int $donationId): void
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("DELETE FROM donations WHERE id = ?");
        $stmt->execute([$donationId]);
        $pdo = null;
    }
}
