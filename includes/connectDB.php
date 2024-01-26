<?php 
//Μεταβλητές για την σύνδεση με την βάση δεδομένων.
$server_name = "localhost";
$username = "root";
$password = "";
$my_db = "pokstoudis_db"; #Η βάση δεδομένων μου
            
//Χρήση της μεταβλήτης $con για ευκολότερη διαχείριση της σύνδεσης.
$con = mysqli_connect($server_name, $username, $password);
            
//Επιλογή της βάσης δεδομένων.
mysqli_select_db($con,$my_db);
               
//Για την σωστή απεικόνιση των ελληνικών χαρακτήρων.
mysqli_query($con,"SET NAMES 'utf8'");           
?>

