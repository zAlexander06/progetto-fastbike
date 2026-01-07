<header id="header">
    <div class="parteHeaderInterna">
        <div class="sezione-logo-nomeCompagnia">
            <button id="btn-logo">
                <div id="logo"></div>
                <div id="nomeCompagnia">
                    <span>Fastbike</span>
                </div>
            </button>
        </div>

        <div class="sezione-navigazione">
            <div id="lingua-pagina" style="background-image: url('<?php echo $testo['header-bandiera_img']; ?>'">
                <div class="selezione-lingua-container">
                    <div id="cambio-lingua">
                        <?php if ($lang === 'it'): ?>

                            <div id="lingua-en">
                                <div id="inglese"></div>
                                <script>
                                    document.getElementById("inglese").addEventListener("click", function() {
                                        window.location.href = "index.php?lang=en&page=<?php echo $pagina; ?>";
                                    });
                                </script>
                            </div>

                        <?php else: ?>

                            <div id="lingua-it">
                                <div id="italiano"></div>
                                <script>
                                    document.getElementById("italiano").addEventListener("click", function() {
                                        window.location.href = "index.php?lang=it&page=<?php echo $pagina; ?>";
                                    });
                                </script>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>

                <script>
                    document.getElementById("lingua-pagina").addEventListener("mouseenter", mostraOpzioniLingua);
                    document.getElementById("lingua-pagina").addEventListener("mouseleave", nascondiOpzioniLingua);
                </script>
            </div>

            <div class="zona-utente-container">
                <div id="accesso-cliente"></div>
                <?php if (isset($_SESSION['utente_loggato']) && $_SESSION['utente_loggato'] === true) : ?>
                    <div id="menu-cliente-container">
                        <div class="menu-cliente-links">
                            <a href="noIndex/area-utente/areaUtente.php?lang=<?php echo $lang; ?>"
                                class="utente-link-container" Title="Il mio profilo">
                                <div id="img-utente"></div>
                                <span style="color: white;"><?php echo htmlspecialchars($_SESSION['utente_nome'] ?? "Utente"); ?></span>
                            </a>
                            <span id="logout-text"><?php echo $testo['header-menu-utente-logout']; ?></span>
                        </div>
                        <script>
                            document.getElementById("accesso-cliente").addEventListener("click", gestioneMenuUtenteHeader);
                            document.getElementById("logout-text").addEventListener("click", function() {
                                window.location.href = "<?php echo $paginaLogout; ?>";
                            })
                        </script>
                    </div>
                <?php elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) : ?>
                    <script>
                        document.getElementById("accesso-cliente").addEventListener("click", function() {
                            window.location.href = "./noIndex/area-riservata/areaRiservata.php?lang=<?php echo $lang; ?>";
                        });
                    </script>
                <?php else: ?>
                    <script>
                        document.getElementById("accesso-cliente").addEventListener("click", function() {
                            window.location.href = "./noIndex/auth/login.php?lang=<?php echo $lang; ?>&page=login";
                        });
                    </script>
                <?php endif; ?>
            </div>

            <div id="sezione-informazioni"></div>

            <script>
                document.getElementById("sezione-informazioni").addEventListener("click", function() {
                    window.location.href = "index.php?lang=<?php echo $lang; ?>&page=info";
                });
            </script>
        </div>

        <div id="menu-navigazione-container">
            <?php include "header-menu.php"; ?>
        </div>
    </div>
</header>