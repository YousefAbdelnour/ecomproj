<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Login Staff</title>
</head>

<body>
    <div class="title_div">
        <h1>Login Staff</h1>
        <h2>Not registered? <a href="/User/registerAccount">Sign up</a> </h2>

    </div>
    <form id="login_form" method="POST" action="/User/loginStaff">
        <?php if (isset($data['error'])) : ?>
            <p style="color: red;"><?php echo $data['error']; ?></p>
        <?php endif; ?>
        <div class="form_column">
            <label for="usernameLogin">Username</label>
            <input type="text" placeholder="DonutMan" id="usernameLogin" name="usernameLogin" required>
        </div>
        <div class="form_column">
            <label for="passwordLogin">Password</label>
            <input type="password" placeholder="Password" id="passwordLogin" name="passwordLogin" required>
        </div>
        <p><a href="#">Forgot password?</a></p>
        <p><a href="/User/login">Not a staff member?</a></p>
        <input type="submit" value="Log in">
    </form>
</body>

</html>