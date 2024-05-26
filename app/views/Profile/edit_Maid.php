<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=18">
    <title><?= __('Edit Profile') ?></title>
</head>

<body>
    <?php include('app/views/navbarMaid.php'); ?>
    <div class="title_div">
        <h1><?= __('Edit Profile') ?></h1>
        <h2><?= __('Change in life? Change it here!') ?></h2>
    </div>
    <form id="profile_edit_form" method="POST" action="">
        <div class="form_column">
            <label for="editName"><?= __('Name') ?></label>
            <input type="text" placeholder="First Last" id="editName" name="editName">
        </div>
        <div class="form_column">
            <label for="editPhoneNumber"><?= __('Phone Number') ?></label>
            <input type="text" placeholder="xxxxxxxxxx" id="editPhoneNumber" name="editPhoneNumber">
        </div>
        <div class="createButtons">
            <input type="submit" value="Edit">
        </div>
    </form>
</body>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const phoneInputFields = document.querySelectorAll('input[name="createPhoneNumber"], input[name="editPhoneNumber"]');

        phoneInputFields.forEach((field) => {
            field.addEventListener('input', function() {
                const input = this.value.replace(/\D/g, '').substring(0, 10); // First ten digits only
                const areaCode = input.substring(0, 3);
                const middle = input.substring(3, 6);
                const last = input.substring(6, 10);
                if (input.length > 6) {
                    this.value = `${areaCode}-${middle}-${last}`;
                } else if (input.length > 3) {
                    this.value = `${areaCode}-${middle}`;
                } else if (input.length > 0) {
                    this.value = `${areaCode}`;
                }
            });
        });
    });
</script>

</html>