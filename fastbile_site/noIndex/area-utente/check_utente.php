<?php
session_start();

if (!isset($_SESSION['utente_loggato']) || $_SESSION['utente_loggato'] !== true) {
    header("Location: ../login.php?error=login_required");
    exit();
}
