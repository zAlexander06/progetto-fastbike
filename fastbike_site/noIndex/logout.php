<?php

session_start();
session_destroy();

$lang = $_POST['lang'] ?? 'it';

if ($lang != "it") {
    $lang = "en";
}

header("Location: ../index.php?lang=$lang&page=home");
exit();
