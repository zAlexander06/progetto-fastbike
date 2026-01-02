<?php
$index = "../index.php";
$paginaCorrente = "info.php";

$lang = $_GET['lang'] ?? 'it';
$file_lingua = "../lang/{$lang}.php";

if (file_exists($file_lingua)) {
    include $file_lingua;
} else {
    include "../lang/en.php";
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="../imgs/ico.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../style/styleGlobale.css">
    <link rel="stylesheet" href="../style/header.css">
    <title>Fastbike: Info sul nostro servizio</title>
</head>

<body>
    <div id="bloccoContenuto">
        <?php include "../includes/minWidth.php"; ?>
    </div>
    <app id="appPagina">
        <header id="header">
            <?php include "../includes/header-minimal.php"; ?>
        </header>
        <main class="mainPagina">
        </main>
    </app>
</body>

</html>