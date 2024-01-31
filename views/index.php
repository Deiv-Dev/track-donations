<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charities List</title>
    <link rel="stylesheet" href="../public/index.css">
</head>

<body>
    <h1>Charities List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($charities as $charity): ?>
                <tr>
                    <td>
                        <?php echo $charity->name; ?>
                    </td>
                    <td>
                        <?php echo $charity->representative_email; ?>
                    </td>
                    <td>
                        <form class="delete-charity-form" method="post" action="../public/charity/DeleteCharity.php">
                            <input type="hidden" name="charity_id" value="<?php echo $charity->id; ?>">
                            <button type="button" onclick="deleteCharity(this)">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="../public/charity/UpdateCharityView.php">
                            <input type="hidden" name="charity_id" value="<?php echo $charity->id; ?>">
                            <input type="hidden" name="charity_name" value="<?php echo $charity->name; ?>">
                            <input type="hidden" name="charity_representative_email"
                                value="<?php echo $charity->representative_email; ?>">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h1>Donations List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Charity Name</th>
                <th>Date Time</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donations as $donation): ?>
                <tr>
                    <td>
                        <?php echo $donation->donor_name; ?>
                    </td>
                    <td>
                        <?php echo $donation->amount; ?>
                    </td>
                    <td>
                        <?php echo $charityController->read($donation->charity_id)['name']; ?>
                    </td>
                    <td>
                        <?php echo $donation->date_time; ?>
                    </td>
                    <td>
                        <form class="delete-donation-form" method="post" action="../public/donation/DeleteDonation.php">
                            <input type="hidden" name="donation_id" value="<?php echo $donation->id; ?>">
                            <button type="button" onclick="deleteDonation(this)">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="../public/donation/UpdateDonationView.php">
                            <input type="hidden" name="donation_id" value="<?php echo $donation->id; ?>">
                            <input type="hidden" name="donation_name" value="<?php echo $donation->donor_name; ?>">
                            <input type="hidden" name="donation_amount" value="<?php echo $donation->amount; ?>">
                            <input type="hidden" name="charity_name"
                                value="<?php echo $charityController->read($donation->charity_id)['name']; ?>">
                            <input type="hidden" name="donation_date" value="<?php echo $donation->date_time; ?>">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<script src="../public/index.js"></script>

</html>