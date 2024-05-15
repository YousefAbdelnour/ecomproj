<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=18">
    <title>Received Messages</title>
</head>
<body>
    <?php
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
        include('app/views/navbarAdmin.php');
    } else {
        include('app/views/navbarMaid.php');
    }
    ?>
    <h1>Received Messages</h1>
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
                        <form method="POST" action="/Message/sendMessageFromAccount">
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
