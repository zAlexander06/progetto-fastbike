<?php
session_start();

$lang = $_GET['lang'] ?? 'it';

if (!isset($_SESSION['utente_loggato']) || $_SESSION['utente_loggato'] !== true) {
    header("Location: ../auth/login.php?lang=$lang&error=login_required");
    exit();
}
