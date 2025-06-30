
<?php
session_start();
include("config.php");


if (isset($_SESSION['id'])) {
    $nume = $_SESSION['Nume'];
    $prenume = $_SESSION['Prenume'];

echo htmlspecialchars($nume . ' ' . $prenume);}

 else
{echo "User not logged in";
    exit();
}
?>
