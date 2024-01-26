<?php 
	
	/*	Ενημέρωση των $_SESSION['$page_index'] - (τρέχων αριθμός σελίδας)
		και $_SESSION['$page_offset'] - (δείκτης για την επιλογή των επόμενων ή προηγούμενων 10 προϊόντων).	
	*/ 

	session_start();

	if ( isset($_GET['page']) ) {

		$_SESSION['$page_index'] = $_GET['page'] + 1;

		$_SESSION['$page_offset'] = 10 * $_GET['page'];

		header("Location: ../ordersCatalog.php#administrator");
	}

?>

