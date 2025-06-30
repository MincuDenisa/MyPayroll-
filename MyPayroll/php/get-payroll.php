<?php
session_start();
include("config.php");
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT Functia FROM salariati WHERE id_salariat = $id";
    $result = mysqli_query($con, $query);

    
        echo  htmlspecialchars($result ); }
    else
{echo "User not logged in";
    exit();
}
?>