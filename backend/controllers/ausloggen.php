<?php
session_start();
$_SESSION = [];
// Löschen von evtl. Cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Session beenden
session_destroy();
// Auf Admin-Anmeldeseite weiterleiten
header("Location: http://pejoweb.de/projekt-dbe/admin");
exit;