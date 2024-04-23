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
        <h1>Reservation History</h1>
        <h2>View Details or Report</h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <div class="task">
                <div class="task_info">
                    <p class="res_title">Basic Cleaning</p>
                    <p class="res_name">Maria Lastname</p>
                    <p class="res_price">Cost: 153$</p>
                </div>

                <div class="task_buttons">
                    <input type="button" class="task_accept" value="Details">
                    <input type="button" class="task_decline" value="Report">
                </div>

            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>