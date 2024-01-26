<?php

//Διαγραφή Παραγγελίας από τη βάση δεδομένων.

session_start();

include "../includes/connectDB.php";

if ( isset($_GET['delete']) ) {

	$order_id = $_GET['delete'];

	$sql = mysqli_query($con, "SELECT * FROM order_tbl WHERE id = '$order_id'");

	$row = mysqli_fetch_assoc($sql);

	$user_id = $row['user_id'];
	$order_date = $row['order_date'];
	$order_time = $row['order_time'];

	mysqli_query($con,"DELETE FROM order_tbl
						WHERE user_id = '$user_id' 
						AND order_date = '$order_date' 
						AND order_time = '$order_time'");
	//end_query
	
	?>
	<script> 
		alert('Η παραγγελία διαγράφηκε επιτυχώς.');
    	document.location = '../ordersCatalog.php';
	</script>
	<?php
	
	mysqli_close($con);
}

?>
