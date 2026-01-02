<?php
session_start();

$lang = $_GET['lang'] ?? 'it';

if ($lang === 'it') {
    include "lang/it.php";
} else {
    include "lang/en.php";
}

$pagina = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fastbike: <?php echo $pagina; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./script/parteIncludes.js"></script>
    <link rel="shortcut icon" href="./imgs/ico.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="./style/styleGlobale.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/footer.css">
</head>

<body>
    <div id="bloccoContenuto">
        <?php include "includes/minWidth.php"; ?>
    </div>
    <app id="appPagina">
        <?php include "includes/header.php"; ?>
        <main>
            <?php
            // Cerchiamo la pagina nella cartella pages/
            $file_pagina = "noIndex/" . $pagina . ".php";

            if (file_exists($file_pagina)) {
                include $file_pagina;
            } else {
                include "includes/urlSbagliato.php";
            }
            ?>
        </main>
        <?php include "includes/footer.php"; ?>
    </app>
</body>

</html>