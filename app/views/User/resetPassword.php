<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('Reset Password') ?></title>
</head>

<body>
    <div class="title_div">
        <h1><?= __('Reset Password') ?></h1>
    </div>
    <form method="POST" action="/User/resetPassword">
        <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
        <input type="hidden" name="userType" value="<?= htmlspecialchars($userType) ?>">
        <div class="form_column">
            <label for="new_password"><?= __('New Password') ?></label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <div class="form_column">
            <label for="confirm_password"><?= __('Confirm Password') ?></label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <input type="submit" value="<?= __('Reset Password') ?>">
    </form>
</body>

</html>