<?php
// Include necessary files and initialize CharityController if needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the charity_id and other properties from the POST data
    $charityId = $_POST['charity_id'];
    $charityName = $_POST['charity_name'];
    $charityRepresentativeEmail = $_POST['charity_representative_email'];
    include_once '../../views/updateCharityView.php';
    exit();
}
