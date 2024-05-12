<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=19">
    <title><?= __('Service Booking') ?></title>
</head>

<body>
    <?php include('app/views/navbarMaid.php'); ?>
    <div class="title_div">
        <h1> <?= __('Maid Tasks') ?> </h1>
        <h2> <?= __('Accept or Deny') ?> </h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div class="filter_div"></div>
        <div id="task_container">
            <?php foreach ($data as $booking) :
                $addressObject = $booking->getAddressById();
                $address = $addressObject->Building_Number . ' ' .
                    $addressObject->Street_Name . ', ' .
                    $addressObject->ZipCode . ' ' .
                    $addressObject->State . ' ' .
                    $addressObject->Country;
                $customerProfile = $addressObject->getCustomerProfile();
                $customer = $customerProfile->Name . ', ' . $customerProfile->Phone_Number
            ?>
                <div class="task">
                    <div class="task_info">
                        <p class="task_title"><?= $customer ?></p>
                        <p class="task_location"><?= $address ?></p>
                        <p class="task_date"><?= $booking->Time_Of_Job ?></p>
                        <p class="task_size"><?= 'Spots left: ' . $booking->Spots_Left ?></p>
                    </div>

                    <div class="task_description">
                        <div class="task_description_frame">
                            <p><?= $booking->Description ?></p>
                        </div>
                    </div>

                    <div class="task_buttons">
                        <div class="profile_buttons">
                            <a href="/Job/accept/<?= $booking->JobId ?>" class="button-style">Accept</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- END OF TEMPLATE-->
    </div>
    </div>

</body>

</html>