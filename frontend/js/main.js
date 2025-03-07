/**
 * Werte für Dropdown-Optionen für Erstzulassung (1990 - aktuelles Jahr)
 */
const ezSelects = [
  document.getElementById("ezVon"),
  document.getElementById("ezBis"),
];
// -- Aktuelles Jahr berechnen
const currentYear = new Date().getFullYear(); // Holt das aktuelle Jahr (z. B. 2025)
// -- Werta via HTMLOptionElement den Dropdowns hinzufügen
for (let year = currentYear; year >= 1990; year--) {
  ezSelects.forEach((select) => {
    let option = new Option(year, year);
    select.add(option);
  });
}

/**
 * Werte für Dropdown-Optionen für Kilometer (10.000 - 250.000 in Zehnerschritten)
 */
const kmSelects = [
  document.getElementById("kmVon"),
  document.getElementById("kmBis"),
];
// -- Werte via HTMLOptionElement den Dropdowns hinzufügen
for (let km = 10000; km <= 250000; km += 10000) {
  kmSelects.forEach((select) => {
    let option = new Option(km.toLocaleString() + " km", km);
    select.add(option);
  });
}
