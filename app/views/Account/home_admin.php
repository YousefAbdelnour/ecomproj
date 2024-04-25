<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=20">
    <title>Service Booking</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Maid Tasks</h1>
        <h2>Accept or Deny</h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div class="filter_div">

        </div>
        <div id="task_container">
            <!-- This is the template for a job-->
            <div class="task">
                <div class="task_info">
                    <p class="task_title">Roanld Garcia</p>
                    <p class="task_location">Qc Montreal</p>
                    <p class="task_date">2024/06/10</p>
                    <p class="task_size">Medium</p>
                </div>

                <div class="task_description">
                    <div class="task_description_frame">
                        <p>Do not forget to clean the toilet seat! Thank you!</p>
                    </div>
                </div>

                <div class="task_buttons">
                    <input type="button" class="task_accept" value="Accept">
                    <input type="button" class="task_decline" value="Decline">
                </div>

            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>