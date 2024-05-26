<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=17">
    <title><?= __('Profile')?></title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?=__('Profile')?></h1>
        <h2><?=__('This is you!')?></h2>
    </div>
    <div class="divider"></div>
    <div class="form-container">
    <div class="form-group">
        <label for="view_name"><?=__('Name:')?></label>
        <input type="text" id="view_name" name="view_name" value="<?php echo $data['customer_profile']->Name ?>" disabled>
    </div>
    <div class="form-group">
        <label for="view_username"><?=__('Username:')?></label>
        <input type="text" id="view_username" name="view_username" value="<?php echo $data['customer']->Username ?>" disabled>
    </div>
    <div class="form-group">
        <label for="view_phone"><?=__('Phone Number:')?></label>
        <input type="tel" id="view_phone" name="view_phone" value="<?php echo $data['customer_profile']->Phone_Number ?>" disabled>
    </div>
    <div class="form-group">
        <a href="/Profile/edit_Customer" class="button-style"><?=__('Edit')?></a>
    </div>
</div>


</body>

</html>