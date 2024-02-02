<?php
require_once __DIR__ . '/../controller/CharityController.php';
require_once __DIR__ . '/../models/Charity.php';
use controller\CharityController;
use models\Charity;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
        die('Error uploading file.');
    }

    $allowedTypes = ['text/csv', 'application/vnd.ms-excel'];
    if (!in_array($_FILES['csv_file']['type'], $allowedTypes)) {
        die('Invalid file type. Please upload a CSV file.');
    }

    $tempFilePath = $_FILES['csv_file']['tmp_name'];

    $handle = fopen($tempFilePath, 'r');
    if ($handle !== false) {
        $charityController = new CharityController();

        $skipHeader = true;

        while (($data = fgetcsv($handle)) !== false) {
            if ($skipHeader) {
                $skipHeader = false;
                continue;
            }

            $name = $data[0];
            $email = $data[1];

            if (!empty($name) && !empty($email)) {
                $charity = new Charity();
                $charity->setName($name);
                $charity->setRepresentativeEmail($email);

                $charityController->create($charity);

                echo "Added charity: $name, $email<br>";
            }
        }

        fclose($handle);

        unlink($tempFilePath);

        header("Location: index.php");
        exit();
    } else {
        die('Error opening file.');
    }
}