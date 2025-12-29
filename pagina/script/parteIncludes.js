//  uso del JQuery per caricare header e footer in HTML
$(function () {
    $("#header").load('includes/header.html', function () {
        const langCorrente = document.documentElement.lang;

        if (langCorrente == "en") {
            $("#footer").load('includes/en/footer.html');
            $("#bloccoContenuto").load('includes/en/minWidth.html');
            document.getElementById("lingua-pagina").style.backgroundImage = "url('imgs/lingue/eng.png')";
            document.getElementById("lingua-en").style.display = "none";
            document.getElementById("lingua-it").style.display = "block";
        } else if (langCorrente == "it") {
            $("#footer").load('includes/it/footer.html');
            $("#bloccoContenuto").load('includes/it/minWidth.html');
            document.getElementById("lingua-pagina").style.backgroundImage = "url('imgs/lingue/it.png')";
            document.getElementById("lingua-en").style.display = "block";
            document.getElementById("lingua-it").style.display = "none";
        }
    });
});

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

// parte del footer