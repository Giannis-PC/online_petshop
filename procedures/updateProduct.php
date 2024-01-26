<?php

//Επεξεργασία και αποθήκευση των στοιχείων των προϊόντων.

session_start();

include "../includes/connectDB.php";

$name = $_POST['prd_name'];
$category = $_POST['prd_category'];
$description = $_POST['prd_description'];
$quantity = $_POST['prd_quantity'];
$price = $_POST['prd_price'];
$image = $_POST['prd_image'];

mysqli_query($con, "UPDATE product_tbl SET name = '$name', category = '$category', description = '$description', image = '$image', quantity = '$quantity', price = '$price' WHERE name = '{$_SESSION['prd_name']}'");

	?>
	<script> 
		alert('Οι αλλαγές στο προϊόν αποθηκεύτηκαν επιτυχώς.');
    	document.location = '../productsCatalog.php';
	</script>
	<?php

mysqli_close($con);

?>
