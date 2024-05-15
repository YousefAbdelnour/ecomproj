<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Send Message</title>
</head>

<body>
    <?php
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
        include('app/views/navbarAdmin.php');
    } else {
        include('app/views/navbarMaid.php');
    }
    ?>
    <div class="title_div">
        <h1><?=__('Send Message')?></h1>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
        <?php if (isset($error)) : ?>
            <div class="error_message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form id="book_form" method="POST" action="/Message/sendMessageFromAccount">
            <div class="form-row">
                <div class="form-group">
                    <label for="receiver"><?=__('To:')?></label>
                    <select id="receiver" name="receiver">
                        <?php foreach ($relatedAccounts as $account) : ?>
                            <option value="<?= htmlspecialchars($account->AccountId) ?>" <?= isset($selectedReceiver) && $selectedReceiver == $account->AccountId ? 'selected' : '' ?>>
                                <?= htmlspecialchars($account->Username) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="title"><?=__('Title')?></label>
                    <input type="text" id="title" name="title" required>
                </div>
            </div>
            <div id="textarea_div">
                <label for="dsc"><?=__('Description')?></label><br><br>
                <textarea id="dsc" name="dsc" required></textarea>
            </div>
            <input type="submit" value="Send" class="submit-button">
        </form>
    </div>
</body>

</html>