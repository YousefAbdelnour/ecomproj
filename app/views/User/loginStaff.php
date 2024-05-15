<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Login Staff</title>
</head>
<?php
// Available languages
$supportedLocales = ['fr', 'en'];

// Current locale
$locale = $_COOKIE['lang'] ?? 'fr';
?>

<body>
    <div class="title_div">
        <h1><?=__('Login Staff')?></h1>
        <h2><?=__('Not registered? Contact an admin!')?></h2>

    </div>
    <form id="login_form" method="POST" action="/User/loginStaff">
        <?php if (isset($data['error'])) : ?>
            <p style="color: red;"><?php echo $data['error']; ?></p>
        <?php endif; ?>
        <div class="form_column">
            <label for="usernameLogin"><?=__('Username')?></label>
            <input type="text" placeholder="DonutMan" id="usernameLogin" name="usernameLogin" required>
        </div>
        <div class="form_column">
            <label for="passwordLogin"><?=__('Password')?></label>
            <input type="password" placeholder="Password" id="passwordLogin" name="passwordLogin" required>
        </div>
        <p><a href="#"><?=__('Forgot password?')?></a></p>
        <p><a href="/User/login"><?=__('Not a staff member?')?></a></p>
        <input type="submit" value="Log in">
    </form>
    <li>
        <form action="/setLanguage.php" method="POST" id="language-form">
            <select name="language" onchange="document.getElementById('language-form').submit()">
                <?php foreach ($supportedLocales as $lang) : ?>
                    <option value="<?php echo $lang; ?>" <?php echo $lang === $locale ? 'selected' : ''; ?>>
                        <?php echo strtoupper($lang); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </li>
</body>

</html>