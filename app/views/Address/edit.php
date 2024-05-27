<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __("Edit Address") ?></title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?= __("Edit Address") ?></h1>
        <h2><?= __("Update your address details!") ?></h2>
    </div>
    <div class="divider"></div>
    <form id="address_add_form" method="POST" action="">
        <div class="form_column">
            <label for="addCountry"><?= __("Country") ?></label>
            <input type="text" id="addCountry" name="addCountry" value="<?= htmlspecialchars($address->Country) ?>">
        </div>
        <div class="form_column">
            <label for="addState"><?= __("State") ?></label>
            <input type="text" id="addState" name="addState" value="<?= htmlspecialchars($address->State) ?>">
        </div>
        <div class="form_column">
            <label for="addStreet"><?= __("Street") ?></label>
            <input type="text" id="addStreet" name="addStreet" value="<?= htmlspecialchars($address->Street_Name) ?>">
        </div>
        <div class="form_column">
            <label for="addResidenceNumber"><?= __("Residence Number") ?></label>
            <input type="text" id="addResidenceNumber" name="addResidenceNumber" value="<?= htmlspecialchars($address->Building_Number) ?>">
        </div>
        <div class="form_column">
            <label for="House_Size"><?= __("House Size") ?></label>
            <input type="number" id="House_Size" name="House_Size" min="1" max="9" required value="<?= htmlspecialchars($address->Size) ?>">
        </div>
        <div class="form_column">
            <label for="addZipCode"><?= __("Zip Code") ?></label>
            <input type="text" id="addZipCode" name="addZipCode" value="<?= htmlspecialchars($address->ZipCode) ?>">
        </div>
        <div class="createButtons">
            <input type="submit" name="action" value="<?= __("Update") ?>">
        </div>
    </form>
</body>

</html>
