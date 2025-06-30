<?php
session_start();
// Include connection to the database
include ('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_salariat = $_POST['id_salariat'];
    $salariat = $_POST['salariat'];
    $Functia = $_POST['Functia'];
    $Zile_lucrate = $_POST['Zile_lucrate'];
    $Salariu_brut = $_POST['Salariu_brut'];
    $Concediu_medical = $_POST['Concediu_medical'];
    $valoare_tichet= $_POST['valoare_tichet'];
    $telefon= $_POST['telefon'];
    $email = $_POST['email'];
    $Ore_lucrate = $Zile_lucrate * 8;
    $CAS = $Salariu_brut * 0.25; 
    $CASS = $Salariu_brut * 0.1; 
    $Tichete_masa = $valoare_tichet * $Zile_lucrate;
    $Baza_impozit = $Salariu_brut - $CAS - $CASS - $Concediu_medical + $Tichete_masa;
    $Impozit_pe_venit = $Baza_impozit * 0.1;
    $Salariu_net = $Salariu_brut + $Concediu_medical - $CAS - $CASS - $Impozit_pe_venit;

    $sql = "UPDATE salariati SET salariat=?, Functia=?, Zile_lucrate=?, Ore_lucrate=?, Salariu_brut=?, Concediu_medical=?, CAS=?, CASS=?, Tichete_masa=?, Baza_impozit=?, Impozit_pe_venit=?, Salariu_net=?, email=?, valoare_tichet=?, telefon=? WHERE id_salariat=?";

  $stmt = $con->prepare($sql);
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssiiiiiiiiiisiii", $salariat, $Functia, $Zile_lucrate, $Ore_lucrate, $Salariu_brut, $Concediu_medical, $CAS, $CASS, $Tichete_masa, $Baza_impozit, $Impozit_pe_venit, $Salariu_net, $email, $valoare_tichet, $telefon, $id_salariat);




        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the admin panel with a success message
            header("Location: ../adminpanel.php?message=Angajat+editat+cu+succes");
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
