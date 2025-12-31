<?php
include "../connDB.php";

session_start();

if (isset($_SESSION['utente_id'])) {
    header("Location: dashboard.php");
    exit();
}

$lang = $_GET['lang'] ?? 'it';

if ($lang === 'it') {
    include "../../lang/it.php";
} else {
    include "../../lang/en.php";
}

$azione = $_GET['action'] ?? 'login';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="../../imgs/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../../style/styleGlobale.css">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/login.css">
    <style>
        #btn-logo-info {
            cursor: default !important;
        }
    </style>
    <title>Fastbike: Login</title>
</head>

<body>
    <div id="bloccoContenuto">
        <?php include "../../includes/minWidth.php"; ?>
    </div>
    <app id="appPagina">
        <header id="header">
            <?php include "../../includes/header-minimal.html"; ?>
        </header>

        <main class="mainPagina">
            <div class="login-img-container">
                <div class="login-img"></div>
            </div>
            <div class="login-container">
                <form class="loginForm" action="login.php" method="post">
                    <h2 style="margin: 0px;">Login</h2>
                    <div class="login-inside-form-container">
                        <div class="singoloInput">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="singoloInput">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-btn-invio">
                        <button type="submit"><?php echo $testo_login['login-btn']; ?></button>
                    </div>
                </form>

                <div class="sezione-newUtente-recupero">
                    <div class="nuovo-utente">
                        <span><?php echo $testo_login['login-testo-nuovo-utente']; ?></span>
                        <a href="login.php?azione=registrazione"><?php echo $testo_login['login-link-nuovo-utente']; ?></a>
                    </div>
                    <div class="recupero-utente">
                        <span><?php echo $testo_login['login-testo-credenziali']; ?></span>
                        <a href="recuperoCredenziali.php"><?php echo $testo_login['login-link-credenziali']; ?></a>
                    </div>
                </div>
                <div class="tornaHomepage">
                    <button id="btn-torna-homepage">
                        <span id="img-home"></span>
                        <p style="margin-left: 10px;"><?php echo $testo_login['login-btn-homepage']; ?></p>
                    </button>

                    <script>
                        document.getElementById("btn-torna-homepage").addEventListener("click", function() {
                            window.location.href = "../../index.php";
                        });
                    </script>
                </div>
            </div>
        </main>
    </app>
</body>

</html>