<?php
session_start();
// Include connection to the database
include ('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $Nume = $_POST['Nume'];
    $Prenume = $_POST['Prenume'];
    $Email = $_POST['Email'];
    $Parola = password_hash($_POST['Parola'], PASSWORD_BCRYPT);
    $id_salariat = $_POST['id_salariat'];
    $Rolul=$_POST['Rolul'];


    // Prepare the update statement
    $query = "UPDATE utilizatori SET 
    Nume = ?, 
     Prenume = ?, 
     Email	=?,
     Parola = ?, 
     id_salariat = ?,	
        Rolul	= ?
    
     WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssssiii", $Nume, $Prenume, $Email, $Parola, $id_salariat, $Rolul, $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the admin panel with a success message
            header("Location: ../utilizatori.php?message=Utilizator+editat+cu+succes");
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
