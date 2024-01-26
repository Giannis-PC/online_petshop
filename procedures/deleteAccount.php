<?php 

//Διαγραφή λογαριασμού του πελάτη.

session_start();

include "../includes/connectDB.php";

$email = strtolower($_POST["email"]);

mysqli_query($con,"DELETE FROM user_tbl WHERE email = '$email'");

session_unset();

mysqli_close($con);

header("Location: ../myAccount.php");

?>
