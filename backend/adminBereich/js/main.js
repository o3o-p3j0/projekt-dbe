// Logik zum Leeren der Response-Text-DIVs bei  Klick in ein Feld
// oder auf einen Button
document.addEventListener("click", function (event) {
  if (event.target.tagName === "INPUT" || "TEXTAREA" || "BUTTON") {
    responseTextLoeschen();
  }
});
function responseTextLoeschen() {
  const responseFzgLoeschen = document.getElementById("responseFzgLoeschen");
  const responseNeuesFzg = document.getElementById("responseNeuesFzg");
  responseFzgLoeschen.textContent = "";
  responseNeuesFzg.textContent = "";
}

// Admin ausloggen
document.getElementById('ausloggen').addEventListener('click', () => {
  window.location.href = '../controllers/ausloggen.php';
});