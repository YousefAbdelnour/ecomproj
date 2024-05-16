<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('2FA Setup') ?></title>
</head>

<body>
    <img height=300 width=300 src="<?= $QRCode ?>">
    <p><?= __('Scan the above QR-code with your mobile Authenticator app, such as Google Authenticator. The authenticator app will generate codes that are valid for 30 seconds only. Enter such a code and submit it while it is
        still valid to apply the 2-factor authentication protection to your account.') ?></p>
    <form method="post" action="">
        <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
        <input type="hidden" name="userType" value="<?= htmlspecialchars($userType) ?>">
        <label><?= __('Current code:') ?><input type="text" name="totp" /></label>
        <input type="submit" name="action" value="<?= __('Verify code') ?>" />
    </form>
</body>

</html>