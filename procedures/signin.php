 <?php 

//Σύνδεση χρήστη.

session_start();

include "../includes/connectDB.php";
        
$email = strtolower($_POST["log_email"]);
$password = $_POST["log_pass"];

$query = mysqli_query($con,"SELECT * FROM user_tbl WHERE email = '$email'");
$num_of_rows = mysqli_num_rows($query);
$row = mysqli_fetch_row($query);
            
if ( $num_of_rows == 1 & $row[5] == $password ) {

    $_SESSION['role'] = $row[8];

    if ( $_SESSION['role'] == 'Πελάτης' ) {

	   ?>
	   <script> document.location = '../customer.php'; </script>
	   <?php
    }


    if ( $_SESSION['role'] == 'Διαχειριστής' ) {

       ?>
       <script> document.location = '../administrator.php'; </script>
       <?php
    }

	//Ανάκτηση των στοιχείων του χρήστη που έχει συνδεθεί.
	$_SESSION['id'] = $row[0];
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['fname'] = $row[1];
    $_SESSION['lname'] = $row[2];
    $_SESSION['tel'] = $row[3];
    $_SESSION['address'] = $row[6];
    $_SESSION['birth_date'] = $row[7];
}

else { 

    session_unset();

    ?>
	<script> 
		alert('Το email ή ο κωδικός πρόσβασης είναι λάθος.');
        document.location = '../myAccount.php';
    </script>
    <?php
}
              
mysqli_close($con);

?>

