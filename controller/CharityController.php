<?php

namespace controller;

require_once __DIR__ . '/../database/DatabaseConnection.php';
use database\DatabaseConnection;

require_once __DIR__ . '/../models/Charity.php';
use models\Charity;


class CharityController
{
    public function create(Charity $charity): void
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("INSERT INTO charities (name, representative_email) VALUES (?, ?)");
        $stmt->execute([$charity->getName(), $charity->getRepresentativeEmail()]);
        $pdo = null;
    }

    public function getAllCharities(): array
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->query("SELECT * FROM charities");

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function read(int $charityId): array
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM charities WHERE id = ?");
        $stmt->execute([$charityId]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $pdo = null;
        return $result;
    }

    public function update(Charity $charity): void
    {
        try {
            $pdo = DatabaseConnection::getConnection();
            $stmt = $pdo->prepare("UPDATE charities SET name = ?, representative_email = ? WHERE id = ?");
            $stmt->execute([$charity->getName(), $charity->getRepresentativeEmail(), $charity->getId()]);
            $pdo = null;
        } catch (PDOException $e) {
            echo "Error updating charity: " . $e->getMessage();
        }
    }

    public function delete(int $charityId): void
    {
        $pdo = DatabaseConnection::getConnection();

        $stmtDonations = $pdo->prepare("DELETE FROM donations WHERE charity_id = ?");
        $stmtDonations->execute([$charityId]);

        $stmtCharity = $pdo->prepare("DELETE FROM charities WHERE id = ?");
        $stmtCharity->execute([$charityId]);

        $pdo = null;
    }
}
