<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Register</title>
</head>
<?php
// Available languages
$supportedLocales = ['fr', 'en'];

// Current locale
$locale = $_COOKIE['lang'] ?? 'fr';
?>

<body>
    <div class="title_div">
        <h1><?= __('Register') ?></h1>
        <h2><?= __('Already Register?') ?> <a href="login"><?= __('Login') ?></a> </h2>
    </div>
    <form id="register_form" method="POST" action="">
        <div class="form_column">
            <label for="usernameReg"><?= __('Username') ?></label>
            <input type="text" placeholder="DonutMan" id="usernameReg" name="usernameReg" minlength="4" maxlength="25" required>
        </div>
        <div class="form_column">
            <label for="passwordReg"><?= __('Password') ?></label>
            <input type="password" placeholder="Password" id="passwordReg" name="passwordReg" minlength="6" maxlength="30" required>
        </div>
        <div class="form_column">
            <label for="passwordConfirm"><?= __('Retype Password') ?></label>
            <input type="password" placeholder="Password" id="passwordConfirm" name="passwordConfirm" minlength="6" maxlength="30" required>
        </div>
        <div class="form_column">
            <p><?php if (!empty($error)) : echo __($error);
                endif; ?></p>
        </div>
        <input type="submit" name="action" value="Sign-Up">
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