<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Charity</title>
</head>

<body>
    <h1>Update Charity</h1>
    <form id="updateCharityForm" method="post" action="../charity/UpdateCharity.php">
        <input type="hidden" name="charity_id" value="<?php echo $charityId; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required value="<?php echo $charityName; ?>">
        <label for="representative_email">Representative Email:</label>
        <input type="email" name="representative_email" required value="<?php echo $charityRepresentativeEmail; ?>">
        <button type=" submit">Update Charity</button>
    </form>
</body>

</html>