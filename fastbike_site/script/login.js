document.addEventListener("DOMContentLoaded", function () {
    const email = document.getElementById("email-login");
    const password = document.getElementById("password-login");
    const btn = document.getElementById("btn-login");

    function convalidaLogin() {
        const emailOk = email.value.trim().length > 0;
        const passOk = password.value.trim().length > 0;

        btn.disabled = !(emailOk && passOk);
    }

    email.addEventListener("input", convalidaLogin);
    password.addEventListener("input", convalidaLogin);
});