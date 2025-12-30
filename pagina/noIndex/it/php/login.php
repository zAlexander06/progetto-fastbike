<?php
include "../../connDB.php";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="../../../imgs/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../style/styleGlobale.css">
    <link rel="stylesheet" href="../../../style/header.css">
    <link rel="stylesheet" href="../../../style/login.css">
    <script>
        $(function() {
            $("#header").load('../../../includes/header-minimal.html');
            $("#bloccoContenuto").load('../../../includes/it/minWidth.html');
        });
    </script>
    <style>
        #btn-logo-info {
            cursor: default !important;
        }
    </style>
    <title>Fastbike: Login</title>
</head>

<body>
    <div id="bloccoContenuto"></div>
    <app id="appPagina">
        <header id="header"></header>
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
                        <button type="submit">Entra</button>
                    </div>
                </form>
                <div class="sezione-newUtente-recupero">
                    <div class="nuovo-utente">
                        <span>Nuovo utente?</span>
                        <a href="registrazione.html">Crea nuovo account</a>
                    </div>
                    <div class="recupero-utente">
                        <span>perso le credenziali?</span>
                        <a href="recuperoCredenziali.html">Recupera qui</a>
                    </div>
                </div>
                <div class="tornaHomepage">
                    <button id="btn-torna-homepage">
                        <span id="img-home"></span>
                        <p style="margin-left: 10px;">Torna alla homepage</p>
                    </button>

                    <script>
                        document.getElementById("btn-torna-homepage").addEventListener("click", function() {
                            window.location.href = "../../../it.html";
                        });
                    </script>
                </div>
            </div>
        </main>
    </app>
</body>

</html>