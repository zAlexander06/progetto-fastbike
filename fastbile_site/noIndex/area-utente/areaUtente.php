<?php
session_start();
include "check_utente.php";
include "../connDB";

$lang = $_GET['lang'] ?? 'it';

$area_privata = true; // <-- Qui "accendi" l'interruttore
$page_title = "La tua Area - Fastbike";

$nomeUtente = $_SESSION['utente_nome'];
$idUtente = $_SESSION['utente_id'];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastbike: Area di <?php echo htmlspecialchars($nomeUtente); ?></title>
    <link rel="stylesheet" href="../../style/areaUtente.css">
</head>

<body>
    <div id="bloccoContenuto">
        <?php include "../../includes/minWidth.php"; ?>
    </div>
    <app id="appPagina">
        <?php include "../../includes/header.php"; ?>
        <main class="mainPaginaPrincipale">
            <h1>Area Personale Fastbike</h1>
            <p>Benvenuto, <strong><?php echo htmlspecialchars($nomeUtente); ?></strong></p>
            <p>Qui puoi gestire i tuoi noleggi e il tuo profilo.</p>
            <a href="../logout.php">Esci (Logout)</a>
        </main>
    </app>
</body>

</html>