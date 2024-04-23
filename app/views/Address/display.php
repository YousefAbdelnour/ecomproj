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
        <h1>Address List</h1>
        <h2>Is this were you live?</h2>
    </div>
    <div class="divider"></div>
    <div class="address_buttons">
        <a href="/Address/add" class="button-style">ADD</a>
    </div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <?php foreach ($data['address'] as $address) : ?>
                <div class="task">
                    <div class="view_address">
                        <div class="view_address_row">
                            <p class="view_country"><?php echo "$address->Country" ?></p>
                            <p class="view_state"><?php echo "$address->State" ?></p>
                        </div>
                        <div class="view_address_row">
                            <p class="view_address"><?php echo "$address->Building_Number $address->Street_Name" ?></p>
                            <p class="view_zipcode"><?php echo "$address->ZipCode" ?></p>
                        </div>
                        <div class="address_buttons">
                            <?php echo "<a href='/Address/delete/$address->AddressId' class='button-style-delete'>Delete</a>"?>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>