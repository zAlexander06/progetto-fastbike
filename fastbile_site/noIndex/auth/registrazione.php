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

    $check = $conn->prepare("SELECT id FROM utenti WHERE email = ?");

    // Se il prepare fallisce, stampa l'errore del database
    if (!$check) {
        die("Errore nella preparazione della query: " . $conn->error);
    }

    $check->bind_param("s", $email);
    $check->execute();
    $risultato = $check->get_result();

    if ($risultato->num_rows > 0) {     // controllo se l'email (chiave) esiste
        $row = $risultato->fetch_assoc();

        if ($row['email'] === $email) {
            $_SESSION['errore_reg'] = "Esiste già un account con questa email!";
        } else if ($row['telefono'] === $telefonoUtente) {
            $_SESSION['errore_reg'] = "Questo numero di telefono è già registrato.";
        }

        $_SESSION['vecchi_dati'] = $_POST;

        header("Location: login.php?page=registration");
        exit();
    } else {
        $pass_sicura = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO utenti (nome, cognome, email, password, telefono, dataNascita) VALUES (?, ?, ?, ?, ?, ?)";

        $altroCheck = $conn->prepare($query);
        $altroCheck->bind_param("ssssss", $nomeUtente, $cognomeUtente, $email, $pass_sicura, $telefonoUtente, $dataNascitaUtente);

        if ($altroCheck->execute()) {
            unset($_SESSION['vecchi_dati']);
            $_SESSION['successo_reg'] = "Registrazione completata con successo!";
            header("Location: login.php?page=login&lang=" . $lang);
        } else {
            $_SESSION['errore_reg'] = "Errore tecnico durante l'inserimento. Riprova.";
            header("Location: login.php?page=registration&lang=" . $lang);
        }
    }
}
