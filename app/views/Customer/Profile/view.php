<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css?v=9">
    <title>Profile</title>
</head>

<body>
    <?php include('../../navbar.php'); ?>
    <div class="title_div">
        <h1>Profile</h1>
        <h2>This is you!</h2>
    </div>
    <div class="divider"></div>
    <div class="wrapper">
        <div id="task_container">
            <!-- This is the template for a job-->
            <div class="task">
                <div id="view_profile">
                    <div id="view_profile_row">
                        <p id="view_name">Ronald Rafael</p>
                        <p id="view_username">Username</p>
                    </div>
                    <div id="view_address_row">
                        <p id="view_phone">514-111-1111</p>
                    </div>
                    <div class="profile_buttons">
                        <input type="button" class="profile_edit" value="Edit">
                    </div>
                </div>

            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>