 <?php 

//Προσθήκη προϊόντος στη βάση δεδομένων από τον διαχειριτσή της σελίδας.

session_start();

include "../includes/connectDB.php";
        
$prd_name = $_POST["prd_name"];
$prd_category = $_POST["prd_category"];
$prd_description = $_POST["prd_description"];
$prd_quantity = $_POST["prd_quantity"];
$prd_price = $_POST["prd_price"];
$prd_image = $_POST["prd_image"];

$query = mysqli_query($con,"SELECT * FROM product_tbl WHERE name = '$prd_name'");
$num_of_rows = mysqli_num_rows($query);


if ( $num_of_rows == 0 ) {

	mysqli_query($con, "INSERT INTO product_tbl (name, category, description, quantity, price, image) 
                        VALUES ('$prd_name', '$prd_category', '$prd_description', '$prd_quantity', '$prd_price', '$prd_image')");
    ?>
    <script> 
    	alert('Η προσθήκη του προϊόντος ολοκληρώθηκε επιτυχώς!');
    	document.location = '../productsCatalog.php';
    </script>
    <?php
}

else { 
    
    ?>
	<script> 
		alert('Το προϊόν υπάρχει ήδη.');
        document.location = '../addProductForm.php';
    </script>
    <?php
}
              
mysqli_close($con);

?>

