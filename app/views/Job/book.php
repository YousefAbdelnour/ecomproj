<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Service Booking</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Service Booking</h1>
        <h2>Ready to serve</h2>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
        <form id="book_form" method="POST" action="/Job/book">
            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <select id="address" name="address" required>
                        <?php if (!empty($addresses)) : ?>
                            <?php foreach ($addresses as $address) : ?>
                                <option value="<?php echo $address->AddressId; ?>">
                                    <?php echo htmlspecialchars($address->Building_Number . ' ' . $address->Street_Name . ', ' . $address->State); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="">No addresses available</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="House_Size">House size (in sq ft)</label>
                    <input type="number" id="House_Size" name="House_Size" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="maid">Maid ID (Optional)</label>
                    <input type="text" id="maid" name="maid"> <!-- Removed 'required' attribute -->
                </div>
                <div class="form-group">
                    <label for="spots">Number of Maids Required</label>
                    <input type="number" id="spots" name="spots" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date">Date and Time</label>
                    <input type="datetime-local" id="date" name="date" required>
                </div>
            </div>
            <div id="textarea_div">
                <label for="dsc">Description</label><br><br>
                <textarea id="dsc" name="dsc" required></textarea>
            </div>
            <input type="submit" value="Book" class="submit-button">
        </form>
    </div>
</body>

</html>