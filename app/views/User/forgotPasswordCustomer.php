<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('Forgot Password - Customer') ?></title>
</head>

<body>
    <div class="title_div">
        <h1><?= __('Forgot Password - Customer') ?></h1>
    </div>
    <form method="POST" action="/User/forgotPasswordCustomer">
        <?php if (isset($data['error'])) : ?>
            <p style="color: red;"><?php echo $data['error']; ?></p>
        <?php endif; ?>
        <div class="form_column">
            <label for="username"><?= __('Username') ?></label>
            <input type="text" id="username" name="username" required>
        </div>
        <input type="submit" value="<?= __('Submit') ?>">
    </form>
</body>

</html>