<?php

require_once __DIR__ . '/../../controller/CharityController.php';
use controller\CharityController;

$charityController = new CharityController();
$charities = $charityController->getAllCharities();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donationId = $_POST['donation_id'];
    $donationName = $_POST['donation_name'];
    $donationAmount = $_POST['donation_amount'];
    $charityName = $_POST['charity_name'];
    $donationDate = $_POST['donation_date'];

    include_once '../../views/updateDonationView.php';
    exit();
}
