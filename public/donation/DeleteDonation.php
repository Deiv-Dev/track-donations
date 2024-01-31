<?php

require_once __DIR__ . '/../../controller/DonationController.php';
use controller\DonationController;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donation_id"])) {
    $donationId = $_POST["donation_id"];

    $donationController = new DonationController();
    $donationController->delete($donationId);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
