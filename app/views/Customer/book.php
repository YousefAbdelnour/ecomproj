<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=1">
    <title>Service Booking</title>
</head>
<body>
    <?php include('../navbar.php'); ?>
    <div class="title_div">
        <h1>Service Booking</h1>
        <h2>Ready to serve</h2>
    </div>
    <div class="divider"></div>
    <div id="book_form_div">
        <form id="book_form">
            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="House_Size">House size</label>
                    <input type="text" id="House_Size" name="House_Size">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="spots">Maid Preference</label>
                    <input type="text" id="spots" name="spots">
                </div>
                <div class="form-group">
                    <label for="maid_name">Maids</label>
                    <input type="text" id="maid_name" name="maid_name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date">
                </div>
            </div>
            <div id="textarea_div">
                <label for="dsc">Description</label><br><br>
                <textarea id="dsc" name="dsc"></textarea>
            </div>
            <input type="submit" value="Book" class="submit-button">
        </form>
    </div>
</body>
</html>



<!-- Important -->

<!-- We need to add a text varriable to database for description -->
<!-- The Maid number is here so we know how many maids the person wants to hire (that is the way it is implememnted in the DB) -->