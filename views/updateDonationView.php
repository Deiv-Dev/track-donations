<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Donation</title>
</head>

<body>
    <h1>Update Donation</h1>
    <form id="updateDonationForm" method="post" action="../donation/UpdateDonation.php">
        <input type="hidden" name="donation_id" value="<?php echo $donationId; ?>">

        <label for="donation_name">Donor name:</label>
        <input type="string" name="donation_name" required value="<?php echo $donationName; ?>">

        <label for="donation_amount">Donation Amount:</label>
        <input type="number" name="donation_amount" required value="<?php echo $donationAmount; ?>">

        <label for="charity_id">Charity</label>
        <select name="charity_id" required>
            <?php foreach ($charities as $charity): ?>
                <option value="
                <?php echo $charity->id; ?>" <?php echo ($charity->id == $charityName) ? 'selected' : ''; ?>>
                    <?php echo $charity->name; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="donation_date">Donation Date:</label>
        <?php
        $dateTime = new DateTime($donationDate);
        $formattedDate = $dateTime->format('Y-m-d');
        ?>
        <input type="date" name="donation_date" required value="<?php echo $formattedDate; ?>">

        <button type="submit">Update Donation</button>
    </form>
</body>

</html>