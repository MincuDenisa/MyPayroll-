<?php
session_start();
// Include connection to the database
include ('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $Intrare = $_POST['Intrare'];
    $Iesire = $_POST['Iesire'];
    $Ore_lucrate = $_POST['Ore_lucrate'];
    $id_salariat = $_POST['id_salariat'];
    
    


    // Prepare the update statement
    $query = "UPDATE pontaj SET Intrare = ?, Iesire = ?, Ore_lucrate = ?, id_salariat = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "isssi",   $id, $Intrare,$Iesire,$Ore_lucrate,$id_salariat);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the admin panel with a success message
            header("Location: ../pontaj.php?message=Pontaj+editat+cu+succes");
            exit();
        } else {
            echo "Eroare la execuția interogării: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Eroare la pregătirea statementului: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
} else {
    echo "Invalid request method";
}
?>
