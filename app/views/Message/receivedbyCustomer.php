<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Received Messages</title>
</head>
<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Received Messages</h1>
    </div>
    <div class="divider"></div>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Message Text</th>
                <th>Sender</th>
                <th>TimeStamp</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message) : ?>
                <tr>
                    <td><?= htmlspecialchars($message->Title) ?></td>
                    <td><?= htmlspecialchars($message->Message_Text) ?></td>
                    <td><?= htmlspecialchars($message->SenderUsername) ?></td>
                    <td><?= htmlspecialchars($message->TimeStamp) ?></td>
                    <td>
                        <form method="POST" action="/Message/support">
                            <input type="hidden" name="receiverId" value="<?= htmlspecialchars($message->SenderId) ?>">
                            <button type="submit">Reply</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
