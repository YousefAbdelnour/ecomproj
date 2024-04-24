<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=18">
    <title>Edit Profile</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Edit Profile</h1>
        <h2>Change in life? Change it here! </h2>
    </div>
    <form id="profile_edit_form" method="POST" action="">
        <div class="form_column">
            <label for="editName">Name</label>
            <input type="text" placeholder="First Last" id="editName" name="editName">
        </div>
        <div class="form_column">
            <label for="editPhoneNumber">Phone Number</label>
            <input type="password" placeholder="xxxxxxxxxx" id="editPhoneNumber" name="editPhoneNumber">
        </div>
        <div class="createButtons">
            <input type="submit" value="Edit">
        </div>
    </form>
</body>

</html>