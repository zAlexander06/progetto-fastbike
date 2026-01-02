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
            </div>

            <script>
                document.getElementById("lingua-pagina").addEventListener("mouseenter", mostraOpzioniLingua);
                document.getElementById("lingua-pagina").addEventListener("mouseleave", nascondiOpzioniLingua);
            </script>

            <div id="accesso-cliente"></div>
            <div id="sezione-informazioni"></div>

            <script>
                document.getElementById("accesso-cliente").addEventListener("click", function() {
                    window.location.href = "./noIndex/auth/login.php?lang=<?php echo $lang; ?>&page=login";
                });

                document.getElementById("sezione-informazioni").addEventListener("click", function() {
                    window.location.href = "./noIndex/info.php?lang=<?php echo $lang; ?>";
                });
            </script>
        </div>
    </div>

    <div id="menu-navigazione-container">
        <?php include "header-menu.php"; ?>
    </div>
</header>