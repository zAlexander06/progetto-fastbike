<?php
session_start();

$lang = $_GET['lang'] ?? 'it';

if (empty($_SESSION['utente_loggato']) || $_SESSION['utente_loggato'] !== true) {
    header("Location: ../auth/login.php?lang=" . $lang . "&page=login");
    exit();
}

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
    <header>
        <h1>Area Personale Fastbike</h1>
        <p>Benvenuto, <strong><?php echo htmlspecialchars($nomeUtente); ?></strong></p>
    </header>

    <main>
        <p>Qui puoi gestire i tuoi noleggi e il tuo profilo.</p>

        <a href="../logout.php">Esci (Logout)</a>
    </main>
</body>

</html>