// EventListener erstellen
document
  .getElementById("loginForm")
  .addEventListener("submit", function (event) {
    // Blockt das Standardverhalten des Formulars
    event.preventDefault();

    // Username und Passwort auslesen
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    // Fetch-Anfrage an das Backend senden
    fetch("../backend/controllers/adminLogin.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ username: username, password: password }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Weiterleitung zum Adminbereich
          window.location.href = "../backend/adminBereich/admin.php";
        } else {
          document.getElementById("errorMessage").textContent = data.message;
        }
      })
      .catch((error) => {
        console.error("Fehler bei der Adminanmeldung:", error);
        document.getElementById("errorMessage").textContent =
          "Ein Fehler ist aufgetreten. Admin-Benutzername oder Passwort falsch!";
      });
  });
