<?php
// Conectare la baza de date
include("config.php");
session_start();
// Verificare dacă checkbox-ul este aprobat
if(!isset($_POST['termsCheckbox'])) {
    $error = "Fii de acord cu „Termenii și condițiile” și cu Politica de Confidențialitate";
    echo $error;
} else {
    if(isset($_POST['submit'])){
        $nume = mysqli_real_escape_string($con, $_POST['nume']);
        $prenume = mysqli_real_escape_string($con, $_POST['prenume']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $parola = mysqli_real_escape_string($con, $_POST['parola']);
        // Verifică dacă emailul există în tabelul salariati și nu există în tabelul utilizatori
        $salariat_query = mysqli_query($con, "SELECT id_salariat FROM salariati WHERE Email='$email'");
        $utilizator_query = mysqli_query($con, "SELECT Email FROM utilizatori WHERE Email='$email'");
        
        if(mysqli_num_rows($salariat_query) > 0 && mysqli_num_rows($utilizator_query) == 0) {
            // Obține id_salariat corespunzător emailului
            $salariat_data = mysqli_fetch_assoc($salariat_query);
            $id_salariat = $salariat_data['id_salariat'];
            // Hashuirea parolei înainte de înregistrare
            $hashed_password = password_hash($parola, PASSWORD_BCRYPT);
            
            // Dacă emailul este în salariati și nu în utilizatori, se creează contul
            $insert_query = "INSERT INTO utilizatori (Nume, Prenume, Email, Parola, id_salariat) VALUES
             ('$nume', '$prenume', '$email', '$hashed_password', '$id_salariat')";
            if (mysqli_query($con, $insert_query)) {
                header("Location: ../succes-register.html");
            } else {
                die("Error Occurred: " . mysqli_error($con));
            }
        } else {
            // Dacă emailul nu este în tabelul salariati sau este deja în utilizatori, arată o eroare
            header("Location: ../eroare-register.html");
        }
    }
}
?>
