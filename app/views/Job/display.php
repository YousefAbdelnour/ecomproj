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
        <h1><?=__('Booking List')?></h1>
        <h2><?=__('Your Scheduled Services')?></h2>
    </div>
    <div class="divider"></div>
    <div class="booking_buttons">
        <a href="/Job/book" class="button-style"><?=__('Book a Service')?></a>
    </div>
    <div class="wrapper">
        <div id="task_container">
            <!-- Check if there are bookings -->
            <?php if (!empty($data['bookings'])) : ?>
                <!-- Iterate through each booking and display its details -->
                <?php foreach ($data['bookings'] as $booking) : ?>
                    <div class="task">
                        <div class="view_booking">
                            <div class="view_booking_row">
                                <p class="view_service"><?=__('Scheduled Time:')?><?php echo date("Y-m-d H:i", strtotime($booking->Time_Of_Job)); ?></p>
                                <p class="view_date"><?=__('Status:')?><?php echo $booking->Status == 0 ? 'Pending' : 'Confirmed'; ?></p>
                            </div>
                            <div class="view_booking_row">
                                <p class="view_description"><?=__('Description:')?><?php echo $booking->Description; ?></p>
                                <p class="view_maid"><?=__('Maid ID:')?><?php echo $booking->MaidId; ?></p>
                            </div>
                            <div class="booking_buttons">
                                <a href="/Booking/cancel/<?php echo $booking->JobId; ?>" class="button-style-delete"><?=__('Cancel')?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- Message to display if no bookings are found -->
                <p><?=__('No bookings found. Please book a service to see it listed here.')?></p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>