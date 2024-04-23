<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css?v=7">
    <title>Service Booking</title>
</head>

<body>
    <?php include('../../navbar.php'); ?>
    <div class="title_div">
        <h1>Schedule</h1>
        <h2>Don't worry, we got you covered!</h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <div class="task">
                <div class="view_address">
                    <div class="view_address_row">
                        <p class="view_country">Canada</p>
                        <p class="view_state">Quebec</p>
                    </div>
                    <div class="view_address_row">
                        <p class="view_address">1405 Av Crickson Montreal Qc</p>
                        <p class="view_zipcode">H1C 4M9</p>
                    </div>
                    <div class="address_buttons">
                        <input type="button" class="address_delete" value="Cancel">
                    </div>
                </div>

            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>