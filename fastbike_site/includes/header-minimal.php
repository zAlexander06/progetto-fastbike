<div class="soloLogoCompagnia-container">
    <div class="tornaHomepage">
        <button id="btn-torna-homepage">
            <span id="img-home"></span>
            <p class="t-btn">
                <?php echo $testo['login-btn-homepage']; ?>
            </p>
        </button>

        <script>
            document.getElementById("btn-torna-homepage").addEventListener("click", function() {
                window.location.href = "<?php echo $index . "?lang=" . $lang . "&page=home" ?>";
            });
        </script>
    </div>

    <button id="btn-logo-info">
        <div id="logo"></div>
        <div id="nomeCompagnia">
            <span>Fastbike</span>
        </div>
    </button>

    <div id="lingua-pagina-mini-header" style="background-image: url('<?php echo $testo['header-bandiera_img']; ?>'">
        <div class="selezione-lingua-container">
            <div id="cambio-lingua">
                <?php if ($lang === 'it'): ?>
                    <div id="lingua-en">
                        <div id="inglese"></div>
                        <script>
                            document.getElementById("inglese").addEventListener("click", function() {
                                window.location.href = "<?php $paginaCorrente; ?>?lang=en&page=<?php echo $pagina; ?>";
                            });
                        </script>
                    </div>
                <?php else: ?>
                    <div id="lingua-it">
                        <div id="italiano"></div>
                        <script>
                            document.getElementById("italiano").addEventListener("click", function() {
                                window.location.href = "<?php $paginaCorrente; ?>?lang=it&page=<?php echo $pagina; ?>";
                            });
                        </script>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("lingua-pagina-mini-header").addEventListener("mouseenter", mostraOpzioniLingua);
        document.getElementById("lingua-pagina-mini-header").addEventListener("mouseleave", nascondiOpzioniLingua);
    </script>
</div>