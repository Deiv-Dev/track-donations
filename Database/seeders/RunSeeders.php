<?php

namespace database\seeders;

require_once 'CharitySeeder.php';
require_once 'DonationSeeder.php';

// Run Charity Seeder
echo "Running Charity Seeder...\n";
CharitySeeder::seed();
echo "Charity Seeder completed.\n\n";

// Run Donation Seeder
echo "Running Donation Seeder...\n";
DonationSeeder::seed();
echo "Donation Seeder completed.\n\n";

echo "Seeders completed successfully.\n";
