// Event-Listener für das Absenden des Formulars
document
  .getElementById("filterForm").addEventListener("submit", function (event) {
    event.preventDefault(); //verhindert das Neuladen der Seite

    //Formulardaten mit FormData()-Objekt erfassen
    const formData = new FormData(event.target);

    // Objekt zur Speicherung der Filterwerte erstellen
    const filter = {};

    // Dieser Wert sagt der Backendlogik, das es sich bei
    // dem POST-Request um eine Abfrage handelt (keine Fahrzeugneuanlage in DB)
    filter.action = "holeFzg";

    // Sammeln der gewählten Fahrzeugtypen
    filter.fzgTyp = formData.getAll("fzgTyp");

    // Sammeln der gewählten Motorvarianten
    filter.motor = formData.getAll("motor");

    // Erfassen des gewählten Erstzulassungsbereiches
    const ezVon = formData.get("ezVon");
    const ezBis = formData.get("ezBis");
    if (ezVon) filter.ezVon = ezVon;
    if (ezBis) filter.ezBis = ezBis;

    // Erfassen des gewählten Kilometerbereiches
    const kmVon = formData.get("kmVon");
    const kmBis = formData.get("kmBis");
    if (kmVon) filter.kmVon = kmVon;
    if (kmBis) filter.kmBis = kmBis;

    // Erfassen des gewählten Preisbereiches
    const preisVon = formData.get("preisVon");
    const preisBis = formData.get("preisBis");
    if (preisVon) filter.preisVon = preisVon;
    if (preisBis) filter.preisBis = preisBis;

    // Debugging - löschen
    console.log(filter);

    // HTTP-Anfrage an das Backend
    fetch('../backend/api/carApi.php', {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(filter),
    })
      .then((response) => {
        return response.json();
      })
      .then(zeigeFzg);
  });



