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
        <!--Background-->
        <div class="home_container_left">
            <!--left side of page (latest service)-->
            <div id="last_service">
                <p id="service_title">Latest Service</p>
                <p id="service_date">2024/06/10</p>

                <div id="maid_background">
                    <p class="job_maids">M.Maria</p>
                    <p id="title">Toilet Cleaning</p>

                    <div id="job_description_background">
                        <p id="job_description">Description</p>
                    </div>

                </div>

                <div id="service_buttons">
                    <input type="button" id="service_rebook" value="Book">
                    <input type="button" id="service_review" value="Review">
                </div>

            </div>

        </div>

        <div class="home_container_right">
            <!--right side of page (service history, notification, pending orders)-->
            <div class="home_container_right_column">
                <!--column for right side (Service, Notifications/ Pending orders)-->
                <div class="home_container_right_column_top_row">
                    <div id="service_history">
                        <p id="history_title"><a href="reservation_history" id="history_title_link">Service History</a></p>
                        <div class="history_spacer">
                            <div class="history_first_background">
                                <div class="history_second_background">
                                    <p class="history_date">2024/04/12</p>
                                    <p class="history_time">12:15 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="history_spacer">
                            <div class="history_first_background">
                                <div class="history_second_background">
                                    <p class="history_date">2024/04/12</p>
                                    <p class="history_time">12:15 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="history_spacer">
                            <div class="history_first_background">
                                <div class="history_second_background">
                                    <p class="history_date">2024/04/12</p>
                                    <p class="history_time">12:15 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="home_container_right_column_bottom_row">
                    <div id="pending">
                        <div id="pending_background">
                            <p><a href="pending_orders" id="pending_orders_link">Pending Orders</a></p>
                            <p>4639 Buckhannan Avenue</p>

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
</body>

</html>