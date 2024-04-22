<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=1">
    <title>Register up</title>
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="title_div">
        <h1>Register</h1>
        <h2>Already Register? <a href="">Login</a> </h2>
    </div>
    <form>
        <div class="form_column">
        <label for="usernameReg">Username</label>
        <input type="text" placeholder="DonutMan" id="usernameReg" name="usernameReg">
        </div>
        <div class="form_column">
        <label for="passwordReg">Password</label>
        <input type="password" placeholder="password" id="passwordReg" name="passwordReg">
        </div>
        <div class="form_column">
        <label for="passwordConfirm">Retype Password</label>
        <input type="password" placeholder="password" id="passwordConfirm" name="passwordConfirm">
        </div>
        <div class="form_column">
        <label for="accountType">Account Type</label>
        <input type="password" placeholder="account" id="accountType" name="accountType">
        </div>
        <input type="submit" value="Sign-Up">
    </form>
</body>

</html>