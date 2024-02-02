<?php

namespace database\seeders;

require_once 'CharitySeeder.php';
require_once 'DonationSeeder.php';
require_once __DIR__ . '/../DatabaseConnection.php';
require_once __DIR__ . '/../../models/Charity.php';
require_once __DIR__ . '/../../models/Donation.php';
require_once __DIR__ . '/../../helpers/GenerateRandomDate.php';


use database\DatabaseConnection;
use models\Charity;
use models\Donation;
use helpers\GenerateRandomDate;

// Create instances of dependencies
$databaseConnection = new DatabaseConnection();
$charityModel = new Charity();
$donationModel = new Donation();
$generateRandomDate = new GenerateRandomDate();

// Run Charity Seeder
echo "Running Charity Seeder...\n";
$charitySeeder = new CharitySeeder($databaseConnection, $charityModel);
$charitySeeder->seed();
echo "Charity Seeder completed.\n\n";

// Run Donation Seeder
echo "Running Donation Seeder...\n";
$donationSeeder = new DonationSeeder($databaseConnection, $donationModel, $generateRandomDate);
$donationSeeder->seed();
echo "Donation Seeder completed.\n\n";

echo "Seeders completed successfully.\n";
