<?php


require_once __DIR__ . '/../../controller/DonationController.php';
require_once __DIR__ . '/../../models/Donation.php';
require_once __DIR__ . '/../../database/DatabaseConnection.php';

use database\DatabaseConnection;
use controller\DonationController;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donation_id"])) {
    $donationId = $_POST["donation_id"];

    $databaseConnection = new DatabaseConnection();
    $donationController = new DonationController($databaseConnection);
    $donationController->delete($donationId);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
