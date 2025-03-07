<?php
// Datenbankkonfiguration
// Entwicklung
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'projekt_test');

// Produktiv
define('DB_HOST', 'localhost');
define('DB_USER', 'web204_2');
define('DB_PASS', 'PfDP2025!');
define('DB_NAME', 'web204_db2');

// Verbindung zur Datenbank herstellen
function getDbConnection() {
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Aktiviert Exceptions für mysqli
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conn->set_charset("utf8mb4"); // Zeichensatz setzen
        return $conn;
    } catch (mysqli_sql_exception $e) {
        // Fehler zurückgeben, z. B. als JSON für eine API
        header('Content-Type: application/json');
        echo json_encode(["error" => "Datenbankverbindungsfehler - bitte kontaktieren Sie die IT-Abteilung"]);
        exit;
    }
}
?>