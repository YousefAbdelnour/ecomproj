<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Received Messages - Account</title>
</head>

<body>
    <?php include('app/views/navbarAdmin.php'); ?>
    <div class="title_div">
        <h1>Received Messages</h1>
    </div>
    <div class="divider"></div>
    <div id="message_list_div">
        <?php if (!empty($messages)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Sender</th>
                        <th>Timestamp</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message) : ?>
                        <tr>
                            <td><?= htmlspecialchars($message->Title) ?>                    <?php var_dump($data);?>
</td>
                            <td><?= htmlspecialchars($message->Message_Text) ?></td>
                            <td><?= htmlspecialchars($message->SenderUsername) ?></td>
                            <td><?= htmlspecialchars($message->TimeStamp) ?></td>
                            <td>
                                <form method="POST" action="/Message/sendMessageFromAccount">
                                    <input type="hidden" name="receiverId" value="<?= htmlspecialchars($message->SenderId) ?>">
                                    <button type="submit">Reply</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No messages received.</p>
        <?php endif; ?>
    </div>
</body>

</html>