// Fahrzeugdaten ändern
document.getElementById("aendern").addEventListener("click", function (event) {
  event.preventDefault(); //verhindert das Neuladen der Seite

  //Formulardaten mit FormData()-Objekt erfassen
  const form = document.getElementById("filterFormNeuesFzg");
  const formData = new FormData(form);

  // Objekt zur Speicherung der Fahrzeugwerte erstellen
  const aenderungFzg = {};

  // Bestimmung der Datenbank ID
  aenderungFzg.id = document.getElementById("dbid").innerHTML;

  // Ändern der Modellbezeichnung
  aenderungFzg.model = formData.get("model");

  // Ändern des Fahrzeugtyps
  aenderungFzg.fzgTyp = formData.get("fzgTyp");

  // Ändern der Motorvariante
  aenderungFzg.motor = formData.get("motor");

  // Ändern unfallfreiheit
  aenderungFzg.unfallfrei = formData.get("unfallfrei");

  // Ändern der Getriebevariante
  aenderungFzg.getriebe = formData.get("getriebe");

  // Ändern Erstzulassung
  aenderungFzg.ez = formData.get("ez");

  // Ändern Leistung
  aenderungFzg.leistung = formData.get("leistung");

  // Ändern Kilometerstand
  aenderungFzg.km = formData.get("km");

  // Ändern Anzahl Türen
  aenderungFzg.anzahlTueren = formData.get("anzahlTueren");

  // Ändern Effizienzklasse
  aenderungFzg.effizienzklasse = formData.get("effizienzklasse");

  // Ändern Preis
  aenderungFzg.preis = formData.get("preis");

  // Ändern Wagennummer
  aenderungFzg.wagennummer = formData.get("wagennummer");

  // Ändern Ausstattungen
  aenderungFzg.ausstattung = formData.get("ausstattung");

  // Debugging -> löschen
  console.log(JSON.stringify(aenderungFzg));

  // HTTP-Request an das Backend
  fetch("../api/carApi.php", {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(aenderungFzg),
  })
    .then((response) => {
      return response.json();
    })
    .then(showResponseAnlegen)
    .then(resetten);
});

// Erfolgs- bzw. Fehlermeldung
// function showResponseAnlegen(responseText) {
//   const responseaenderungFzg = document.getElementById("responseaenderungFzg");
//   if (responseText.success) {
//     responseaenderungFzg.textContent = responseText.success;
//     responseaenderungFzg.style.color = "green";
//   } else {
//     if (responseText.error) {
//       responseaenderungFzg.textContent = responseText.error;
//       responseaenderungFzg.style.color = "red";
//     }
//   }
// }
