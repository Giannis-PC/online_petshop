<?php 

    //Μεταβλητές για την σύνδεση με την βάση δεδομένων.
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $my_db = "pokstoudis_db"; #Η βάση δεδομένων μου
            
    //Χρήση της μεταβλήτης $con για ευκολότερη διαχείριση της σύνδεσης.
    $con = mysqli_connect($server_name, $username, $password);
            
    //Έλεγχος αν έχει πραγματοποιηθεί η σύνδεση.
    /*if ($con) {
        $cons_info = "Η σύνδεση πραγματοποιήθηκε!";
    } 
    else {
        die('Δεν είναι δυνατή η σύνδεση: '.mysqli_error());
    }*/
           
    //Εμφάνιση μυνήματος στην κονσόλα. 
    //echo "<script>console.log('PHP:".$cons_info."')</script>";
            
    //Επιλογή της βάσης δεδομένων.
    /*$db_found = */mysqli_select_db($con,$my_db);
        
    //Έλεγχος αν βρέθηκε η βάση δεδομένων.
    /*if ($db_found){
        $cons_info = "Βρέθηκε η βάση δεδομένων: ".$my_db;
    } 
    else {
        die("Δεν βρέθηκε η βάση δεδομένων: ".mysqli_error());
    }*/
            
    //echo "<script>console.log('PHP:".$cons_info."')</script>";         
            
    //Για την σωστή απεικόνιση των ελληνικών χαρακτήρων.
    mysqli_query($con,"SET NAMES 'utf8'");           
?>

