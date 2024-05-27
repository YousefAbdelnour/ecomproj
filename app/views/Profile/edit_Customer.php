<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=18">
    <title><?= __('Edit Profile') ?></title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?= __('Edit Profile') ?></h1>
        <h2><?= __('Change in life? Change it here!') ?></h2>
    </div>
    <form id="profile_edit_form" method="POST" onsubmit="return checkPhoneNumber()" action="">
        <div class="form-container">
            <div class="form-group">
                <label for="editName"><?= __('Name') ?></label>
                <input type="text" placeholder="First Last" id="editName" minlength="4" maxlength="60" required name="editName" require value="<?php echo isset($data['customer_profile']) ? htmlspecialchars($data['customer_profile']->Name) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="editPhoneNumber"><?= __('Phone Number') ?></label>
                <input type="text" placeholder="123-456-7890" id="editPhoneNumber" minlength="12" maxlength="12" required name="editPhoneNumber" value="<?php echo isset($data['customer_profile']) ? htmlspecialchars($data['customer_profile']->Phone_Number) : ''; ?>" oninput="formatPhoneNumber(this)">
            </div>
            <div class="form-group">
                <input type="submit" name="action" value="Submit">
            </div>
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
        const phoneNumber = document.getElementById('editPhoneNumber').value;
        const phoneRegex = /^\d{3}-\d{3}-\d{4}$/;
        if (!phoneRegex.test(phoneNumber)) {
            alert('Please enter a valid phone number in the format 123-456-7890.');
            return false;
        }
        return true;
    }
</script>

</html>