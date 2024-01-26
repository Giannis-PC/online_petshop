<?php

//Ανανέωση ποσότητας προϊόντων στο καλάθι.

session_start();

$quantity = $_POST["quantity"];
$order_id = $_GET['update'];

if ( isset($_GET['update']) ) {

	foreach ( $_SESSION["shopping_cart"] as $key => $product ) {
		
		if ( $product['item_id'] == $order_id ) {

			$name = $product['item_name'];
			$price = $product['item_price'];

			$item_array = array (

				'item_id' => $_GET["update"],
				'item_name' => $name,
				'item_price' => $price,
				'item_quantity' => $quantity
			);

			$_SESSION["shopping_cart"][$key] = $item_array;
		}
	}
}

?>
<script> 
   	document.location = '../cart.php';
</script>
<?php

?>

