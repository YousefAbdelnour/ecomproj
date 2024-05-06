<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=3">
    <title><?= __('Service Booking') ?></title>
</head>

<body>
    <?php include ('../navbarAdmin.php'); ?>
    <div class="title_div">
        <h1><?= __('Schedule') ?></h1>
        <h2><?= __("Don't worry, we got you covered!") ?></h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <div class="task">
                <div class="schedule_day">
                    <div class="schedule_row">
                        <p class="schedule_date">> <?= __('15th Monday') ?> <</p>
                        <p class="schedule_time">> <?= __('10:15 AM') ?> <</p>
                    </div>
                    <div class="schedule_row">
                        <p class="schedule_address">> <?= __('1405 Av Crickson Montreal Qc') ?> <</p>
                        <p class="schedule_size">> <?= __('Small') ?> <</p>
                    </div>
                    <div class="schedule_buttons">
                        <input type="button" class="task_decline" value="<?= __("Cancel") ?>">
                    </div>
                </div>

            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>