<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=20">
    <title>Admin Home</title>
</head>

<body>
    <?php include('app/views/navbarAdmin.php'); ?>
    <div class="title_div">
        <h1>Welcome Admin</h1>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div class="profile_buttons">
            <a href="/Account/display/1" class="button-style">CUSTOMER</a>
        </div>
        <div class="profile_buttons">
            <a href="/Account/display/2" class="button-style">STAFF</a>
        </div>
        <div class="profile_buttons">
            <a href="/Account/display/3" class="button-style">BOOKING</a>
        </div>
        <div id="task_container">
            <?php foreach ($data as $info) : ?>
                <div class="task">
                    <div id="view_profile">
                        <div id="view_profile_row">
                            <p id="view_name"><?php if ($info->CustomerId === null) {
                                                    echo $info->AccountId;
                                                } else {
                                                    echo $info->CustomerId;
                                                } ?></p>
                            <p id="view_username"><?php echo $info->Username ?></p>
                        </div>
                        <div id="view_address_row">
                            <p id="view_phone"><?php if ($info->IsActive === 0) {
                                                    echo "Active";
                                                } else {
                                                    echo "Deactivated";
                                                } ?></p>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>