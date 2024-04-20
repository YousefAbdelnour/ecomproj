<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Service Booking</title>
</head>

<body>
    <?php include('../navbar.php'); ?>
    <div class="title_div">
        <h1>Service Booking</h1>
        <h2>Ready to serve</h2>
    </div>
    <div class="divider"></div>
    <div id="book_form">
        <form>
            <label id="addressLabel" for="address">Address</label>
            <label id="HSLabel" for="House_Size">House size</label>
            <br><br>
            <input type="text" id="address" name="address">
            <input type="text" id="House_Size" name="House_Size">
            <br><br>
            <label id="maidLabel" for="spots">Maid Preference</label>
            <label id="spotsLabel" for="maid_name">Maids</label>
            <br><br> <!-- The Maid number is here so we know how many maids the person wants to hire (that is the way it is implememnted in the DB) -->
            <input type="text" id="spots" name="spots">
            <input type="text" id="maid_name" name="maid_name">
            <br><br>
            <label id="dateLabel" for="date">Date</label>
            <label id="descLabel" for="dsc">Description</label>
            <!-- We need to add a text varriable to database for description -->
            <br><br>
            <input type="text" id="date" name="date">
            <input type="text" id="dsc" name="dsc">
            <br><br>
            <input type="submit" value="Book">

        </form>
    </div>
</body>

</html>