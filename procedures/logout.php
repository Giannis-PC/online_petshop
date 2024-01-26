<?php

//Αποσύνδεση χρήστη.

session_start();

session_unset();

header("Location: ../myAccount.php");

?>
