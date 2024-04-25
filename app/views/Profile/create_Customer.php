<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Create Profile</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Profile Creation</h1>
        <h2>Describe yourself! Don't be shy! </h2>
    </div>
    <form id="profile_create_form" method="POST" action="">
        <div class="form_column">
            <label for="createName">Name</label>
            <input type="text" placeholder="First Last" id="createName" name="createName">
        </div>
        <div class="form_column">
            <label for="createPhoneNumber">Phone Number</label>
            <input type="password" placeholder="xxxxxxxxxx" id="createPhoneNumber" name="createPhoneNumber">
        </div>
        <div class="createButtons">
            <br>
            <input type="submit" value="Create">
        </div>
    </form>
</body>

</html>