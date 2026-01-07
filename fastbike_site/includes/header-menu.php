<?php $url_link = "index.php?lang=$lang"; ?>

<div id="btn-menu-navigazione"></div>
<div id="dialog-menu-container">
    <div id="dialog-menu">
        <div class="chiusura-menu">
            <button id="btn-chiudi-menu">
                <div id="img-chiudi-menu"></div>
            </button>
        </div>
        <ul class="diverse-categorie-container">
            <li class="elemento-categoria-menu">
                <?php
                if (isset($_SESSION['utente_loggato']) && $_SESSION['utente_loggato'] === true) {
                    $linkMenu = "./noIndex/area-utente/areaUtente.php?lang=$lang";
                    $testoMenu = "Vai alla tua area: " . htmlspecialchars($_SESSION['utente_nome'] ?? "Utente");
                } else {
                    $linkMenu = "./noIndex/auth/login.php?lang=$lang&page=login";
                    $testoMenu = $testo['nav_accedi'];
                }
                ?>

                <a href="<?php echo $linkMenu; ?>" class="link-menu-pagina">
                    <span class="testo-link-menu"><?php echo $testoMenu; ?></span>
                    <div class="img-freccia-link"></div>
                </a>
            </li>
            <li class="elemento-categoria-menu">
                <a href="<?php echo $url_link; ?>&page=noleggioBici" class="link-menu-pagina">
                    <span class="testo-link-menu"><?php echo $testo['nav_noleg-bici'] ?></span>
                    <div class="img-freccia-link"></div>
                </a>
            </li>
            <li class="elemento-categoria-menu">
                <a href="<?php echo $url_link; ?>&page=info" class="link-menu-pagina">
                    <span class="testo-link-menu"><?php echo $testo['nav_info'] ?></span>
                    <div class="img-freccia-link"></div>
                </a>
            </li>
            <li class="elemento-categoria-menu">
                <a href="<?php echo $url_link; ?>&page=contatti" class="link-menu-pagina">
                    <span class="testo-link-menu"><?php echo $testo['nav_contatti'] ?></span>
                    <div class="img-freccia-link"></div>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    document.getElementById("btn-menu-navigazione").addEventListener("click", mostraMenu);
    document.getElementById("dialog-menu-container").addEventListener("click", nascondiMenu);
    document.getElementById("btn-chiudi-menu").addEventListener("click", nascondiMenu);
</script>