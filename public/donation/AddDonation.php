<?php

require_once __DIR__ . '/../../controller/DonationController.php';
use controller\DonationController;

require_once __DIR__ . '/../../models/Donation.php';
use models\Donation;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donorName = $_POST['donor_name'];
    $donationAmount = $_POST['donation_amount'];
    $charityId = $_POST['charity_id'];
    $donationDate = $_POST['donation_date'];

    $donationController = new DonationController();

    $donation = new Donation();
    $donation->setDonorName($donorName);
    $donation->setAmount($donationAmount);
    $donation->setCharityId($charityId);
    $donation->setDateTime($donationDate);

    $donationController->create($donation);

    header("Location: ../../public/index.php");
    exit();
}
