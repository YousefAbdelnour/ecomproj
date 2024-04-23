<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=14">
    <title>Service Booking</title>
</head>

<body>
    <?php include('app/views/navbar.php'); ?>
    <div class="title_div">
        <h1>Addres List</h1>
        <h2>Is this were you live?</h2>
    </div>
    <div class="divider"></div>
    <form method="POST" action="/Address/add">
        <div class="address_buttons">
            <input type="submit" class="address_add" value="ADD">
        </div>
    </form>
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
                        <form method="POST" action="/Address/delete">
                            <div class="address_buttons">
                                <input type="submit" class="address_delete" value="Delete">
                            </div>
                        </form>
                    </div>

                </div>
            <?php endforeach; ?>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>