<?php
// DeleteDonation.php

require_once __DIR__ . '/../../controller/DonationController.php';
use controller\DonationController;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donation_id"])) {

    $donationId = $_POST["donation_id"];

    $donationController = new DonationController();

    $donation = $donationController->read($donationId);

    $donationController->delete($donationId);

    header("Location: ../index.php");
    exit();
}

