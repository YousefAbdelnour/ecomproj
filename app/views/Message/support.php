<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('Support') ?></title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?= __('Contact Us') ?></h1>
        <h2><?= __('We are here for you!') ?></h2>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
        <form id="book_form" method="POST" action="/Message/support">
            <div class="form-row">
                <div class="form-group">
                    <label for="receiver"><?= __('To:') ?></label>
                    <select id="receiver" name="receiver">
                        <?php foreach ($relatedAccounts as $account) : ?>
                            <option value="<?php echo htmlspecialchars($account->AccountId); ?>">
                                <?php echo htmlspecialchars($account->Username); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="title"><?= __('Title') ?></label>
                    <input type="text" id="title" name="title" required>
                </div>
            </div>
            <div id="textarea_div">
                <label for="dsc"><?= __('Description') ?></label><br><br>
                <textarea id="dsc" name="dsc" required></textarea>
            </div>
            <input type="submit" value="<?= __('Send') ?>" class="submit-button">
        </form>
    </div>
</body>

</html>