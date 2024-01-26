 <?php 

//Εγρραφή χρήστη.

session_start();

include "../includes/connectDB.php";
        
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = strtolower($_POST["email"]);
$password = $_POST["password"];
$re_password = $_POST["repeat_pass"];

if (isset($_POST['tel'])) { $tel = !empty($_POST['tel']) ? $_POST['tel'] : null; }

if (isset($_POST['birth_date'])) { $birth_date = !empty($_POST['birth_date']) ? $_POST['birth_date'] : "0000-00-00"; }

if (isset($_POST['address'])) { $address = !empty($_POST['address']) ? $_POST['address'] : null; }

$query = mysqli_query($con,"SELECT * FROM user_tbl WHERE email = '$email'");
$num_of_rows = mysqli_num_rows($query);
            
if ( $num_of_rows == 0 ) {

	mysqli_query($con, "INSERT INTO user_tbl (fname, lname, phone_num, email, password, address, birth) 
                        VALUES ('$fname', '$lname', '$tel', '$email', '$password', '$address', '$birth_date')");
    ?>
    <script> 
    	alert('Η εγγραφή σας ολοκληρώθηκε επιτυχώς!');
    	document.location = '../customer.php';
    </script>
    <?php

	//Ανάκτηση των στοιχείων του χρήστη που έχει κάνει εγγραφή.
    $sql = mysqli_query($con,"SELECT * FROM user_tbl WHERE email = '$email'");
    $row = mysqli_fetch_row($sql);
    $_SESSION['id'] = $row[0];
    $_SESSION['role'] = $row[8];
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['tel'] = $tel;
    $_SESSION['birth_date'] = $birth_date;
    $_SESSION['address'] = $address;
}

else { 

    session_unset();
    
    ?>
	<script> 
		alert('H Διεύθυνση email υπάρχει ήδη.');
        document.location = '../myAccount.php';
    </script>
    <?php
}
              
mysqli_close($con);

?>
