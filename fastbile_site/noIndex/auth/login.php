<?php
include "../connDB.php";

$index = "../../index.php";
$paginaCorrente = "login.php";

session_start();

if (isset($_SESSION['utente_id'])) {
    header("Location: dashboard.php");
    exit();
}

$lang = $_GET['lang'] ?? 'it';
$file_lingua = "../../lang/{$lang}.php";

$pagina = $_GET['page'] ?? '';
$url_sbagliato = false;

if (file_exists($file_lingua)) {
    include $file_lingua;
} else {
    include "../../lang/en.php";
}

switch ($pagina) {
    case "":
    case "login":
        $template = 'login';
        break;

    case "registration":
        $template = 'registration';
        break;

    default:
        $url_sbagliato = true;
        $template = 'error';
        break;
}

/* parte del login */
$messaggio_successo = $_SESSION['successo_reg'] ?? "";
unset($_SESSION['successo_reg']); // Lo cancelliamo subito così non riappare al refresh


/* parte della registrazione */
$errore = $_SESSION['errore_reg'] ?? "";
$vecchi_dati = $_SESSION['vecchi_dati'] ?? [];
unset($_SESSION['errore_reg']); // Puliamo per il prossimo caricamento
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../../script/parteIncludes.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="../../imgs/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../../style/styleGlobale.css">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/login-registrazione.css">
    <style>
        #btn-logo-info {
            cursor: default !important;
        }
    </style>
    <title id="titolo-pagina-html">Fastbike: Login</title>
</head>

