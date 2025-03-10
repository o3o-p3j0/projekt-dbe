<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: /login.html'); // Zur Login-Seite weiterleiten
    exit;
}
?>

<!-- Inhalt des Adminbereichs -->
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autohaus Jordan - Adminbereich</title>
    <link href="../../frontend/css/bootstrap_css/bootstrap.css" rel="stylesheet">
    <link href="../../frontend/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        <div id="nav" class="container-fluid .bg-info bg-gradient sticky-top ">
            <div class="container">
                <nav class="navbar navbar-expand-lg backmb-2">
                    <div class="container-fluid">
                        <h1 class="mt-3 gm"><b>Autohaus Jordan - Adminbereich</b></h1>
                    </div>
                    <div class="col-12 col-md-4 ps-2" id="ausloggen">
                    <button id="ausloggen" class="btn btn-danger">Admin ausloggen</button>
                </div>
                </nav>

            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="container ">
                <h2 class="mt-5"><b>Fahrzeug neu anlegen / ändern</b></h2>
                <form id="filterFormNeuesFzg">
                    <!-- Formularfelder für ein neues Fahrzeug -->
                    <fieldset>
                        <div class="row">
                            <div class="col-12 col-xl-6 mb-3">
                                <label for="model" class="form-label">
                                    <h5><b> Modellbezeichnung* </b></h5>
                                </label>
                                <input type="text" class="form-control" name="model" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="fzgTyp" class="form-label">
                                    <h5 class="my-1 d-inline"><b>Fahrzeugtyp*</b></h5>
                                </label>
                                <select class="form-select" name="fzgTyp" required>
                                    <option value="" selected>bitte auswählen</option>
                                    <option value="Limousine">Limousine</option>
                                    <option value="Kombi">Kombi</option>
                                    <option value="Cabrio">Cabrio</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Sonstige">Sonstige</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="motor" class="form-label">
                                    <h5 class="my-1 d-inline"><b>Kraftstoff*</b></h5>
                                </label>
                                <select class="form-select" name="motor" required>
                                    <option value="" selected>bitte auswählen</option>
                                    <option value="Benzin">Benzin</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Elektro">Elektro</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Sonstige">Sonstige</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="unfallfrei" class="form-label">
                                    <h5 class="my-1 d-inline"><b>Unfallfrei?*</b></h5>
                                </label>
                                <select class="form-select" name="unfallfrei" required>
                                    <option value="" selected>bitte auswählen</option>
                                    <option value="ja">ja</option>
                                    <option value="nein">nein</option>
                                    <option value="unbekannt">unbekannt</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="getriebe" class="form-label">
                                    <h5 class="my-1 d-inline"><b>Getriebeart*</b></h5>
                                </label>
                                <select class="form-select" name="getriebe" required>
                                    <option value="" selected>bitte auswählen</option>
                                    <option value="Schaltwagen">Schaltwagen</option>
                                    <option value="Automatik">Automatik</option>
                                    <option value="sonstige">sonstige</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="ez" class="form-label">
                                    <h5 class="d-inline"><b> Erstzulassung* </b></h5>
                                    <p class="d-inline">(YYYY)</p>
                                </label>
                                <input type="number" class="form-control" name="ez" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="leistung" class="form-label">
                                    <h5 class="d-inline"><b> Leistung* </b></h5>
                                    <p class="d-inline">(kW)</p>
                                </label>
                                <input type="number" class="form-control" name="leistung" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="km" class="form-label">
                                    <h5><b> Kilometerstand* </b></h5>
                                </label>
                                <input type="number" class="form-control" name="km" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="anzahlTueren" class="form-label">
                                    <h5><b> Anzahl Türen* </b></h5>
                                </label>
                                <input type="number" class="form-control" name="anzahlTueren" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="effizienzklasse" class="form-label">
                                    <h5 class="my-1 d-inline"><b>Effizienzklasse*</b></h5>
                                </label>
                                <select class="form-select" name="effizienzklasse" required>
                                    <option value="" selected>bitte auswählen</option>
                                    <option value="A+">A+</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="preis" class="form-label">
                                    <h5><b> Preis* </b></h5>
                                </label>
                                <input type="number" class="form-control" name="preis" required>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <label for="wagennummer" class="form-label">
                                    <h5><b> Wagennummer* </b></h5>
                                </label>
                                <input type="number" class="form-control" name="wagennummer" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="ausstattung" class="form-label">
                                    <h5><b>Ausstattungen</b></h5>
                                </label>
                                <textarea class="form-control" placeholder="Bitte als Fließtext eingeben" name="ausstattung" style="height: 100px"></textarea>
                            </div>
                            <div id="dbid" name="dbid" style="color: lightgray">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Fahrzeugdaten übermitteln -->
                    <div class="col-12 my-4">
                        <button type="submit" id="suche" class="btn btn-primary mb-2 me-2" style="display: inline-block">Neues Fahrzeug anlegen</button>
                        <button type="submit" id="aendern" class="btn btn-primary mb-2 me-2" style="display: none">Fahrzeugdaten ändern</button>
                        <button id="resetten" class="btn btn-primary mb-2">Alle Eingaben resetten</button>
                    </div>
                </form>
                <!-- DIV für Responsemeldungen -->
                <div id="responseNeuesFzg"></div>
                <hr>

                <!-- Fahrzeugdaten ändern -->
                <form id="fzgAendern">
                    <h2 class="my-3"><b>Fahrzeugdaten ändern</b></h2>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <input type="number" class="form-control" id="wagennummer" placeholder="Wagennr. eingeben" name="wagennummer" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-3" id="fzgAufrufen">
                            <button id="fzgAendern" class="btn btn-primary">Fahrzeugdaten aufrufen</button>
                        </div>
                    </div>
                </form>
                <hr>
                <!-- Fahrzeuge löschen -->
                <form id="fzgLoeschen">
                    <h2 class="my-3"><b>Fahrzeug löschen</b></h2>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <input type="number" class="form-control" placeholder="Wagennr. eingeben" name="wgnrloeschen" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-3">
                            <button id="wgnrloeschen" class="btn btn-danger">Wagennummer löschen</button>
                        </div>
                    </div>
                </form>
                <!-- DIV für Responsemeldungen -->
                <div id="responseFzgLoeschen"></div>
                <hr>
            </div>
        </div>
    </div>
    <!-- Container 3 -->
    <div id="footer" class="container-fluid">
        <!-- Footer -->
        <div class="row">
            <nav class="navbar navbar-expand ">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link" href="impressum.html">Impressum</a>
                            <a class="nav-link" href="agb.html">AGB</a>
                            <a class="nav-link" href="datenschutz.html">Datenschutz</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    </div>
    <script src="../../frontend/js/bootstrap_js/bootstrap.js"></script>
    <script src="js/resetFormular.js"></script>
    <script src="js/neuesFzg.js"></script>
    <script src="js/fzgLoeschen.js"></script>
    <script src="js/main.js"></script>
    <script src="js/holeFzgZumAendern.js"></script>
    <script src="js/fzgAendern.js"></script>
</body>

</html>