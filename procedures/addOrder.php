<?php

//Δημιουργία παραγγελίας στην βάση δεδομένων κατά την υποβολή παραγγελίας.

session_start();

include "../includes/connectDB.php";

if ( isset($_SESSION["shopping_cart"]) ) {

	$user_id = $_SESSION['id'];
	$user_name = $_SESSION['fname'];
	$order_date = date("Y/m/d");
	$order_time = date("H:i:s");


	foreach ( $_SESSION["shopping_cart"] as $key => $value ) {

		$product_id = $value["item_id"];
		$quantity = $value["item_quantity"];
		$total_cost = $value["item_quantity"] * $value["item_price"];

		mysqli_query($con, "INSERT INTO order_tbl (user_id, product_id, order_date, order_time, quantity, total_cost) 
                    VALUES ('$user_id', '$product_id', '$order_date', '$order_time', '$quantity', '$total_cost')");
	}

	?>
	<script> 
		alert('Η παραγγελία σας κατοχυρώθηκε με επιτυχία!');
        document.location = '../customer.php';
    </script>
    <?php

    unset($_SESSION["shopping_cart"]);
}

else {

	?>
	<script> 
		alert('Αδυναμία καταχώρησης παραγγελίας, το καλάθι σας είναι άδειο.');
        document.location = '../cart.php';
    </script>
    <?php
}

?>
