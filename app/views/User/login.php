<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=1">
    <title>Login</title>
</head>
<?php
// Available languages

use function PHPUnit\Framework\isEmpty;

$supportedLocales = ['fr', 'en'];

// Current locale
$locale = $_COOKIE['lang'] ?? 'fr';
?>

<body>
    <div class="title_div">
        <h1><?= __('Login') ?></h1>
        <h2><?= __('Not registered?') ?> <a href="registerCustomer"><?= __('Sign up') ?></a> </h2>
    </div>
    <form id="login_form" method="POST" action="">
        <div class="form_column">
            <label for="usernameLogin"><?= __('Username') ?></label>
            <input type="text" placeholder="DonutMan" id="usernameLogin" name="usernameLogin">
        </div>
        <div class="form_column">
            <label for="passwordLogin"><?= __('Password') ?></label>
            <input type="password" placeholder="Password" id="passwordLogin" name="passwordLogin">
        </div>
        <div class="form_column">
            <?php if (!empty($error)) : ?>
                <p><?= __(htmlspecialchars($error)) ?></p>
            <?php endif; ?>
        </div>
        <p><a href="/User/forgotPasswordCustomer"><?= __('Forgot password?') ?></a></p>
        <p>
        <p><a href="/User/loginStaff"><?= __('Staff member?') ?></a>
        <p>
            <input type="submit" name="action" value="Log in">
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