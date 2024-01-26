<?php

//Επεξεργασία και αποθήκευση της κατάστασης (status) της παραγελίας.

session_start();

include "../includes/connectDB.php";

$status = $_POST['status'];
$order_id = $_GET['save'];

$sql = mysqli_query($con, "SELECT * FROM order_tbl WHERE id = '$order_id'");

$row = mysqli_fetch_assoc($sql);

$user_id = $row['user_id'];
$order_date = $row['order_date'];
$order_time = $row['order_time'];

//echo $user_id . " - " . $order_date . " - " . $order_time . " - " . $status;

mysqli_query($con, "UPDATE order_tbl SET status = '$status' 
					WHERE user_id = '$user_id' 
					AND order_date = '$order_date' 
					AND order_time = '$order_time'");
//edn_query

?>
<script> 
	alert('Η κατάσταση της παραγγελίας αποθηκέυτηκε επιτυχώς.');
   	document.location = '../ordersCatalog.php#administrator';
</script>
<?php

?>


