<?php
session_start();

require_once '../config/db.php';
require_once '../controllers/CarController.php';

header("Content-Type: application/json");

// Request-Methode auslesen
$method = $_SERVER['REQUEST_METHOD'];

// Funktion zur Verbindung mit Datenbank aufrufen
$conn = getDbConnection();

// Empfangen der JSON-Daten vom Frontend
$data = json_decode(file_get_contents('php://input'), true);

// Erstellen einer neuen Instanz der Klasse "CarController"
$carController = new CarController();

// Aufruf der Instanzen je nach Methode
switch ($method) {
    case 'POST':
        // prüft, ob Fahrzeug(e) geholt werden sollen 
        if ($data['action'] === "holeFzg") {
            $carController->postAbfrage($conn, $data);
            break;
        };
        // prüft, ob Fahrzeuge angfelegt werden sollen 
        if ($data['action'] === "neuesFzg") {
            $carController->postNeuesFzg($conn, $data);
            break;
        };
    case 'DELETE':
        $carController->delete($conn, $data);
        break;
    case 'PUT':
        $carController->put($conn, $data);
        break;
};
