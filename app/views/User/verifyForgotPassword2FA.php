<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('Verify 2FA') ?></title>
</head>

<body>
    <h1>Verify 2FA</h1>
    <?php if (isset($data['error'])) : ?>
        <p style="color: red;"><?= htmlspecialchars($data['error']) ?></p>
    <?php endif; ?>
    <form method="POST" action="/User/verifyForgotPassword2FA">
        <label for="totp"><?= __('TOTP Code:') ?></label>
        <input type="text" id="totp" name="totp" required>
        <button type="submit"><?= __('Verify') ?></button>
    </form>
</body>

</html>