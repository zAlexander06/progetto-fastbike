<?php
include "check_admin.php";
include "../connDB.php";

$lang = $_POST['lang'] ?? 'it';

$nomeUtente = $_SESSION['utente_nome'];

if ($lang != "it") {
    include "../../lang/en.php";
} else {
    include "../../lang/it.php";
}

$area_privata = true;
$page_title = "La tua Area - Fastbike";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastbike: <?php echo $_SESSION['utente_nome'] ?></title>
    <script src="../../script/areaPrivata/areAdmin.js"></script>
    <link rel="shortcut icon" href="../../imgs/ico.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../../style/styleGlobale.css">
    <link rel="stylesheet" href="../../style/areaPrivata/areaRiservata.css">
</head>

<body>
    <div id="bloccoContenuto">
        <?php include "../../includes/minWidth.php"; ?>
    </div>
    <app id="appPagina">
        <?php include "../../includes/header-privato.php"; ?>
        <main class="boxAmministrativo">
            <div class="menuLateraleAzioni"></div>
            <div class="containerAzioni">
                <h1>Area Amministrativa: Fastbike</h1>
                <p>Benvenuto, <strong><?php echo htmlspecialchars($nomeUtente); ?></strong></p>
                <div class="mostraContenutoDB">
                    <div class="btns-mostraIframe">
                        <button id="mostra-clienti">
                            <span>Mostra Clienti</span>
                        </button>
                        <button id="mostra-sedi">
                            <span>Mostra Sedi</span>
                        </button>
                        <button id="mostra-biciclette">
                            <span>Mostra Biciclette</span>
                        </button>
                    </div>
                    <iframe id="container-iframe" frameborder="0"></iframe>
                </div>
                <p>La pagina di Amministrazione è ancora in corso.<br>La prego di attendere!</p>
                <a href="../logout.php">Esci (Logout)</a>
            </div>
        </main>
    </app>
</body>

</html>