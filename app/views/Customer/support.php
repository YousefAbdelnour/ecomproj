<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Support</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Contact Us</h1>
        <h2>We are here for you!</h2>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
    <form id="book_form" method="POST" action="/Message/create">
        <div class="form-row">
            <div class="form-group">
                <label for="receiver">To:</label>
                <select id="receiver" name="receiver">
                    <?php foreach ($relatedAccounts as $account) : ?>
                        <option value="<?php echo htmlspecialchars($account->AccountId); ?>"><?php echo htmlspecialchars($account->Username); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title">
            </div>
        </div>
        <div id="textarea_div">
            <label for="dsc">Description</label><br><br>
            <textarea id="dsc" name="dsc" required></textarea>
        </div>
        <input type="submit" value="Send" class="submit-button">
    </form>
</div>

</body>

</html>