<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __("Address Creation") ?></title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?= __("Address Creation") ?></h1>
        <h2><?= __("Let us make booking easier for you!") ?></h2>
    </div>
    <form id="address_add_form" method="POST" action="">
        <div class="form_column">
            <label for="addCountry"><?= __("Country") ?></label>
            <input type="text" placeholder="<?= __("Canada") ?>" id="addCountry" name="addCountry">
        </div>
        <div class="form_column">
            <label for="addState"><?= __("State") ?></label>
            <input type="text" placeholder="<?= __("Quebec") ?>" id="addState" name="addState">
        </div>
        <div class="form_column">
            <label for="addStreet"><?= __("Street") ?></label>
            <input type="text" placeholder="<?= __("Street name") ?>" id="addStreet" name="addStreet">
        </div>
        <div class="form_column">
            <label for="addResidenceNumber"><?= __("Residence Number") ?></label>
            <input type="text" placeholder="<?= __("000") ?>" id="addResidenceNumber" name="addResidenceNumber">
        </div>
        <div class="form_column">
            <label for="addZipCode"><?= __("Zip Code") ?></label>
            <input type="text" placeholder="<?= __("XXX XXX") ?>" id="addZipCode" name="addZipCode">
        </div>
        <div class="createButtons">
            <input type="submit" value="<?= __("Add") ?>">
        </div>
    </form>

</body>

</html>