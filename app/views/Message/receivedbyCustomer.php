<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('Received Messages - Customer') ?></title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?= __('Received Messages') ?></h1>
    </div>
    <div class="divider"></div>
    <div id="message_list_div">
        <?php if (!empty($messages)) : ?>
            <table>
                <thead>
                    <tr>
                        <th><?= __('Title') ?></th>
                        <th><?= __('Message') ?></th>
                        <th><?= __('Sender') ?></th>
                        <th><?= __('Timestamp') ?></th>
                        <th><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message) : ?>
                        <tr>
                            <td><?= htmlspecialchars($message->Title) ?></td>
                            <td><?= htmlspecialchars($message->Message_Text) ?></td>
                            <td>
                                <?php
                                if ($message->SenderType == 0) {
                                    // Fetch from Account table
                                    $accountModel = new \app\models\Account();
                                    $accountModel->AccountId = $message->SenderId;
                                    $sender = $accountModel->getById();
                                    echo htmlspecialchars($sender ? $sender->Username : 'Unknown');
                                } else {
                                    // Fetch from Customer table
                                    $customerModel = new \app\models\Customer();
                                    $customerModel->CustomerId = $message->SenderId;
                                    $sender = $customerModel->getById();
                                    echo htmlspecialchars($sender ? $sender->Username : 'Unknown');
                                }
                                ?>
                            </td>
                            <td><?= htmlspecialchars($message->TimeStamp) ?></td>
                            <td>
                                <form method="POST" action="/Message/support">
                                    <input type="hidden" name="receiverId" value="<?= htmlspecialchars($message->SenderId) ?>">
                                    <button type="submit"><?= __('Reply') ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p><?= __('No messages received.') ?></p>
        <?php endif; ?>
    </div>
</body>

</html>