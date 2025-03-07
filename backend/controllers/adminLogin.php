<?php
// Session starten
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $password = $data['password'];

    // Benutzerdaten überprüfen
    if ($username === 'admin' && password_verify($password, '$2y$10$ff6P2cdegEdP57/FqJek4eyXETNqIQ.1lGZAwaqZTzvO5CKHRaWbO')) { 
        $_SESSION['authenticated'] = true;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ungültige Anmeldedaten.']);
    }
}
?>