<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=21">
    <title><?= __('Admin Home') ?></title>
</head>

<body>
    <?php include('app/views/navbarAdmin.php'); ?>
    <div class="title_div">
        <h1><?= __('Welcome Admin') ?></h1>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div class="profile_buttons">
            <a href="/Account/booking/1" class="button-style"> <?= __('ACTIVE') ?> </a>
        </div>
        <div class="profile_buttons">
            <a href="/Account/booking/2" class="button-style"> <?= __('FINISHED') ?> </a>
        </div>
        <div class="profile_buttons">
            <a href="/Account/booking/3" class="button-style"> <?= __('CANCELED') ?> </a>
        </div>
        <div id="task_container">
            <?php if (!empty($job)) {
                foreach ($job as $info) : ?>
                    <div class="task">
                        <div id="view_profile">
                            <div id="view_profile_row">
                                <p id="view_name"><?= $info->Time_Of_Job ?></p>
                                <p id="view_username"><?= $info->JobId ?></p>
                            </div>
                            <div id="view_address_row">
                                <p id="view_phone"><?= $info->Description ?></p>
                            </div>
                        </div>
                    </div>
            <?php endforeach;
            } else {
                echo "No values";
            } ?>
        </div>
    </div>
</body>

</html>