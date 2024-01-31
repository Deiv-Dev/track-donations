<?php
require_once __DIR__ . '/../../controller/DonationController.php';
use controller\DonationController;

require_once __DIR__ . '/../../models/Donation.php';
use models\Donation;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donationId = $_POST['donation_id'];
    $newName = $_POST['donation_name'];
    $donationAmount = $_POST['donation_amount'];
    $charityId = (int) $_POST['charity_id'];
    $dataTime = $_POST['donation_date'];

    $donationController = new DonationController();

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
