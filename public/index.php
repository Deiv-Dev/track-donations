<?php

require_once __DIR__ . '/../controller/CharityController.php';
use controller\CharityController;

require_once __DIR__ . '/../controller/DonationController.php';
use controller\DonationController;

$charityController = new CharityController();
$charities = $charityController->getAllCharities();

$donationController = new DonationController();
$donations = $donationController->getAllDonations();

include_once '../views/index.php';
