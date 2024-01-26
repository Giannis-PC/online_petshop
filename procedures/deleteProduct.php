<?php

//Διαγραφή προϊόντος από την βάση δεδομένων.

session_start();

include "../includes/connectDB.php";

if ( isset($_GET['delete']) ) {

	$id = $_GET['delete'];
	mysqli_query($con,"DELETE FROM product_tbl WHERE id = '$id'");

	?>
	<script> 
		alert('Το προϊόν διαγράφηκε επιτυχώς.');
    	document.location = '../productsCatalog.php';
	</script>
	<?php
	
	mysqli_close($con);
}

?>

