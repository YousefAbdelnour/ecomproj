<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=19">
    <title><?= __('Service Booking') ?></title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1> <?= __('Maid Tasks') ?> </h1>
        <h2> <?= __('Accept or Deny') ?> </h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div class="filter_div">

        </div>
        <div id="task_container">
            <!-- This is the template for a job-->
            <div class="task">
                <div class="task_info">
                    <p class="task_title"> <?= __('Roanld Garcia') ?> </p>
                    <p class="task_location"> <?= __('Qc Montreal') ?> </p>
                    <p class="task_date"> <?= __('2024/06/10') ?> </p>
                    <p class="task_size"> <?= __('Medium') ?> </p>
                </div>

                <div class="task_description">
                    <div class="task_description_frame">
                        <p> <?= __('Do not forget to clean the toilet seat! Thank you!') ?> </p>
                    </div>
                </div>

                <div class="task_buttons">
                    <input type="button" class="task_accept" value="<?= __("Accept") ?>">
                    <input type="button" class="task_decline" value="<?= __("Decline") ?>">
                </div>

            </div>

        <!-- TO BE TESTED WITH REAL BOOKINGS --> 
        <!-- <div id="task_container">
        <?php foreach ($bookings as $booking): ?>
        <div class="task">
            <div class="task_info">
                <p class="task_title"><?= $booking->AddressId ?></p>
                <p class="task_location"><?= $booking->AddressId ?></p>
                <p class="task_date"><?= $booking->Time_Of_Job ?></p>
                <p class="task_size"><?= $booking->House_Size ?></p>
            </div>

                <div class="task_description">
                    <div class="task_description_frame">
                        <p><?= $booking->Description ?></p>
                    </div>
                </div>

                <div class="task_buttons">
                    <input type="button" class="task_accept" value="<?= __("Accept") ?>">
                    <input type="button" class="task_decline" value="<?= __("Decline") ?>">
                </div>
                </div>
            <?php endforeach; ?>
        </div> -->

            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>