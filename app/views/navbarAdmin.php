<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/views/style.css"> <!-- Correct path to CSS file -->
</head>
<?php
// Available languages
$supportedLocales = ['fr', 'en'];

// Current locale
$locale = $_COOKIE['lang'] ?? 'fr';
?>

<body>
    <nav>
        <input type="checkbox" id="menu-toggle" class="menu-toggle" />
        <label for="menu-toggle" class="hamburger">&#9776;</label>
        <ul id="menu">
            <li><a href="/Account/display/1"><?= __("Home") ?></a></li>
            <li><a href="/Account/booking/1"><?=__('Bookings')?></a></li>
            <li><a href="/Profile/show_Admin"><?= __("Profile") ?></a></li>
            <li><a href="/User/registerAdmin"><?= __("Create acount") ?></a></li>
            <li><a href="/Message/sendMessageFromAccount"><?= __("Send a message") ?></a></li>
            <li><a href="/Message/receivedAccount"><?= __("Messages") ?></a></li>
            <li><a href="/Account/logout"><?= __("Logout") ?></a></li>
            <li>
                <form action="/setLanguage.php" method="POST" id="language-form">
                    <select name="language" onchange="document.getElementById('language-form').submit()">
                        <?php foreach ($supportedLocales as $lang) : ?>
                            <option value="<?php echo $lang; ?>" <?php echo $lang === $locale ? 'selected' : ''; ?>>
                                <?php echo strtoupper($lang); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </li>
        </ul>
    </nav>
    <div id="nav_background"></div>
</body>

</html>