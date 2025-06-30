<?php
session_start();
include("config.php");

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Prepare the SQL query to avoid SQL injection
    $stmt = $con->prepare("SELECT COALESCE(SUM(TIME_TO_SEC(Ore_lucrate)), 0) AS total_secunde_lucrate 
                           FROM pontaj 
                           WHERE id_salariat = ?
                           AND MONTH(Intrare) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) 
                           AND YEAR(Intrare) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)");

    // Bind the session ID to the query
    $stmt->bind_param("i", $id);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the row
    $row = $result->fetch_assoc();

    if ($row) {
        $total_secunde_lucrate = $row['total_secunde_lucrate'];
        $ore_lucrate = $total_secunde_lucrate / 3600; // Convert seconds to hours
        echo round($ore_lucrate, 2); // Round to 2 decimal places
    } else {
        echo 0;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$con->close();
?>
