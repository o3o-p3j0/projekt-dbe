document
  .getElementById("fzgLoeschen")
  .addEventListener("submit", function (event) {
    event.preventDefault(); //verhindert das Neuladen der Seite

    //Formulardaten mit FormData()-Objekt erfassen
    const formData = new FormData(event.target);

    // Objekt zur Speicherung der zu löschenden Wagennummer
    const fzgLoeschen = {};

    // Hinzufügen der Wagennummer
    fzgLoeschen.wgnrloeschen = formData.get("wgnrloeschen");

    // HTTP-Request an das Backend
    fetch("../api/carApi.php", {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(fzgLoeschen),
    })
      .then((response) => {
        return response.json();
      })
      .then(showResponseLoschen)
      .then(resetten);
  });

// Erfolgs- bzw. Fehlermeldung
function showResponseLoschen(responseText) {
  const responseDiv = document.getElementById("responseFzgLoeschen");
  if (responseText.success) {
    responseDiv.textContent = responseText.success;
    responseDiv.style.color = "green";
  } else {
    if (responseText.error) {
      responseDiv.textContent = responseText.error + responseText.message;
      responseDiv.style.color = "red";
    } else {
      if (responseText.warning) {
        responseDiv.textContent = responseText.warning;
        responseDiv.style.color = "blue";
      }
    }
  }
}
