<?php
require_once __DIR__ . '/../../controller/DonationController.php';
require_once __DIR__ . '/../../models/Donation.php';
require_once __DIR__ . '/../../database/DatabaseConnection.php';

use database\DatabaseConnection;
use controller\DonationController;
use models\Donation;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donationId = $_POST['donation_id'];
    $newName = $_POST['donation_name'];
    $donationAmount = $_POST['donation_amount'];
    $charityId = (int) $_POST['charity_id'];
    $dataTime = $_POST['donation_date'];

    $databaseConnection = new DatabaseConnection();
    $donationController = new DonationController($databaseConnection);

    $donation = new Donation();
    $donation->setId($donationId);
    $donation->setDonorName($newName);
    $donation->setAmount($donationAmount);
    $donation->setCharityId($charityId);
    $donation->setDateTime($dataTime);

    $donationController->update($donation);

    header("Location: ../../public/index.php");
    exit();
}
