<?php

//Διαγραφή προϊόντων από το καλάθι.

session_start();

include "../includes/connectDB.php";
 
if ( !empty($_SESSION["shopping_cart"]) ) {

	foreach ( $_SESSION["shopping_cart"] as $key => $value ) {

		if ( $value["item_id"] == $_GET['delete'] ) {

			unset($_SESSION["shopping_cart"][$key]);
		}
	}
	
	header("Location: ../cart.php");
}

?>

