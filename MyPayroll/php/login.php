<?php 
session_start();
include("config.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['Email']);
    $parola = mysqli_real_escape_string($con, $_POST['Parola']);
    
    // Select the user's data from the database
    $loginquery = "SELECT * FROM utilizatori WHERE Email='$email'";
    $loginquery_run = mysqli_query($con, $loginquery);
    
    if(mysqli_num_rows($loginquery_run) > 0){
        $userdata = mysqli_fetch_array($loginquery_run);
        $hashed_password = $userdata['Parola'];
        
        // Verify the password
        if(password_verify($parola, $hashed_password)){
            $_SESSION['auth'] = true;
            $useremail = $userdata['Email'];
            $username = $userdata['Nume'];
            $usersndname = $userdata['Prenume'];
            $userid = $userdata['id'];
            $userole = $userdata['Rolul'];

            $_SESSION['auth'] = ['Email' => $useremail];
            $_SESSION['id'] = $userid;
            $_SESSION['Nume'] = $username;
            $_SESSION['Prenume'] = $usersndname;
            $_SESSION['Rolul'] = $userole;

            if($userole == 1){
                header("Location: ../adminpanel/adminpanel.php");
            } else {
                header("Location: ../acasa.html");
            }
        } else {
            header("Location: ../eroare-login.html");
        }
    } else {
        header("Location: ../eroare-login.html");
    }
}
?>
