<?php

//Επεξεργασία και αποθήκευση στοιχείων του πελάτη.

session_start();

include "../includes/connectDB.php";

$sql = mysqli_query($con, "SELECT * FROM user_tbl WHERE email = '{$_SESSION['email']}'");
$row = mysqli_fetch_row($sql);
$customerID = $row[0];

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$tel = $_POST["tel"];
$birth_date = $_POST["birth_date"];
$address = $_POST["address"];


$result = mysqli_query($con, "SELECT * FROM user_tbl WHERE email = '{$_POST["email"]}'");
$num_of_rows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

//Αλλαγή στοιχείων του πελάτη εκτός του email.
if ( $num_of_rows == 1 && $_SESSION['email'] == $_POST["email"] ) {

	$query = mysqli_query($con, "UPDATE user_tbl SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', phone_num = '$tel', birth = '$birth_date', address = '$address' WHERE id = $customerID");

	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	$_SESSION['tel'] = $tel;
	$_SESSION['birth_date'] = $birth_date;
	$_SESSION['address'] = $address;

	?>
	<script> 
		alert('Τα στοιχεία του λογαριασμού σας αποθηκεύτηκαν επιτυχώς.');
    	document.location = '../customer.php';
	</script>
	<?php
}

//Αλλαγή στοιχείων του πελάτη συμπεριλαμβανομένου του email.
else if ( $num_of_rows == 0 ) {

	$query = mysqli_query($con, "UPDATE user_tbl SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', phone_num = '$tel', birth = '$birth_date', address = '$address' WHERE id = $customerID");

	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	$_SESSION['tel'] = $tel;
	$_SESSION['birth_date'] = $birth_date;
	$_SESSION['address'] = $address;

	?>
	<script> 
		alert('Τα στοιχεία του λογαριασμού σας αποθηκεύτηκαν επιτυχώς.');
    	document.location = '../customer.php';
	</script>
	<?php
}

//Αλλαγή στοιχείων του πελάτη ενώ το email χρησιμοποιείται σε άλλον λογαριασμό.
else {

	?>
	<script> 
		alert('H Διεύθυνση email υπάρχει ήδη.');
    	document.location = '../customer.php';
	</script>
	<?php
}

mysqli_close($con);

?>
