<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Address Creation</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Address Creation</h1>
        <h2>Let us make booking easier for you!</h2>
    </div>
    <form id="address_add_form">
        <div class="form_column">
            <label for="addCountry">Country</label>
            <input type="text" placeholder="Canada" id="addCountry" name="addCountry">
        </div>
        <div class="form_column">
            <label for="addState">State</label>
            <input type="text" placeholder="Quebec" id="addState" name="addState">
        </div>
        <div class="form_column">
            <label for="addStreet">Street</label>
            <input type="text" placeholder="Street name" id="addStreet" name="addStreet">
        </div>
        <div class="form_column">
            <label for="addResidenceNumber">Residence Number</label>
            <input type="text" placeholder="000" id="addResidenceNumber" name="addResidenceNumber">
        </div>
        <div class="form_column">
            <label for="addZipCode">Zip Code</label>
            <input type="text" placeholder="XXX XXX" id="addZipCode" name="addZipCode">
        </div>
        <div class="createButtons">
            <input type="submit" value="Add">
        </div>
    </form>
</body>

</html>