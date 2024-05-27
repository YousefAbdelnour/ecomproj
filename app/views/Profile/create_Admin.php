<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title><?= __('Create Profile') ?></title>
</head>

<body>
    <?php include('app/views/navbarAdmin.php'); ?>
    <div class="title_div">
        <h1><?= __('Profile Creation') ?></h1>
        <h2><?= __("Describe yourself! Don't be shy!") ?></h2>
    </div>
    <form id="profile_create_form" method="POST" action="">
        <div class="form_column">
            <label for="createName"><?= __('Name') ?></label>
            <input type="text" placeholder="First Last" id="createName" name="createName" onsubmit="return checkPhoneNumber()">
        </div>
        <div class="form_column">
            <label for="createPhoneNumber"><?= __('Phone Number') ?></label>
            <input type="text" placeholder="123-456-7890" id="createPhoneNumber" name="createPhoneNumber" oninput="formatPhoneNumber(this)">
        </div>
        <div class="createButtons">
            <br>
            <input type="submit" value="Create">
        </div>
    </form>
</body>
<script>
    function formatPhoneNumber(input) {
        let value = input.value.replace(/[^\d-]/g, '');
        let numbers = value.replace(/-/g, '');
        if (numbers.length > 10) {
            numbers = numbers.substring(0, 10);
        }
        input.value = numbers.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
    }

    function checkPhoneNumber() {
        const phoneNumber = document.getElementById('createPhoneNumber').value;
        const phoneRegex = /^\d{3}-\d{3}-\d{4}$/;
        if (!phoneRegex.test(phoneNumber)) {
            alert('Please enter a valid phone number in the format 123-456-7890.');
            return false;
        }
        return true;
    }
</script>

</html>