<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Sent Successfully</title>
</head>
<body>
    <h1>Message Sent Successfully</h1>
    <p>Your message has been sent successfully!</p>
    <h2>Message Details:</h2>
    <ul>
        <li><strong>Sender ID:</strong> <?php echo htmlspecialchars($message->SenderId); ?></li>
        <li><strong>Receiver ID:</strong> <?php echo htmlspecialchars($message->ReceiverId); ?></li>
        <li><strong>Title:</strong> <?php echo htmlspecialchars($message->Title); ?></li>
        <li><strong>Message:</strong> <?php echo htmlspecialchars($message->Message_Text); ?></li>
        <!-- Add more details here as needed -->
    </ul>
</body>
</html>