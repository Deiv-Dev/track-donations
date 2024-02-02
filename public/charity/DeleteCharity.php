<?php


require_once __DIR__ . '/../../controller/CharityController.php';
require_once __DIR__ . '/../../database/DatabaseConnection.php';

use database\DatabaseConnection;
use controller\CharityController;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["charity_id"])) {
    $charityId = $_POST["charity_id"];

    $databaseConnection = new DatabaseConnection();
    $charityController = new CharityController($databaseConnection);
    $charityController->delete($charityId);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
