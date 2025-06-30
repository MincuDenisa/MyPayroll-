<?php
session_start();
include("config.php");

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    if (isset($_POST['submit1'])) {
        $action = "Intrare";
        $column = "intrare";
    } elseif (isset($_POST['submit2'])) {
        $action = "Ieșire";
        $column = "iesire";
    }

    // Obține ora curentă
    $current_time = date("Y-m-d H:i:s");
    $current_date = date("Y-m-d");

    if (isset($column)) {
        // Începe tranzacția
        $con->begin_transaction();

        try {
            // Verifică dacă salariatul există
            $result = $con->query("SELECT id_salariat FROM salariati WHERE id_salariat=$id LIMIT 1");
            $row = $result->fetch_assoc();

            if ($row) {
                if ($column == "intrare") {
                    // Verifică dacă există deja o înregistrare de intrare pentru ziua curentă
                    $result_intrare = $con->query("SELECT id_salariat FROM pontaj WHERE id_salariat=$id AND DATE(Intrare)='$current_date' AND Iesire IS NULL LIMIT 1");
                    if ($result_intrare->num_rows > 0) {
                        throw new Exception("Intrarea a fost deja înregistrată pentru ziua curentă.");
                    }

                    // Inserează intrarea
                    $sql = "INSERT INTO pontaj (id_salariat, Intrare) VALUES ($id, '$current_time')";
                } elseif ($column == "iesire") {
                    $result_intrare = $con->query("SELECT Intrare FROM pontaj WHERE id_salariat=$id AND Iesire IS NULL ORDER BY Intrare DESC LIMIT 1");
                    $row_intrare = $result_intrare->fetch_assoc();
                    $ora_intrare = $row_intrare['Intrare'];

                    // Calculează durata
                    $datetime1 = new DateTime($ora_intrare);
                    $datetime2 = new DateTime($current_time);
                    $interval = $datetime1->diff($datetime2);

                    // Extrage orele, minutele și secundele
                    $ore = $interval->h + ($interval->days * 24);
                    $minute = $interval->i;
                    $secunde = $interval->s;

                    // Formatează durata lucrată
                    $ore_lucrate = sprintf("%02d:%02d:%02d", $ore, $minute, $secunde);

                    // Inserează ieșirea și durata
                    $sql = "UPDATE pontaj SET Iesire='$current_time', Ore_lucrate='$ore_lucrate' WHERE id_salariat=$id AND Iesire IS NULL";
                }

                if ($con->query($sql) === TRUE) {
                    // Confirmă tranzacția
                    $con->commit();
                    echo "$action înregistrată cu succes la: " . $current_time;
                } else {
                    throw new Exception("Error: " . $sql . "<br>" . $con->error);
                }
            } else {
                throw new Exception("Salariatul nu există.");
            }
        } catch (Exception $e) {
            // Anulează tranzacția în caz de eroare
            $con->rollback();
            echo $e->getMessage();
        }
    }
}

$con->close();
?>
