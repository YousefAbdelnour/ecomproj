<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=20">
    <title>Make a Payment</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Make a Payment</h1>
        <h2>Secure and Fast</h2>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
        <form id="pay_form" method="POST" action="">
            <div class="form-row">
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9101 1121" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Expiry Date</label>
                    <input type="month" id="expiry_date" name="expiry_date" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="number" id="cvv" name="cvv" required>
                </div>
                <div class="form-group">
                    <label for="cardholder_name">Cardholder Name</label>
                    <input type="text" id="cardholder_name" name="cardholder_name" required>
                </div>
            </div>
            <input type="submit" value="Proceed to Pay" class="submit-button">
        </form>
    </div>
</body>

</html>