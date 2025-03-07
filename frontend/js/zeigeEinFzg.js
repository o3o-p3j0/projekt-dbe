function zeigeEinFzg(fahrzeuge) {
    const container = document.getElementById("einzelAnsicht");
    // evtl. vorherige Ergebnisse leeren
    container.innerHTML = ""; 
  
    // Card für Suchergebniss erstellen
    fahrzeuge.forEach((fahrzeug) => {
      const card = document.createElement("div");
      card.className = "col";
      card.innerHTML = `
         <div class="card my-3 ">
          <div class="row no-gutters">
            <div class="col-md-6 col-sm-6">
              <img src="${fahrzeug.image}" class="card-img-top" alt="Fahrzeugbild">
            </div>
               <div class="col-md-6 col-sm-6">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title display-5"><b>${fahrzeug.model}</b></h3>
                    <p class="card-text my-0">${fahrzeug.fzgTyp} - ${fahrzeug.getriebe}</p>
                    <p class="card-text my-0">EZ: ${fahrzeug.ez}</p>
                    <p class="card-text my-0">km: ${Number(fahrzeug.km).toLocaleString('de-DE')}</p>
                    <p class="card-text my-0">Kraftstoff: ${fahrzeug.motor}</p>
                    <p class="card-text my-0">Leistung: ${fahrzeug.leistung} kW/${Math.round(fahrzeug.leistung * 1.36)} PS</p>
                    <p class="card-text my-0">Wagennummer: ${fahrzeug.wagennummer}<p>
                    <h2 class="card-text my-0 mt-auto d-flex justify-content-start justify-content-md-end w-100"><b><span id="preis">Preis: ${Number(fahrzeug.preis).toLocaleString("de-DE")} €</span></b>
                </div>
              </div>
              <div class="col m-3">
                <p class="card-text my-0"><b>Unfallfrei:</b> ${fahrzeug.unfallfrei}</p><br>
                <p class="card-text my-0"><b>Effizienzklasse:</b> ${fahrzeug.effizienzklasse}</p><br>
                <p class="card-text my-0"><b>Ausstattung:</b> ${fahrzeug.ausstattung}</p><br>
              </div>
          </div>
        </div>
        `;
      container.appendChild(card);
    });
  }