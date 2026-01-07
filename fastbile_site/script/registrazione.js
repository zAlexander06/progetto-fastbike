document.addEventListener("DOMContentLoaded", function () {
    const email = document.getElementById("email-register");
    const cognome = document.getElementById("cognome");
    const numTelefono = document.getElementById("numTelefono");
    const dataNascita = document.getElementById("dataNascita");
    const codFiscale = document.getElementById("codFiscale");
    const btn = document.getElementById("btn-registrazione");
    const TC = document.getElementById("idTerminiCondizioni");

    const password = document.getElementById("password-register");
    const password_conv = document.getElementById("convPassword");

    const mxChar = document.getElementById("mx-char");
    const noSpazio = document.getElementById("no-spazio");
    const Up = document.getElementById("Up");
    const Low = document.getElementById("Low");
    const num = document.getElementById("num");
    const symbol = document.getElementById("symbol");

    let passwordValida = false;
    let passwordConfermata = false;

    function validaPassword() {
        const pwd = password.value;

        const regole = {
            lunghezza: pwd.length >= 8,
            spazio: !/\s/.test(pwd),
            maiuscola: /[A-Z]/.test(pwd),
            minuscola: /[a-z]/.test(pwd),
            numero: /\d/.test(pwd),
            simbolo: /[!@#$%^&*(),.?":{}|<>]/.test(pwd)
        };

        mxChar.style.color = regole.lunghezza ? "green" : "red";
        noSpazio.style.color = regole.spazio ? "green" : "red";
        Up.style.color = regole.maiuscola ? "green" : "red";
        Low.style.color = regole.minuscola ? "green" : "red";
        num.style.color = regole.numero ? "green" : "red";
        symbol.style.color = regole.simbolo ? "green" : "red";

        passwordValida = Object.values(regole).every(Boolean);
        password.style.borderColor = passwordValida ? "green" : "red";

        aggiornaStatoForm();
    }

    function validaConfermaPassword() {
        passwordConfermata =
            password.value !== "" &&
            password.value === password_conv.value;

        password_conv.style.borderColor =
            passwordConfermata ? "green" : "red";

        aggiornaStatoForm();
    }

    function controlloUtenteMaggiorenne() {
        if (!dataNascita.value) return false;

        const oggi = new Date();
        const dataNascitaUtente = new Date(dataNascita.value);
        let eta = oggi.getFullYear() - dataNascitaUtente.getFullYear();
        const checkMese = oggi.getMonth() - dataNascitaUtente.getMonth();

        if (checkMese < 0 || (checkMese === 0 && oggi.getDate() < dataNascitaUtente.getDate())) {
            eta--;
        }

        isMaggiorenne = eta >= 18;
        dataNascita.style.borderColor = isMaggiorenne ? "green" : "red";
        return isMaggiorenne;
    }

    function aggiornaStatoForm() {
        const campiOK =
            email.value.trim() &&
            cognome.value.trim() &&
            numTelefono.value.trim() &&
            codFiscale.value.trim();

        const terminiOK = TC.checked;
        const controlloMaggiorEta = controlloUtenteMaggiorenne();

        btn.disabled = !(campiOK && passwordValida && passwordConfermata && terminiOK, controlloMaggiorEta);
    }

    password.addEventListener("input", validaPassword);
    password_conv.addEventListener("input", validaConfermaPassword);
    TC.addEventListener("change", aggiornaStatoForm);

    [email, cognome, numTelefono, codFiscale].forEach(el => el.addEventListener("input", aggiornaStatoForm));
});
