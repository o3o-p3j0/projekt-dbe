<?php
class CarController
{
    // Holen von einem oder mehreren Fahrzeugen
    public function postAbfrage($conn, $data)
    {
        // Basis-SQL-Abfrage
        $sql = "SELECT * FROM fahrzeuge WHERE 1=1";

        // Filter für Motorvarianten
        if (!empty($data['motor'])) {
            $motorTypes = array_map(function ($type) use ($conn) {
                return "'" . $conn->real_escape_string($type) . "'";
            }, $data['motor']);
            $sql .= " AND motor IN (" . implode(',', $motorTypes) . ")";
        }

        // Filter für Fahrzeugtyp
        if (!empty($data['fzgTyp'])) {
            $fzgTypes = array_map(function ($fzgType) use ($conn) {
                return "'" . $conn->real_escape_string($fzgType) . "'";
            }, $data['fzgTyp']);
            $sql .= " AND fzgTyp IN (" . implode(',', $fzgTypes) . ")";
        }

        // Filter für Kilometerstand
        if (!empty($data['kmVon'])) {
            $sql .= " AND km >= " . intval($data['kmVon']);
        }
        if (!empty($data['kmBis'])) {
            $sql .= " AND km <= " . intval($data['kmBis']);
        }

        // Filter für Erstzulassung
        if (!empty($data['ezVon'])) {
            $sql .= " AND ez >= " . intval($data['ezVon']);
        }
        if (!empty($data['ezBis'])) {
            $sql .= " AND ez <= " . intval($data['ezBis']);
        }

        // Filter für den Preis
        if (!empty($data['preisVon'])) {
            $sql .= " AND preis >= " . intval($data['preisVon']);
        }
        if (!empty($data['preisBis'])) {
            $sql .= " AND preis <= " . intval($data['preisBis']);
        }

        // Filter für Wagennummer
        if (!empty($data['wagennummer'])) {
            $sql .= " AND wagennummer = " . intval($data['wagennummer']);
        }

        // DB-Abfrage ausführen
        $result = $conn->query($sql);

        // Array füllen
        $fahrzeuge = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fahrzeuge[] = $row;
            }
        }

        // Schließen der DB-Verbindung
        $conn->close();

        // JSON-Antwort senden
        header('Content-Type: application/json');
        echo json_encode($fahrzeuge);
        exit;
    }
    // Neues Fahreug anlegen
    public function postNeuesFzg($conn, $data)
    {
        // Prüfen, ob als Admin eingeloggt
        if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
            header('Location: ../../../../frontend/adminlogin.html'); // Zur Login-Seite weiterleiten
            exit;
        };
        $sql = "INSERT INTO fahrzeuge (
                wagennummer,
                image,
                model,
                fzgTyp,
                motor,
                preis,
                km,
                getriebe,
                ez,
                leistung,
                anzahlTueren,
                unfallfrei,
                effizienzklasse,
                ausstattung)
                 VALUES
                  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "issssiisiissss",
            $data['wagennummer'],
            $data['image'],
            $data['model'],
            $data['fzgTyp'],
            $data['motor'],
            $data['preis'],
            $data['km'],
            $data['getriebe'],
            $data['ez'],
            $data['leistung'],
            $data['anzahlTueren'],
            $data['unfallfrei'],
            $data['effizienzklasse'],
            $data['ausstattung']
        );

        try {
            if ($stmt->execute()) {
                $response = ["success" => "Neues Fahrzeug erfolgreich erstellt"];
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                $response = ["error" => "Die Wagennummer ist bereits vorhanden!"];
            } else {
                $response = ["error" => "Fehler beim Einfügen, bitte kontaktieren Sie die IT-Abteilung"];
            }
        }

        // JSON-Antwort senden
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // Löschen von Fahrzeugen
    public function delete($conn, $data)
    {
        // Prüfen, ob als Admin eingeloggt
        if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
            header('Location: ../../../../frontend/adminlogin.html'); // Zur Login-Seite weiterleiten
            exit;
        };
        $sql = "DELETE FROM fahrzeuge WHERE wagennummer = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $data['wgnrloeschen']);

        if ($stmt->execute()) {
            $affectedRows = $stmt->affected_rows;
            if ($affectedRows > 0) {
                $response = ["success" => "Eintrag erfolgreich gelöscht"];
            } else {
                $response = ["warning" => "Keinen Eintrag mit dieser Wagennummer gefunden oder gelöscht"];
            }
        } else {
            $response = ["error" => "Fehler beim Löschen", "message" => $stmt->error];
        }

        // JSON-Antwort senden
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // Ändern von Fahrzeugen
    public function put($conn, $data)
    {
        // Prüfen, ob als Admin eingeloggt
        if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
            header('Location: ../../../../frontend/adminlogin.html'); // Zur Login-Seite weiterleiten
            exit;
        }
        $sql = "UPDATE fahrzeuge 
        SET
            wagennummer = ?,
            model = ?,
            fzgTyp = ?,
            motor = ?,
            preis = ?,
            km = ?,
            getriebe = ?,
            ez = ?,
            leistung = ?,
            anzahlTueren = ?,
            unfallfrei = ?,
            effizienzklasse = ?,
            ausstattung = ?
         WHERE id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "isssiisiissssi",
            $data['wagennummer'],
            $data['model'],
            $data['fzgTyp'],
            $data['motor'],
            $data['preis'],
            $data['km'],
            $data['getriebe'],
            $data['ez'],
            $data['leistung'],
            $data['anzahlTueren'],
            $data['unfallfrei'],
            $data['effizienzklasse'],
            $data['ausstattung'],
            $data['id']
        );

        try {
            if ($stmt->execute()) {
                $response = ["success" => "Fahrzeug erfolgreich geändert"];
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1452) {
                $response = ["error" => "Die Datensatz-ID ist nicht vorhanden!"];
            } else {
                $response = ["error" => "Fehler beim Ändern, bitte kontaktieren Sie die IT-Abteilung"];
            }
        }

        // JSON-Antwort senden
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
