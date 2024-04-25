<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=15">
    <title>Service Booking</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Booking List</h1>
        <h2>Your Scheduled Services</h2>
    </div>
    <div class="divider"></div>
    <div class="booking_buttons">
        <a href="/Job/book" class="button-style">Book a Service</a>
    </div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a booking-->
            <?php foreach ($data['bookings'] as $booking) : ?>
                <div class="task">
                    <div class="view_booking">
                        <div class="view_booking_row">
                            <p class="view_service"><?php echo "$booking->Time_Of_Job" ?></p>
                            <p class="view_date"><?php echo "$booking->Status" ?></p>
                        </div>
                        <div class="view_booking_row">
                            <p class="view_customer"><?php echo "$booking->House_Size" ?></p>
                            <p class="view_status"><?php echo "$booking->Spots_Left" ?></p>
                        </div>
                        <div class="view_booking_row">
                            <p class="view_customer"><?php echo "$booking->Description" ?></p>
                            <p class="view_status"><?php echo "$booking->MaidId" ?></p>
                        </div>
                        <div class="booking_buttons">
                            <?php echo "<a href='/Booking/cancel/$booking->JobId' class='button-style-delete'>Cancel</a>"?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- END OF TEMPLATE-->
        </div>
    </div>
</body>

</html>