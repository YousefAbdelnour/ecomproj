<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/views/style.css?v=17">
    <title>Profile</title>
</head>

<body>
    <?php include('app/views/navbarMaid.php'); ?>
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
                        <p id="view_name"><?php echo $data['account_profile']->Name ?></p>
                        <p id="view_username"><?php echo $data['account']->Username ?></p>
                    </div>
                    <div id="view_address_row">
                        <p id="view_phone"><?php echo $data['account_profile']->Phone_Number; ?></p>
                    </div>
                    <div class="profile_buttons">
                        <a href="/Profile/edit_Maid" class="button-style">Edit</a>
                    </div>
                </div>

            </div>
            <!-- END OF TEMPLATE-->
        </div>
    </div>

</body>

</html>