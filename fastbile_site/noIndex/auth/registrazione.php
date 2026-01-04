<?php
session_start();
include "../connDB.php";

$lang = $_POST['lang'] ?? 'it';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['nuovoEmail'];
    $nomeUtente = $_POST['nomeUtente'] ?? null;
    $cognomeUtente = $_POST['cognomeUtente'];
    $telefonoUtente = $_POST['telefono'];
    $dataNascitaUtente = $_POST['dataNascita'] ?? null;
    $codFiscaleUtente = $_POST['codFiscaleUtente'];
    $password = $_POST['nuovaPassword'];

    if (!isset($conn)) {
        die("Errore: La variabile di connessione \$conn non esiste. Controlla l'include.");
    }

    $check = $conn->prepare("SELECT email, telefono FROM utenti WHERE email = ? OR telefono = ?");

    // Se il prepare fallisce, stampa l'errore del database
    if (!$check) {
        die("Errore nella preparazione della query: " . $conn->error);
    }

    $check->bind_param("ss", $email, $telefonoUtente);
    $check->execute();
    $risultato = $check->get_result();

    if ($risultato->num_rows > 0) {     // controllo se l'email (chiave) esiste
        $row = $risultato->fetch_assoc();

        if ($row['email'] === $email) {
            $_SESSION['errore_reg'] = ($lang == "it") ? "Esiste già un account con questa email!" : "An account with this email already exists!";
        } else {
            $_SESSION['errore_reg'] = ($lang == "it") ? "Questo numero di telefono è già registrato!" : "This telephone number is already registered!";
        }

        $_SESSION['vecchi_dati'] = $_POST;  // passa al login i dati inseriti + il messaggio di errore
        header("Location: login.php?page=registration&lang=$lang");
        exit();
    } else {
        $pass_sicura = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO utenti (nome, cognome, email, password, telefono, dataNascita) VALUES (?, ?, ?, ?, ?, ?)";

        $altroCheck = $conn->prepare($query);
        $altroCheck->bind_param("ssssss", $nomeUtente, $cognomeUtente, $email, $pass_sicura, $telefonoUtente, $dataNascitaUtente);

        if ($altroCheck->execute()) {
            unset($_SESSION['vecchi_dati']);
            $_SESSION['successo_reg'] = ($lang == "it") ? "Registrazione completata con successo!" : "Registration completed successfully!";
            header("Location: login.php?page=login&lang=" . $lang);
        } else {
            $_SESSION['errore_reg'] = ($lang == "it") ? "Errore tecnico: " . $conn->error : "Technical error: " . $conn->error;
            header("Location: login.php?page=registration&lang=" . $lang);
        }
    }
}
