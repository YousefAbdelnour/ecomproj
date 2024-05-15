<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=1">
    <title>Forgot Passord</title>
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="title_div">
        <h1><?=__('Forgot Password')?></h1>
        <h2><?=__('New Password')?></h2>
    </div>
    <form>
        <div class="form_column">
        <label for="usernameForgot"><?=__('Username')?></label>
        <input type="text" placeholder="DonutMan" id="usernameForgot" name="usernameForgot">
        </div>

        <input type="submit" value="Change">
    </form>
</body>

</html>