<?php

require_once __DIR__ . '/../../controller/CharityController.php';
require_once __DIR__ . '/../../database/DatabaseConnection.php';

use database\DatabaseConnection;
use controller\CharityController;

$databaseConnection = new DatabaseConnection();
$charityController = new CharityController($databaseConnection);
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
