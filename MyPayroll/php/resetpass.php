<?php
include("config.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    $verify_query = mysqli_query($con, "SELECT email FROM utilizatori WHERE email='$email'");
    if(mysqli_num_rows($verify_query) != 0){
        mysqli_query($con,"UPDATE utilizatori SET Parola='$parola' WHERE Email='$email'") or die("Error Occured");
        header ("Location:../succes.html");
    }
    else 
    {
       header("Location:../eroare-resetare.html");
    }
}
?>