<?php 
	
//Σελίδα για το καλάθι αγορών.
session_start();	

?>

<!DOCTYPE html>
<html>
<head>
<title>MyPetshop</title>	
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- bootstrap css -->
<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- bootstrap plugins -->
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<!-- custom μορφοποίηση -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- back to top button -->
<script src="scripts/back_to_top.js"></script>
</head>

<?php include 'includes/header_menu.php'; ?>

<?php include 'includes/main_menu.php'; ?>

<?php include "includes/connectDB.php"; ?> 

<!--- Cart --->
<section id="cart">
<div class="container-fluid cart">
	<div class="row">
		<!--- Περιεχόμενα στο καλάθι --->
		<div class="col-md-5">
			<h4 class="mt-5 mb-3">Περιεχόμενα στο καλάθι</h4>
			<!--- Πίνακας Περιεχόμενα στο καλάθι --->
			<table class="table table-responsive table-striped">
				<?php
				if ( !empty($_SESSION["shopping_cart"]) ) {
					$total = 0;
					?>
					<thead>
						<tr>
							<th scope="col">Προϊόν</th>
							<th scope="col">Τιμή</th>
							<th scope="col">Ποσότητα</th>
							<th scope="col">Σύνολο</th>
							<th scope="col">Ανανέωση</th>
							<th scope="col">Διαγραφή</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ( $_SESSION["shopping_cart"] as $product ) {
						?>
						<form action="procedures/updateOrder.php?update=<?php echo $product["item_id"]; ?>" method="post">	
						<tr>
							<td class="title_prod"><?php  echo $product["item_name"] ?></td>
							<td><?php  echo $product["item_price"]; ?>€</td>
							<td>
								<input type="number" class="form-control" name="quantity" value="<?php  echo $product["item_quantity"]; ?>" min="1" max="100" step="1">
							</td>
							<td><?php  echo number_format($product["item_quantity"] * $product["item_price"], 2); ?>€</td>
							<td>
								<button type="submit" class="btn btn-danger btn-rounded btn-sm my-0">
									<i class="fa fa-refresh" aria-hidden="true"></i>
								</button>		
							</td>							
							<td>
								<a href="procedures/deleteFromCart.php?delete=<?php echo $product["item_id"]; ?>">
									<button type="button" class="btn btn-danger btn-rounded btn-sm my-0 delete" onclick="return confirm('Διαγραφή Προϊόντος από το Καλάθι;')">
										<i class="fa fa-trash"></i>
									</button>
								</a>	
							</td>
						</tr>
						</form> 
						<?php	
						$cost = $product["item_price"] * $product["item_quantity"];
						$total = $total + $product["item_price"] * $product["item_quantity"];
					}
				}
				else { 
					$total = 0;
					echo "Δεν υπάρχουν προϊόντα στο καλάθι.";
				}	
				?>
					</tbody>
			</table>			
			<span class="final_price">
				<p>ΣΥΝΟΛΙΚΟ ΚΟΣΤΟΣ ΠΑΡΑΓΓΕΛΙΑΣ: <b><?php  echo number_format($total, 2); ?>€</b></p>
			</span>
		</div>		
		<div class="col-md-1"></div> 

		<?php 

		if ( isset($_SESSION["email"]) ) {

			include 'includes/payment_logged_in.php';
		}

		else {

			include 'includes/payment_logged_out.php';
		}

		?>

	</div>
</div>
</section>

<a id="back-to-top" href="" class="btn btn-light btn-lg back-to-top" role="button">
	<i class="fa fa-chevron-up"></i>
</a>

<?php include 'includes/footer_menu.php'; ?>

<?php include 'includes/socket.php'; ?> 

</html>

