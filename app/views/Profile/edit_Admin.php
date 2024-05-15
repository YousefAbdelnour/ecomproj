<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=18">
    <title>Edit Profile</title>
</head>

<body>
    <?php include('app/views/navbarAdmin.php'); ?>
    <div class="title_div">
        <h1><?=__('Edit Profile')?></h1>
        <h2><?=__('Change in life? Change it here!')?></h2>
    </div>
    <form id="profile_edit_form" method="POST" action="">
        <div class="form-container">
            <div class="form-group">
                <label for="editName"><?=__('Name')?></label>
                <input type="text" placeholder="First Last" id="editName" name="editName" value="<?php echo isset($data['account_profile']) ? htmlspecialchars($data['account_profile']->Name) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="editPhoneNumber"><?=__('Phone Number')?></label>
                <input type="text" placeholder="123-456-7890" id="editPhoneNumber" name="editPhoneNumber" value="<?php echo isset($data['account_profile']) ? htmlspecialchars($data['account_profile']->Phone_Number) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>

</body>

</html>