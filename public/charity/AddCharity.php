<?php

require_once __DIR__ . '/../../controller/CharityController.php';
use controller\CharityController;

require_once __DIR__ . '/../../models/Charity.php';
use models\Charity;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newCharityName = $_POST['new_charity_name'];
    $newCharityEmail = $_POST['new_charity_email'];

    $charityController = new CharityController();

    $newCharity = new Charity();
    $newCharity->setName($newCharityName);
    $newCharity->setRepresentativeEmail($newCharityEmail);

    $charityController->create($newCharity);

    header("Location: ../../public/index.php");
    exit();
}