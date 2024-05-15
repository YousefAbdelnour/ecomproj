<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Register Account</title>
</head>

<body>
    <?php include('app/views/navbarAdmin.php'); ?>
    <div class="title_div">
        <h1>Register Account</h1>
    </div>
    <form id="register_form" method="POST" action="">
        <div class="form_column">
            <label for="usernameReg">Username</label>
            <input type="text" placeholder="Username" id="usernameReg" name="usernameReg">
        </div>
        <div class="form_column">
            <label for="passwordReg">Password</label>
            <input type="password" placeholder="Password" id="passwordReg" name="passwordReg">
        </div>
        <div class="form_column">
            <label for="passwordConfirm">Retype Password</label>
            <input type="password" placeholder="Retype Password" id="passwordConfirm" name="passwordConfirm">
        </div>
        <div class="form_column">
            <label for="isAdmin">Account Type</label>
            <select id="isAdmin" name="isAdmin">
                <option value="no">Staff</option>
                <option value="yes">Admin</option>
            </select>
        </div>
        <input type="submit" value="Register Account">
    </form>
</body>

</html>