<body>
    <div id="bloccoContenuto">
        <?php include "../../includes/minWidth.php"; ?>
    </div>
    <app id="appPagina">
        <header id="header">
            <?php include "../../includes/header-minimal.php"; ?>
        </header>

        <main class="mainPagina">

            <?php if ($url_sbagliato):
                include "../../includes/urlSbagliato.php";
                exit();
            endif; ?>

            <div class="page-img-container">
                <div class="page-img"></div>
            </div>

            <?php switch ($template):
                case 'login': ?>
                    <div class="login-container">
                        <?php if ($messaggio_successo): ?>
                            <div class="alert-success" style="color: green; background: #e6ffed; padding: 10px; border: 1px solid green; border-radius: 5px; margin-bottom: 15px;">
                                <p style="margin: 0; font-weight: bold;"><?php echo $messaggio_successo; ?></p>
                            </div>
                        <?php endif; ?>

                        <form class="loginForm" action="login.php" method="post">
                            <h2>Login</h2>
                            <div class="login-form-container">
                                <div class="singoloInput-login">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email-esistente" placeholder="Email" class="input-login" required
                                        autocomplete="false">
                                </div>
                                <div class="singoloInput-login">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password-esistente" placeholder="Password"
                                        class="input-login" required>
                                </div>
                            </div>
                            <div class="form-btn-invio">
                                <button type="submit">
                                    <?php echo $testo_login['login-btn']; ?>
                                </button>
                            </div>
                        </form>

                        <div class="sezione-newUtente-recupero">
                            <div class="nuovo-utente">
                                <span>
                                    <?php echo $testo_login['login-testo-nuovo-utente']; ?>
                                </span>
                                <a href="login.php?lang=<?php echo $lang; ?>&page=registration" id="link-registration">
                                    <?php echo $testo_login['login-link-nuovo-utente']; ?>
                                </a>
                                <script>
                                    document.getElementById("link-registration").addEventListener("click", function() {
                                        document.getElementById("titolo-pagina-html").innerText = "Fastbike: <?php $testo_registrazione['titolo-pagina-registrazione']; ?>";
                                    });
                                </script>
                            </div>
                            <div class="recupero-utente">
                                <span>
                                    <?php echo $testo_login['login-testo-credenziali']; ?>
                                </span>
                                <a href="./recuperoCredenziali/recuperoCredenziali.php?lang=<?php echo $lang; ?>">
                                    <?php echo $testo_login['login-link-credenziali']; ?>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php break;
                case 'registration': ?>

                    <!-- manca i controlli prima di dell'invio al database -->

                    <div class="register-container">
                        <form action="registrazione.php" method="post" class="registerForm">
                            <?php if ($errore): ?>
                                <div class="errore-registrazione" style="color: red; background: #ffeeee; padding: 10px; border-radius: 5px; margin-bottom: 15px; border: 1px solid red;">
                                    <p style="margin: 0; font-weight: bold;"><?php echo $errore; ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="titolo-campiObb">
                                <h2><?php echo $testo_registrazione['registrazione-titolo']; ?></h2>
                                <p style="margin: 0px;"><?php echo $testo_registrazione['registrazione-campi-obb']; ?></p>
                                <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                            </div>

                            <div class="register-form-container">

                                <div class="input-registrazioni-container">
                                    <label for="email">Email <span style="font-weight: bold">*</span></label>
                                    <input type="email" name="nuovoEmail" id="email" class="input-register" value="<?php echo htmlspecialchars($vecchi_dati['email'] ?? ''); ?>" placeholder=" Email" required>
                                </div>

                                <div class="input-registrazioni-container">
                                    <div class="more-containers-input">
                                        <div class="more-input-flex-left">
                                            <label for="nome"><?php echo $testo_registrazione['registrazione-testo-nome']; ?></label>
                                            <input type="text" name="nomeUtente" id="nome" class="input-register" value="<?php echo htmlspecialchars($vecchi_dati['nome'] ?? ''); ?>" placeholder=" <?php echo $testo_registrazione['registrazione-testo-nome']; ?>">
                                        </div>

                                        <div class="more-input-flex-right">
                                            <label for="cognome"><?php echo $testo_registrazione['registrazione-testo-cognome']; ?> <span style="font-weight: bold">*</span></label>
                                            <input type="text" name="cognomeUtente" id="cognome" class="input-register" value="<?php echo htmlspecialchars($vecchi_dati['cognome'] ?? ''); ?>" placeholder="<?php echo $testo_registrazione['registrazione-testo-cognome']; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-registrazioni-container">

                                    <div class="more-containers-input">

                                        <div class="more-input-flex-left">
                                            <label for="numTelefono"><?php echo $testo_registrazione['registrazione-testo-numTelefono']; ?> <span style="font-weight: bold">*</span></label>
                                            <input type="tel" name="telefono" id="numTelefono" class="input-register" value="<?php echo htmlspecialchars($vecchi_dati['telefono'] ?? ''); ?>"
                                                placeholder="<?php echo $testo_registrazione['registrazione-testo-numTelefono']; ?>" required>
                                        </div>

                                        <div class="more-input-flex-right">
                                            <label for="dataNascita"><?php echo $testo_registrazione['registrazione-testo-dataNascita']; ?></label>
                                            <input type="date" name="dataNascita" id="dataNascita" class="input-register"
                                                placeholder="numero di Telefono" value="<?php echo htmlspecialchars($vecchi_dati['dataNascita'] ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-registrazioni-container">
                                    <label for="codFiscale"><?php echo $testo_registrazione['registrazione-testo-documento']; ?> <span style="font-weight: bold">*</span></label>
                                    <input type="text" name="codFiscaleUtente" id="codFiscale" class="input-register" value="<?php echo htmlspecialchars($vecchi_dati['codFiscaleUtente'] ?? ''); ?>"
                                        placeholder="<?php echo $testo_registrazione['registrazione-testo-codFiscale']; ?>" required>
                                </div>

                                <div class="input-registrazioni-container">

                                    <div class="more-containers-input">

                                        <div class="more-input-flex-left">
                                            <label for="password">Password</label>
                                            <input type="password" name="nuovaPassword" id="password" class="input-register"
                                                placeholder="Password" required>
                                        </div>

                                        <div class="more-input-flex-right">
                                            <label for="convPassword"><?php echo $testo_registrazione['registrazione-testo-conv-pass']; ?> Password</label>
                                            <input type="password" name="convPassword" id="convPassword" class="input-register"
                                                placeholder="<?php echo $testo_registrazione['registrazione-testo-conv-pass']; ?> Password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-btn-invio">
                                <button type="submit">
                                    <?php echo $testo_registrazione['registrazione-btn']; ?>
                                </button>
                            </div>
                        </form>

                        <div class="sezione-ritorno-login">
                            <div class="ritorno-login">
                                <span>
                                    <?php echo $testo_registrazione['registrazione-testo-login']; ?>
                                </span>
                                <a href="login.php?lang=<?php echo $lang; ?>&page=login" id="link-login">
                                    <?php echo $testo_registrazione['registrazione-link-login']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php break;
            endswitch; ?>
        </main>
    </app>
</body>

</html>