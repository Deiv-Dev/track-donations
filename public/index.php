<?php

require_once __DIR__ . '/../controller/CharityController.php';
use controller\CharityController;

require_once __DIR__ . '/../controller/DonationController.php';
use controller\DonationController;

require_once __DIR__ . '/../database/DatabaseConnection.php';
use database\DatabaseConnection;

$databaseConnection = new DatabaseConnection();

$charityController = new CharityController($databaseConnection);
$charities = $charityController->getAllCharities();

$donationController = new DonationController($databaseConnection);
$donations = $donationController->getAllDonations();

include_once '../views/index.php';
