// Anzeigen der Suchergebnisse
function zeigeFzg(fahrzeuge) {
    const container = document.getElementById("suchergebnis");
    // Vorherige Ergebnisse leeren
    container.innerHTML = ""; 
  
    // Cards für Suchergebnisse erstellen
    fahrzeuge.forEach((fahrzeug) => {
      const card = document.createElement("div");
      card.className = "col";
      card.innerHTML = `
         <div class="card my-3">
          <div class="row no-gutters">
            <div class="col-md-4 col-sm-6">
              <img src="${fahrzeug.image}" class="card-img-top" alt="Fahrzeugbild">
            </div>
               <div class="col-md-8 col-sm-6">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">${fahrzeug.model}</h4>
                    <p class="card-text my-0">${fahrzeug.fzgTyp} - ${fahrzeug.getriebe}</p>
                    <p class="card-text my-0">EZ: ${fahrzeug.ez}</p>
                    <p class="card-text my-0">km: ${Number(fahrzeug.km).toLocaleString('de-DE')}</p>
                    <p class="card-text my-0">Kraftstoff: ${fahrzeug.motor}</p>
                    <p class="card-text my-0">Leistung: ${fahrzeug.leistung} kW/${Math.round(fahrzeug.leistung * 1.36)} PS</p>
                    <p class="card-text my-0">Wagennummer: ${fahrzeug.wagennummer}<p>
                    <h2 class="card-text my-0 mt-auto d-flex justify-content-start justify-content-md-end w-100"><b><span id="preis">Preis: ${Number(fahrzeug.preis).toLocaleString("de-DE")} €</span></b>
                </div>
              </div>
          </div>
        </div>
        `;
        // Cards anklickbar machen für Ansicht einzelner Fahrzeuge
        card.addEventListener("click", () => {
          einzelAnsicht(fahrzeug.wagennummer);
        }
          );
      container.appendChild(card);
    });
  }

