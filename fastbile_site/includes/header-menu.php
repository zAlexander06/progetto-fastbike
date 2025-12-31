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
                <a href="./noIndex/auth/login.php" class="link-menu-pagina">
                    <span class="testo-link-menu"><?php echo $testo['nav_accedi'] ?></span>
                    <div class="img-freccia-link"></div>
                </a>
            </li>
            <li class="elemento-categoria-menu">
                <a href="" class="link-menu-pagina">
                    <span class="testo-link-menu"><?php echo $testo['nav_noleg-bici'] ?></span>
                    <div class="img-freccia-link"></div>
                </a>
            </li>
            <li class="elemento-categoria-menu">
                <a href="" class="link-menu-pagina">
                    <span class="testo-link-menu"><?php echo $testo['nav_info'] ?></span>
                    <div class="img-freccia-link"></div>
                </a>
            </li>
            <li class="elemento-categoria-menu">
                <a href="" class="link-menu-pagina">
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