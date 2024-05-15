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
        <h1><?=__('Service Booking')?></h1>
        <h2><?=__('Ready to serve')?></h2>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
        <form id="book_form" method="POST" action="/Job/book">
            <div class="form-row">
                <div class="form-group">
                    <label for="address"><?=__('Address')?></label>
                    <select id="address" name="address" required>
                        <?php if (!empty($addresses)) : ?>
                            <?php foreach ($addresses as $address) : ?>
                                <option value="<?php echo $address->AddressId; ?>">
                                    <?php echo htmlspecialchars($address->Building_Number . ' ' . $address->Street_Name . ', ' . $address->State); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value=""><?=__('No addresses available')?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="House_Size"><?=__('House size (in sq ft)')?></label>
                    <input type="number" id="House_Size" name="House_Size" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="maid"><?=__('Maid ID (Optional)')?></label>
                    <input type="text" id="maid" name="maid"> <!-- Removed 'required' attribute -->
                </div>
                <div class="form-group">
                    <label for="spots"><?=__('Number of Maids Required')?></label>
                    <input type="number" id="spots" name="spots" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date"><?=__('Date and Time')?></label>
                    <input type="datetime-local" id="date" name="date" required>
                </div>
            </div>
            <div id="textarea_div">
                <label for="dsc"><?=__('Description')?></label><br><br>
                <textarea id="dsc" name="dsc" required></textarea>
            </div>
            <input type="submit" value="Book" class="submit-button">
        </form>
    </div>
</body>

</html>