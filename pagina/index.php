<?php
$accept_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en';
$lang = substr($accept_lang, 0, 2);

if ($lang === 'it') {
    header("Location: it.html");
} else {
    header("Location: eng.html");
}
exit;
