<?php
// List of supported locales
$supportedLocales = ['fr', 'en'];

// Get the requested language from POST data
$locale = $_POST['language'] ?? 'fr';

// Ensure the locale is supported
if (!in_array($locale, $supportedLocales)) {
    $locale = 'fr';
}

// Save the selected language to a cookie
setcookie('lang', $locale, time() + (86400 * 30), '/'); // 86400 = 1 day

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();