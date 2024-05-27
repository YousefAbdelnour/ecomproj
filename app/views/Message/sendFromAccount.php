<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('Send Message') ?></title>
    <script>
        function updateReceiverType() {
            var select = document.getElementById('receiverId');
            var receiverType = select.options[select.selectedIndex].getAttribute('data-type');
            document.getElementById('receiverType').value = receiverType;
        }
    </script>
</head>

<body onload="updateReceiverType()">
    <?php
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
        include('app/views/navbarAdmin.php');
    } else {
        include('app/views/navbarMaid.php');
    }
    ?>
    <div class="title_div">
        <h1><?= __('Send Message') ?></h1>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
        <form id="book_form" method="POST" action="/Message/sendMessageFromAccount">
            <input type="hidden" id="receiverType" name="receiverType" value="<?= htmlspecialchars($receiverType) ?>">
            <div class="form-row">
                <div class="form-group">
                    <label for="receiverId"><?= __('To:') ?></label>
                    <select id="receiverId" name="receiverId" onchange="updateReceiverType()">
                        <optgroup label="<?= __('Accounts') ?>">
                            <?php foreach ($relatedAccounts as $account) : ?>
                                <option value="<?= htmlspecialchars($account->AccountId) ?>" data-type="0" <?= isset($selectedReceiver) && $selectedReceiver == $account->AccountId && $receiverType == 0 ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($account->Username) ?>
                                </option>
                            <?php endforeach; ?>
                        </optgroup>
                        <?php if (!empty($customers)) : ?>
                            <optgroup label="<?= __('Customers') ?>">
                                <?php foreach ($customers as $customer) : ?>
                                    <option value="<?= htmlspecialchars($customer->CustomerId) ?>" data-type="1" <?= isset($selectedReceiver) && $selectedReceiver == $customer->CustomerId && $receiverType == 1 ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($customer->Username) ?>
                                    </option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endif; ?>
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
                <textarea id="dsc" name="dsc" minlength="10" required></textarea>
            </div>
            <input type="submit" value="<?= __('Send') ?>" class="submit-button">
        </form>
    </div>
</body>

</html>