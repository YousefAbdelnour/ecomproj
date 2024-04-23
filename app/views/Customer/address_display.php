<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    header('location:/Customer/address_add');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=12">
    <title>Service Booking</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Addres List</h1>
        <h2>Is this were you live?</h2>
    </div>
    <div class="divider"></div>
    <form method="POST" action="">
        <div class="address_buttons">
            <input type="submit" class="address_add" value="ADD">
        </div>
    </form>
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