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
        <h1><?=__('Reservation History')?></h1>
        <h2><?=__('View Details or Report')?></h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <?php if (!empty($data['jobs'])) : // Check if jobs array is not empty 
            ?>
                <?php foreach ($data['jobs'] as $job) : ?>
                    <?php
                    $addressObject = $job->getAddressById();
                    $address = $addressObject->Building_Number
                        . ' ' . $addressObject->Street_Name
                        . ' ' . $addressObject->ZipCode
                        . ' ' . $addressObject->State
                        . ' ' . $addressObject->Country;
                    $maidList = $job->getMaidsForJob();
                    $printMaid = '';
                    foreach ($maidList as $maid) :
                        $printMaid = $printMaid . ' ' . $maid->Username;
                    endforeach;
                    ?>
                    <div class="task">
                        <div class="task_info">
                            <p class="res_title"><?= htmlspecialchars($address) ?></p>
                            <p class="res_name"><?= htmlspecialchars($printMaid) ?></p>
                            <p class="res_price"><?= htmlspecialchars($job->Time_Of_Job) ?></p>
                        </div>

                        <div class="profile_buttons">
                            <a href="/Message/support" class="button-style"><?=__('Report')?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p><?= htmlspecialchars($data['error']) ?></p>
            <?php endif; ?>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>