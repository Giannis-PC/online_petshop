<?php 

//Αρχική Σελίδα.
session_start();	

?>

<!DOCTYPE html>
<html>
<head>
	<title>MyPetshop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap -->
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

<?php include 'includes/promo_slider.php'; ?> 

<?php include "includes/connectDB.php"; ?> 

<body>
<!--- Τελευταίες Αφίξεις --->
<section id="prods">
	<div class="container-fluid">
		<h4 class="my-4">Τελευταίες Αφίξεις</h4>
		<div class="row">
			<?php 
				$sql = mysqli_query($con, "SELECT * FROM product_tbl ORDER BY ID DESC LIMIT 6");
				while ( $row = mysqli_fetch_assoc($sql) ) {
					?>
					<div class="col-lg-4 col-md-6 mb-4">
						<form class="card h-100" action="procedures/add_toCart.php?add=<?php echo $row["id"]; ?>" method="post">
							<!--- Προϊόν --->
							<a href="#">
								<!--- Φωτογραφία --->
								<img class="card-img-top" src="<?php echo $row["image"]; ?>">
							</a>
							<div class="card-body">
								<!--- Τίτλος --->
								<h4 class="card-title">
									<a href="#"><?php echo $row["name"]; ?></a>
								</h4>
								<!--- Τιμή --->
								<h5><?php echo $row["price"]; ?>€</h5>
								<!--- Περιγραφή προϊόντος -->
								<p class="card-text"><?php echo $row["description"]; ?></p>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-md-3 my-2">
										<!---  Επιλογή ποσότητας --->
										<input type="number" class="form-control" name="quantity" value="1" min="1" max="100" step="1">
									</div>
									<div class="col-md-9 my-2">
										<!---  Προσθήκη στο καλάθι --->
										<button class="btn btn-primary btn-lg btn-block add_toCart" type="submit">
											<i class="fa fa-shopping-basket"></i> Προσθήκη στο καλάθι
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
			?>
		</div>
		<hr>
	</div>
</section>
<!--- Δημοφιλή Προϊόντα --->
<section id="popular_prods">
	<div class="container-fluid mb-5">
		<h4 class="mb-4">Δημοφιλή Προϊόντα</h4>
		<div class="row">
			<?php 

				$sql = mysqli_query($con, "SELECT * FROM product_tbl 
										   INNER JOIN order_tbl ON product_tbl.id = order_tbl.product_id 
										   GROUP BY order_tbl.product_id 
										   ORDER BY sum(order_tbl.quantity) DESC 
										   LIMIT 3");
				//end_sql query.

				while ( $row = mysqli_fetch_assoc($sql) ) {
					?>
					<div class="col-lg-4 col-md-6 mb-4">
						<form class="card h-100" action="procedures/add_toCart.php?add=<?php echo $row["product_id"]; ?>" method="post">
							<!--- Προϊόν --->
							<a href="#">
								<!--- Φωτογραφία --->
								<img class="card-img-top" src="<?php echo $row["image"]; ?>">
							</a>
							<div class="card-body">
								<!--- Τίτλος --->
								<h4 class="card-title">
									<a href="#"><?php echo $row["name"]; ?></a>
								</h4>
								<!--- Τιμή --->
								<h5><?php echo $row["price"]; ?>€</h5>
								<!--- Περιγραφή προϊόντος -->
								<p class="card-text"><?php echo $row["description"]; ?></p>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-md-3 my-2">
										<!---  Επιλογή ποσότητας --->
										<input type="number" class="form-control" name="quantity" value="1" min="1" max="100" step="1">
									</div>
									<div class="col-md-9 my-2">
										<!---  Προσθήκη στο καλάθι --->
										<button class="btn btn-primary btn-lg btn-block add_toCart" type="submit">
											<i class="fa fa-shopping-basket"></i> Προσθήκη στο καλάθι
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<?php
				}
			?>
		</div>
	</div>
</section>
<a id="back-to-top" href="" class="btn btn-light btn-lg back-to-top" role="button">
	<i class="fa fa-chevron-up"></i>
</a>
</body>
</html>

<?php include 'includes/footer_menu.php'; ?>

<?php include 'includes/socket.php'; ?> 
