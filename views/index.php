<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charities List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
                        <p>Delete</p>
                    </td>
                    <td>
                        <p>update</p>
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
                <th>Email</th>
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
                        <form method="post" action="../public/donation/DeleteDonation.php">
                            <input type="hidden" name="donation_id" value="<?php echo $donation->id; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <p>update</p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>