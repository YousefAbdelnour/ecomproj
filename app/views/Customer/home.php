<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=14">
    <title>Home</title>
</head>

<body id="home">
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Home</h1>
        <h2>Welcome, make yourself comfortable!</h2>
    </div>
    <div class="divider"></div>

    <div class="home_container">
        <div class="home_container_left">
            <?php if (isset($data['earliestJob'])) : ?>
                <div id="last_service">
                    <p id="service_title">Latest Service</p>
                    <p id="service_date"><?php echo date('Y/m/d', strtotime($data['earliestJob']->Time_Of_Job)); ?></p>

                    <div id="maid_background">
                        <p class="job_maids"><?php echo $data['earliestJob']->MaidId; ?></p>
                        <p id="title"><?php echo $data['earliestJob']->Description; ?></p>

                        <div id="job_description_background">
                            <p id="job_description">Description</p>
                        </div>
                    </div>

                    <div id="service_buttons">
                        <input type="button" id="service_rebook" value="Book">
                        <input type="button" id="service_review" value="Review">
                    </div>
                </div>
            <?php else : ?>
                <p>No recent services found.</p>
            <?php endif; ?>
        </div>

        <div class="home_container_right">
            <div class="home_container_right_column">
                <div class="home_container_right_column_top_row">
                    <div id="service_history">
                        <p id="history_title"><a href="reservation_history" id="history_title_link">Service History</a></p>
                        <!-- This section might be populated dynamically in a similar way if historical data is structured -->
                    </div>
                </div>

                <div class="home_container_right_column_bottom_row">
                    <div id="pending">
                        <div id="pending_background">
                            <p><a href="/Job/display" id="pending_orders_link">Pending Orders</a></p>
                            <p><?php var_dump($data) ?></p> <!-- This line is for debugging; remove in production -->

                            <?php if (isset($data['earliestJob'])) : ?>
                                <div id="pending_information">
                                    <div id="pending_buttons">
                                        <input type="button" id="pending_support" value="Support">
                                        <input type="button" id="pending_cancel" value="Cancel">
                                    </div>

                                    <div id="pending_time">
                                        <p><?php echo date('Y/m/d', strtotime($data['earliestJob']->Time_Of_Job)); ?></p>
                                        <p><?php echo date('H:i A', strtotime($data['earliestJob']->Time_Of_Job)); ?> - Estimated End Time</p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div id="pending_first_background">
                                <p id="pending_title">Notes:</p>
                                <div id="pending_second_background">
                                    <p id="notes_description">Change the bed sheets as well, please!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>