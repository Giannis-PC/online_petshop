<?php

//Κώδικας για την προσθήκη προϊόντων στο καλάθι.

session_start();

include "../includes/connectDB.php";

if ( isset($_GET['add']) && isset($_SESSION['email']) ) {

	$prod_id = $_GET['add'];

	$quantity = $_POST["quantity"];

	$sql = mysqli_query($con, "SELECT * FROM product_tbl WHERE id = $prod_id");
	$row = mysqli_fetch_assoc($sql);

	if ( isset($_SESSION["shopping_cart"]) ) {

		$count = 0;

		foreach ( $_SESSION["shopping_cart"] as $key => $value ) {

			if ( $value["item_id"] == $prod_id  ) {

				goto case_product_exists;
			}

			else {
				
				$count = $count + $key;
			}
		}
	
		$item_array = array (

			'item_id' => $_GET["add"],
			'item_name' => $row["name"],
			'item_price' => $row["price"],
			'item_quantity' => $quantity
		);

		$_SESSION["shopping_cart"][$count + 1] = $item_array;

		header("Location: ../cart.php"); 
	}

	else {

		$item_array = array (

			'item_id' => $_GET["add"],
			'item_name' => $row["name"],
			'item_price' => $row["price"],
			'item_quantity' => $quantity
		);

		$_SESSION["shopping_cart"][1] = $item_array; 

		header("Location: ../cart.php"); 
	}

	case_product_exists: 
		?>
		<script> 
			alert('Το προϊόν υπάρχει ήδη στο καλάθι.');
    		document.location = '../cart.php';
    	</script>
    	<?php
    //end case product_exists	
}

else {

    ?>
	<script> 
		alert('Παρακαλούμε συνδεθείτε ή δημιουργήστε λογαριασμό για την διεκπεραίωση των αγορών σας.');
        document.location = '../myAccount.php';
    </script>
    <?php
}

?>

