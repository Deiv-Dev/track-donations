<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $charityId = $_POST['charity_id'];
    $charityName = $_POST['charity_name'];
    $charityRepresentativeEmail = $_POST['charity_representative_email'];
    include_once '../../views/updateCharityView.php';
    exit();
}
