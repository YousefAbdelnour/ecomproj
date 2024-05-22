<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=25">
    <title>Home</title>
</head>

<body id="home">
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1><?=__('Home')?></h1>
        <h2><?=__('Welcome, make yourself comfortable!')?></h2>
    </div>
    <div class="divider"></div>

    <div class="home_container">
        <div class="home_container_left">
            <?php if (isset($data['latestJob'])) : ?>
                <div id="last_service">
                    <p id="service_title"><?=__('Latest Service')?></p>
                    <p id="service_date"><?php echo date('Y/m/d', strtotime($data['latestJob']->Time_Of_Job)); ?></p>
                    <div id="maid_background">
                        <p class="job_maids"><?php echo $data['latestJob']->AddressId; ?></p>
                        <p id="title"><?=__('Description')?></p>
                        <div id="job_description_background">
                            <p id="job_description"><?php echo $data['latestJob']->Description; ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile_buttons">
                    <a href="/Message/support" class="button-style-red"><?=__('Report')?></a>
                </div>
            <?php else : ?>
                <p><?=__('No recent services found.')?></p>
            <?php endif; ?>
        </div>

        <div class="home_container_right">
            <div id="service_history">
                <p id="history_title"><a href="reservation_history" id="history_title_link"><?=__('Service History')?></a></p>
            </div>

            <div id="pending">
                <p id="pending_orders_title"><a href="/Job/display" id="pending_orders_link"><?=__('Pending Orders')?></a></p>

                <?php if (isset($data['earliestJob'])) : ?>
                    <div id="pending_information">
                        <div id="pending_time">
                            <p><?php echo date('Y/m/d', strtotime($data['earliestJob']->Time_Of_Job)); ?></p>
                            <p><?php echo date('H:i A', strtotime($data['earliestJob']->Time_Of_Job)); ?> <?=__('- Estimated Time')?></p>
                        </div>

                        <div id="pending_first_background">
                            <p id="pending_title"><?=__('Description:')?></p>
                            <div id="pending_second_background">
                                <p id="notes_description"><?php echo $data['earliestJob']->Description; ?></p>
                            </div>
                        </div>
                    </div>
                    <div id="pending_buttons">
                        <a href="/Message/support" class="button-style"><?=__('Support')?></a>
                        <a href='/Customer/cancel/<?= $data['earliestJob']->JobId ?>' class="button-style-red"><?=__('Cancel')?></a>
                    </div>
                <?php else : ?>
                    <p><?=__('No pending orders found.')?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>


</body>

</html>