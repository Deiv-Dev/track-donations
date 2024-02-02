<?php

require_once __DIR__ . '/../../controller/CharityController.php';
require_once __DIR__ . '/../../models/Charity.php';
require_once __DIR__ . '/../../database/DatabaseConnection.php';

use database\DatabaseConnection;
use controller\CharityController;
use models\Charity;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newCharityName = $_POST['new_charity_name'];
    $newCharityEmail = $_POST['new_charity_email'];

    $databaseConnection = new DatabaseConnection();
    $charityController = new CharityController($databaseConnection);

    $newCharity = new Charity();
    $newCharity->setName($newCharityName);
    $newCharity->setRepresentativeEmail($newCharityEmail);

    $charityController->create($newCharity);

    header("Location: ../../public/index.php");
    exit();
}