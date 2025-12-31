// parte del header
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

function tornaPaginaIniziale() {
    window.location.href = "../../index.php";
}

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