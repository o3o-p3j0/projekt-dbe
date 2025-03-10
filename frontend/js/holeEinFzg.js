// Wagennummer aus URL auslesen
const params = new URLSearchParams(window.location.search);
const wagennr = params.get("wagennr"); // Holt den Wert von 'wagen'

// HTTP-Anfrage an das Backend
if (wagennr) {
    fetch('../backend/api/carApi.php', {
        method: "POST",
        header: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({action: "holeFzg", wagennummer: wagennr}),
    })
    .then((response) => {
        return response.json();
    })
    .then(zeigeEinFzg);
};


