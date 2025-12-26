// Questo codice serve per fare le traduzioni dinamiche nella pagina principale senza ricarare o link

import i18next from 'i18next';
import HttpBackend from 'i18next-http-backend';

i18next
    .use(HttpBackend) // Carica i file JSON da una cartella (es. /locales/en.json)
    .init({
        lng: 'it', // Lingua iniziale
        fallbackLng: 'en',
        backend: {
            loadPath: '/locales/{{lng}}.json',
        }
    }, (err, t) => {
        aggiornaTesti();
    });

// Funzione per cambiare lingua senza refresh
function cambiaLingua(lingua) {
    i18next.changeLanguage(lingua, () => {
        aggiornaTesti();
    });
}

function aggiornaTesti() {
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const chiave = el.getAttribute('data-i18n');
        el.innerText = i18next.t(chiave);
    });
}