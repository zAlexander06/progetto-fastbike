<?php
session_start();
include "../connDB.php";

$lang = $_POST['lang'] ?? 'it';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emailUtente = trim($_POST['email-esistente']);
    $passwordUtente = $_POST['password-esistente'];

    if ($emailUtente == "admin" && $passwordUtente == "admin") {
        $_SESSION['is_admin'] = true;
        $_SESSION['utente_nome'] = "Amministratore";
        header("Location: ../area-riservata/areaRiservata.php?lang=$lang&page=home");
        exit();
    }

    $richiestaSQL = "SELECT id, nome, cognome, email, password FROM utenti WHERE email = ?";
    $check = $conn->prepare($richiestaSQL);
    $check->bind_param("s", $emailUtente);
    $check->execute();

    $ris = $check->get_result();

    if ($ris && $ris->num_rows == 1) {    // significa che ha trovato almeno una riga con i dati
        $utente = $ris->fetch_assoc();

        echo "Debug Nome: " . $_SESSION['utente_nome'];
        if (password_verify($passwordUtente, $utente['password'])) {
            $_SESSION['utente_id'] = $utente['id'];
            $_SESSION['utente_nome'] = $utente['nome'];
            $_SESSION['utente_loggato'] = true;

            header('Location: ../../index.php?lang=' . $lang);
            exit();
        } else {
            if ($lang == "it") {
                $_SESSION['errore_login'] = "La password inserita non è corretta.";
            } else {
                $_SESSION['errore_login'] = "Password inserted not correct";
            }
        }
    } else {
        if ($lang == "it") {
            $_SESSION['errore_login'] = "Non esiste un account associato a questa email.";
        } else {
            $_SESSION['errore_login'] = "Not exist an account associed with this email";
        }
    }

    header('Location: login.php?page=login&lang=' . $lang . '&error=1');
    exit($conn);
}
