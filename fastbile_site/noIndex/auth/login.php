<?php
include "../connDB.php";

$index = "../../index.php";
$paginaCorrente = "login.php";

session_start();

$lang = $_GET['lang'] ?? 'it';
$file_lingua = "../../lang/{$lang}.php";

$pagina = $_GET['page'] ?? '';
$url_sbagliato = false;

$email_da_visualizzare = "";

if (!empty($vecchi_dati['nuovoEmail'])) {
    $email_da_visualizzare = $vecchi_dati['nuovoEmail'];
} elseif (!empty($_POST['email-cliente'])) {
    $email_da_visualizzare = $_POST['email-cliente'];
}

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
unset($_SESSION['successo_reg']);  // Lo toglie al prossimo caricamento

$errore_login = $_SESSION['errore_login'] ?? null;
unset($_SESSION['errore_login']);

/* parte della registrazione */
$errore = $_SESSION['errore_reg'] ?? "";
$vecchi_dati = $_SESSION['vecchi_dati'] ?? [];
unset($_SESSION['errore_reg']);
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
                            <div style="color: green; background: #e6ffed; padding: 10px; border: 1px solid green; border-radius: 5px; margin-bottom: 15px;">
                                <p style="margin: 0; font-weight: bold;"><?php echo $messaggio_successo; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($errore_login)): ?>
                            <div style="color: red; background: #ffeeee; padding: 10px; border-radius: 5px; margin-bottom: 15px; border: 1px solid red;">
                                <p style="margin: 0; font-weight: bold;"><?php echo htmlspecialchars($errore_login); ?></p>
                            </div>
                        <?php endif; ?>

                        <form class="loginForm" action="autenticazioneUtente.php" method="post">
                            <h2>Login</h2>
                            <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                            <div class="login-form-container">
                                <div class="singoloInput-login">
                                    <label for="email-login">Email</label>
                                    <input type="text" id="email-login" name="email-esistente" placeholder="Email" class="input-login" required
                                        autocomplete="false">
                                </div>
                                <div class="singoloInput-login">
                                    <label for="password-login">Password</label>
                                    <input type="password" id="password-login" name="password-esistente" placeholder="Password"
                                        class="input-login" required>
                                </div>
                            </div>
                            <div class="form-btn-invio">
                                <button type="submit" id="btn-login" disabled>
                                    <?php echo $testo_login['login-btn']; ?>
                                </button>
                            </div>
                            <script src="../../script/login.js"></script>
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
                    <div class="register-container">
                        <form action="registrazione.php" method="post" class="registerForm">

                            <?php if ($errore): ?>
                                <div style="color: red; background: #ffeeee; padding: 10px; border-radius: 5px; margin-bottom: 15px; border: 1px solid red;">
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
                                    <label for="email-register">Email <span style="font-weight: bold">*</span></label>
                                    <input type="email" name="nuovoEmail" id="email-register" class="input-register" value="<?php echo htmlspecialchars($email_da_visualizzare); ?>" placeholder=" Email" required>
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
                                            <label for="dataNascita"><?php echo $testo_registrazione['registrazione-testo-dataNascita']; ?> <span style="font-weight: bold">*</span></label>
                                            <input type="date" name="dataNascita" id="dataNascita" class="input-register"
                                                placeholder="numero di Telefono" value="<?php echo htmlspecialchars($vecchi_dati['dataNascita'] ?? ''); ?>" required>
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
                                            <label for="password-register">Password</label>
                                            <input type="password" name="nuovaPassword" id="password-register" class="input-register"
                                                placeholder="Password" required>
                                            <!-- <input type="button" class="img-mostra-password"> -->
                                        </div>

                                        <div class="more-input-flex-right">
                                            <label for="convPassword"><?php echo $testo_registrazione['registrazione-testo-conv-pass']; ?> Password</label>
                                            <input type="password" name="convPassword" id="convPassword" class="input-register"
                                                placeholder="<?php echo $testo_registrazione['registrazione-testo-conv-pass']; ?> Password" required>
                                            <!-- <input type="button" class="img-mostra-password"> -->
                                        </div>
                                    </div>
                                </div>

                                <hr class="hr-boh">

                                <div class="controllo-password">
                                    <p style="margin: 0px; font-weight: bold;"><?php echo $testo_registrazione['registrazione-controllo-password-titolo']; ?>:</p>
                                    <ol class="controllo-password-lista">
                                        <li id="mx-char"><?php echo $testo_registrazione['registrazione-controllo-password-mxChar']; ?></li>
                                        <li id="no-spazio"><?php echo $testo_registrazione['registrazione-controllo-password-noSpace']; ?></li>
                                        <li id="Up"><?php echo $testo_registrazione['registrazione-controllo-password-Upper']; ?></li>
                                        <li id="Low"><?php echo $testo_registrazione['registrazione-controllo-password-Lower']; ?></li>
                                        <li id="num"><?php echo $testo_registrazione['registrazione-controllo-password-wNum']; ?></li>
                                        <li id="symbol"><?php echo $testo_registrazione['registrazione-controllo-password-wSym']; ?> (es. !@#$%)</li>
                                    </ol>
                                </div>

                                <hr class="hr-boh">

                                <div class="terminiCondizioni">
                                    <label>
                                        <input type="checkbox" name="terms" id="idTerminiCondizioni" required>
                                        <?php echo $testo_registrazione['registrazione-termini-condizioni-prima']; ?>
                                        <!-- <a href="https://cdn.donmai.us/original/70/2b/__nakano_itsuki_go_toubun_no_hanayome_drawn_by_gabiran__702bf74b7537ef9b2f13faacb27cc5bc.jpg">Termini e Condizioni</a> -->
                                        <a href="./TerminiCondizioni.html"><?php echo $testo_registrazione['registrazione-termini-condizioni']; ?></a>
                                    </label>
                                </div>
                            </div>

                            <div class="form-btn-invio">
                                <button type="submit" id="btn-registrazione" disabled>
                                    <?php echo $testo_registrazione['registrazione-btn']; ?>
                                </button>
                            </div>
                            <script src="../../script/registrazione.js"></script>
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