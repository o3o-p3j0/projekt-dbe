document
  .getElementById("fzgAufrufen")
  .addEventListener("click", function (event) {
    event.preventDefault(); //verhindert das Neuladen der Seite
    const wagennummer = document.getElementById("wagennummer").value; // Holt den Wert von 'wagen'

    // HTTP-Anfrage an das Backend
    if (wagennummer) {
      fetch("../api/carApi.php", {
        method: "POST",
        header: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ action: "holeFzg", wagennummer: wagennummer }),
      })
        .then((response) => {
          return response.json();
        })
        .then(fuelleFelder);
    }
  });

function fuelleFelder(response) {

  if (Array.isArray(response) && response.length > 0) {
    document.querySelector("#filterFormNeuesFzg input[name='model']").value = response[0].model;
    document.querySelector("#filterFormNeuesFzg select[name='fzgTyp']").value = response[0].fzgTyp;
    document.querySelector("#filterFormNeuesFzg select[name='motor']").value = response[0].motor;
    document.querySelector("#filterFormNeuesFzg select[name='unfallfrei']").value = response[0].unfallfrei;
    document.querySelector("#filterFormNeuesFzg select[name='getriebe']").value = response[0].getriebe;
    document.querySelector("#filterFormNeuesFzg input[name='ez']").value = response[0].ez;
    document.querySelector("#filterFormNeuesFzg input[name='leistung']").value = response[0].leistung;
    document.querySelector("#filterFormNeuesFzg input[name='km']").value = response[0].km;
    document.querySelector("#filterFormNeuesFzg input[name='anzahlTueren']").value = response[0].anzahlTueren;
    document.querySelector("#filterFormNeuesFzg select[name='effizienzklasse']").value = response[0].effizienzklasse;
    document.querySelector("#filterFormNeuesFzg input[name='preis']").value = response[0].preis;
    document.querySelector("#filterFormNeuesFzg input[name='wagennummer']").value = response[0].wagennummer;
    document.querySelector("#filterFormNeuesFzg textarea[name='ausstattung']").value = response[0].ausstattung;
    document.querySelector("#dbid").innerHTML = response[0].id;
    resetten;
    document.querySelector("#suche").style.display="none";
    document.querySelector("#aendern").style.display="inline-block";

  } else {
    // Fehlermeldung falls Wagennummer nicht existent
    document.getElementById("responseNeuesFzg").textContent =
      "Wagennummer nicht gefunden";
    document.getElementById("responseNeuesFzg").style.color = "red";
  }
}
