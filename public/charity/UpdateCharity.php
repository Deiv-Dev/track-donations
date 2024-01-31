<?php
require_once __DIR__ . '/../../controller/CharityController.php';
use controller\CharityController;

require_once __DIR__ . '/../../models/Charity.php';
use models\Charity;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $charityId = $_POST['charity_id'];
    $newName = $_POST['name'];
    $newRepresentativeEmail = $_POST['representative_email'];

    if (empty($newName) || empty($newRepresentativeEmail)) {
        echo "Invalid input. Name and representative email are required.";
        exit();
    }

    $charityController = new CharityController();

    $charity = new Charity();
    $charity->setId($charityId);
    $charity->setName($newName);
    $charity->setRepresentativeEmail($newRepresentativeEmail);

    $charityController->update($charity);

    header("Location: ../../public/index.php");
    exit();
}
