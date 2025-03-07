// Fahrzeug neu anlegen
document
  .getElementById("filterFormNeuesFzg")
  .addEventListener("submit", function (event) {
    event.preventDefault(); //verhindert das Neuladen der Seite

    //Formulardaten mit FormData()-Objekt erfassen
    const formData = new FormData(event.target);

    // Objekt zur Speicherung der Fahrzeugwerte erstellen
    const neuesFzg = {};

    // Pfad für Platzerhalterbild
    neuesFzg.image = "img/auto.jpg";

    // Hinzufügen der Modellbezeichnung
    neuesFzg.model = formData.get("model");

    // Dieser Wert sagt der Backendlogik, das es sich bei
    // dem POST-Request um eine Abfrage Fahrzeugneuanlage in DB handelt
    // (keine Fahrzeugabfrage)
    neuesFzg.action = "neuesFzg";

    // Hinzufügen des Fahrzeugtyps
    neuesFzg.fzgTyp = formData.get("fzgTyp");

    // Hinzufügen der Motorvariante
    neuesFzg.motor = formData.get("motor");

    // Hinzufügen unfallfreiheit
    neuesFzg.unfallfrei = formData.get("unfallfrei");

    // Hinzufügen der Getriebevariante
    neuesFzg.getriebe = formData.get("getriebe");

    // Hinzufügen Erstzulassung
    neuesFzg.ez = formData.get("ez");

    // Hinzufügen Leistung
    neuesFzg.leistung = formData.get("leistung");

    // Hinzufügen Kilometerstand
    neuesFzg.km = formData.get("km");

    // Hinzufügen Anzahl Türen
    neuesFzg.anzahlTueren = formData.get("anzahlTueren");

    // Hinzufügen Effizienzklasse
    neuesFzg.effizienzklasse = formData.get("effizienzklasse");

    // Hinzufügen Preis
    neuesFzg.preis = formData.get("preis");

    // Hinzufügen Wagennummer
    neuesFzg.wagennummer = formData.get("wagennummer");

    // Hinzufügen Ausstattungen
    neuesFzg.ausstattung = formData.get("ausstattung");

    // Debugging
    console.log(JSON.stringify(neuesFzg));

    // HTTP-Request an das Backend
    fetch("../api/carApi.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(neuesFzg),
    })
      .then((response) => {
        return response.json();
      })
      .then(showResponseAnlegen)
      .then(resetten);
  });

// Erfolgs- bzw. Fehlermeldung
function showResponseAnlegen(responseText) {
  const responseNeuesFzg = document.getElementById("responseNeuesFzg");
  if (responseText.success) {
    responseNeuesFzg.textContent = responseText.success;
    responseNeuesFzg.style.color = "green";
  } else {
    if (responseText.error) {
      responseNeuesFzg.textContent = responseText.error;
      responseNeuesFzg.style.color = "red";
    }
  }
}
