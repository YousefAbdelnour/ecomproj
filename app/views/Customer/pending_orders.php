<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css">
    <title>Service Booking</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?=__('Pending orders')?></h1>
        <h2><?=__('Monitor your acvtive orders!')?></h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <div id="pending">
                <div id="pending_background">
                    <p><?=__('Pending Orders')?></p>
                    <p><?=__('4639 Buckhannan Avenue')?></p>

                    <div id="pending_information">
                        <div id="pending_buttons">
                            <input type="button" id="pending_support" value="Suppot">
                            <input type="button" id="pending_cancel" value="Cancel">
                        </div>

                        <div id="pending_time">
                            <p>2024/09/15</p>
                            <p>10:15 AM - 12 PM </p>
                        </div>

                    </div>

                </div>
                <div id="pending_first_background">
                    <p id="pending_title"><?=__('Notes:')?></p>
                    <div id="pending_second_background">
                        <p id="notes_description"><?=__('Change the bed sheets as well, please!')?></p>
                    </div>
                </div>
            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>