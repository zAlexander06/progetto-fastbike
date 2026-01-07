document.addEventListener("DOMContentLoaded", function () {
    var mClienti = document.getElementById("mostra-clienti");
    var mSedi = document.getElementById("mostra-sedi");
    var mBiciclette = document.getElementById("mostra-biciclette");
    var iframe = document.getElementById("container-iframe");

    mClienti.addEventListener("click", function () {
        iframe.src = "./visualizzazione/visClienti.php";
    });

    mSedi.addEventListener("click", function () {
        iframe.src = "./visualizzazione/visSedi.php";
    });

    mBiciclette.addEventListener("click", function () {
        iframe.src = "./visualizzazione/visBiciclette.php";
    });
})