<?php
// Session starten
session_start();

function logLoginAttempt($username, $success) {
    $logFile = 'login_log.txt';
    $ip = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unbekannt';
    $time = date('Y-m-d H:i:s');
    $status = $success ? 'Erfolgreich' : 'Fehlgeschlagen';
    
    $logEntry = "[$time] IP: $ip | Benutzername: $username | Status: $status | User-Agent: $userAgent\n";
    
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $password = $data['password'];

    // Passwort-Hash aus der Datenbank oder statisch
    $hashedPassword = '$2y$10$ff6P2cdegEdP57/FqJek4eyXETNqIQ.1lGZAwaqZTzvO5CKHRaWbO';

    if ($username === 'admin' && password_verify($password, $hashedPassword)) {
        $_SESSION['authenticated'] = true;
        logLoginAttempt($username, true);
        echo json_encode(['success' => true]);
    } else {
        logLoginAttempt($username, false);
        echo json_encode(['success' => false, 'message' => 'Ungültige Anmeldedaten.']);
    }
}
?>
