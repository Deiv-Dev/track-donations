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
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("UPDATE charities SET name = ?, representative_email = ? WHERE id = ?");
        $stmt->execute([$charity->getName(), $charity->getRepresentativeEmail(), $charity->getId()]);
        $pdo = null;
    }

    public function delete(int $charityId): void
    {
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("DELETE FROM charities WHERE id = ?");
        $stmt->execute([$charityId]);
        $pdo = null;
    }
}
