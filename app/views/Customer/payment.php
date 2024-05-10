<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=18">
    <title>Payment</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Payments</h1>
        <h2>Pay completed jobs</h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <div class="task">
                <div class="task_info">
                    <p class="job_date">April 14th, 2024</p>
                    <p class="job_address">3333 Av itsatest</p>
                    <p class="job_price">Cost: 120$</p>
                </div>

                <div class="profile_buttons">
                    <a href="/Customer/pay" class="button-style">PAY</a>
                </div>

            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>