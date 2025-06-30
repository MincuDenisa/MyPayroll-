<?php
// Include connection to the database
include ('config.php');

if (isset($_GET['id'])) {
    $id_salariat = $_GET['id'];
    echo "ID salariat primit: " . htmlspecialchars($id_salariat) . "<br>"; // Debug

    // Prepare the delete statement for the main table
    $query = "DELETE FROM salariati WHERE id_salariat = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        echo "Statement preparat corect.<br>"; // Debug

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "i", $id_salariat);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Executie reusita.<br>"; // Debug
            // Redirect to the admin panel with a success message
            header("Location: ../adminpanel.php?message=Salariat+sters+cu+success");
            exit();
        } else {
            echo "Eroare la execuția interogării: " . mysqli_stmt_error($stmt) . "<br>"; // Debug
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Eroare la pregătirea statementului: " . mysqli_error($con) . "<br>"; // Debug
    }

    // Close the connection
    mysqli_close($con);
} else {
    echo "No employee ID provided"; // Debug
    // Redirect if no ID is provided
    header("Location: ../adminpanel.php?message=No+employee+ID+provided");
    exit();
}
?>
