// parte del header

/* per il menu lingua */
function mostraOpzioniLingua() {
    var cambiaLingua = document.getElementById("cambio-lingua");
    cambiaLingua.style.animation = "none";
    void cambiaLingua.offsetWidth;
    cambiaLingua.style.animation = "mostraLingua 0.3s forwards";
}

function nascondiOpzioniLingua() {
    var cambiaLingua = document.getElementById("cambio-lingua");
    cambiaLingua.style.animation = "none";
    void cambiaLingua.offsetWidth;
    cambiaLingua.style.animation = "nascondiLingua 0.3s forwards";
}

/* per il menu utente */
function gestioneMenuUtenteHeader() {
    var btn = this;
    var menu = document.getElementById("menu-cliente-container");

    if (!menu.classList.contains("menu-aperto")) {
        menu.style.display = "block";
        menu.style.animation = "mostraMenuUtente 0.35s forwards";
        btn.classList.add("no-effetto-hover");
        menu.classList.add("menu-aperto");
    } else {
        menu.style.animation = "nascondiMenuUtente 0.35s ease-in";
        btn.classList.remove("no-effetto-hover");
        menu.classList.remove("menu-aperto");

        setTimeout(() => {
            if (!menu.classList.contains("menu-aperto")) menu.style.display = "none";
        }, 350);
    }
}

function tornaPaginaIniziale() {
    window.location.href = "../../index.php";
}

/* questo si attiva con il media query */
function mostraMenu() {
    const menu = document.getElementById('dialog-menu-container');
    menu.style.animation = "none";
    void menu.offsetParent;
    menu.style.animation = "mostraMenu 0.25s forwards";

    document.body.style.overflow = "hidden";

    document.getElementById("dialog-menu-container").classList.add("blur-dietro");
}

function nascondiMenu() {
    const btnChiudi = document.getElementById('dialog-menu-container');
    btnChiudi.style.animation = "none";
    void btnChiudi.offsetParent;
    btnChiudi.style.animation = "nascondiMenu 0.25s forwards"

    document.body.style.overflow = "auto";

    document.getElementById("dialog-menu-container").classList.remove("blur-dietro");
}

// parte del footer