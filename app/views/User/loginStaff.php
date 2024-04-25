<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Login Staff</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Login Staff</h1>
        <h2>Not registered? <a href="registerAdmin">Sign up</a> </h2>
    </div>
    <form id="login_form" method="POST" action="loginStaff">
        <div class="form_column">
            <label for="usernameLogin">Username</label>
            <input type="text" placeholder="DonutMan" id="usernameLogin" name="usernameLogin">
        </div>
        <div class="form_column">
            <label for="passwordLogin">Password</label>
            <input type="password" placeholder="Password" id="passwordLogin" name="passwordLogin">
        </div>
        <p><a href="">Forgot password?</a>
        <p>
        <p><a href="loginCustomer">Not a staff member?</a>
        <p>
            <input type="submit" value="Log in">
    </form>
</body>

</html>