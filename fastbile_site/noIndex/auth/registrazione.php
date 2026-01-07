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
    $codFiscaleUtente = strtoupper($_POST['codFiscaleUtente']);
    $password = $_POST['nuovaPassword'];
    $passwordConfirm = $_POST['convPassword'];

    $errori = [];

    // controllo se i dati sono corretti
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errori[] = ($lang == "it") ? "Formato email non valido." : "Invalid email format.";
    }

    // Password robusta? (Regex che riflette il tuo JS)
    $regexPass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/';
    if (!preg_match($regexPass, $password)) {
        $errori[] = ($lang == "it") ? "La password non rispetta i requisiti di sicurezza." : "Password does not meet security requirements.";
    }

    // Password uguali?
    if ($password !== $passwordConfirm) {
        $errori[] = ($lang == "it") ? "Le password non coincidono." : "Passwords do not match.";
    }

    if (empty($dataNascitaUtente)) {
        $errori[] = ($lang == "it") ? "La data di nascita è obbligatoria" : "Your Birthday is obligatory";
    } else {
        $dataNascitaObj = new DateTime($dataNascitaUtente);
        $oggi = new DateTime();
        $eta = $oggi->diff($dataNascitaObj)->y;
        if ($eta < 18) {
            $errori[] = ($lang == "it") ? "Devi essere maggiorenne per registrarti." : "You must be 18 or older to register.";
        }
    }

    if (strlen($codFiscaleUtente) !== 16) {
        $errori[] = ($lang == "it") ? "Il Codice Fiscale deve essere di 16 caratteri." : "Tax Code must be 16 characters.";
    }

    if (!empty($errori)) {
        $_SESSION['errore_reg'] = implode("<br>", $errori);
        $_SESSION['vecchi_dati'] = $_POST;
        header("Location: login.php?page=registration&lang=$lang");
        exit();
    }

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

        $query = "INSERT INTO utenti (nome, cognome, email, password, telefono, codiceFiscale, dataNascita) VALUES (?, ?, ?, ?, ?, ?)";

        $altroCheck = $conn->prepare($query);
        $altroCheck->bind_param("sssssss", $nomeUtente, $cognomeUtente, $email, $pass_sicura, $telefonoUtente, $codFiscaleUtente, $dataNascitaUtente);

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
