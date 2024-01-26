<?php 

//Σελίδα κατηγορίας "ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ".
session_start();

?>

<!DOCTYPE html>
<html>
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

<?php include 'includes/header_menu.php'; ?>

<?php include 'includes/main_menu.php'; ?>

<?php include "includes/connectDB.php"; ?> 

<section id="dogs">
<div class="container-fluid dogs">
<div class="row">
	<!-- Sidebar Κατηγορίας -->
	<div class="col-md-3">
	<h4 class="mt-5">Κατηγορίες - Φίλτρα</h4>
		<nav class="nav flex-column">
			<a class="nav-link" href="#">Τροφή</a>
			<a class="nav-link" href="#">Συμπληρώματα Διατροφής</a>
			<a class="nav-link active" href="#">Αξεσουάρ Φαγητού</a>
			<a class="nav-link" href="#">Περιλαίμια & Οδγηγοί</a>
			<a class="nav-link" href="#">Καθαριότητα & Περιποίηση</a>
			<a class="nav-link" href="#">Παιχίδια</a>
		</nav>
	</div>
	<!-- Προϊόντα Κατηγορίας -->
	<div class="col-md-9 products">
		<h4 class="mt-5">Σκύλοι - Αξεσουάρ Φαγητού</h4>
		<div class="row">
			<?php 
			$sql = mysqli_query($con, "SELECT * FROM product_tbl WHERE category = 'ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ' ORDER BY ID DESC LIMIT 6");
			while ( $row = mysqli_fetch_assoc($sql) ) {
				?>
				<div class="col-md-4 mb-5"> 
					<!--- Προίόν 1  -->
					<form class="card h-100" action="procedures/add_toCart.php?add=<?php echo $row["id"]; ?>" method="post">
						<!--- Φωτογραφία προϊόντος -->
						<a href="#"><img class="card-img-top" src="<?php echo $row["image"]; ?>"></a>
						<div class="card-body">
							<!--- Τίτλος προϊόντος -->
							<h4 class="card-title">
								<a href="#"><?php echo $row["name"]; ?></a>
							</h4>
							<!--- Τιμή προϊόντος -->
							<h5><?php echo $row["price"]; ?>€</h5>
							<!--- Περιγραφή προϊόντος -->
							<p class="card-text"><?php echo $row["description"]; ?></p>
						</div>
						<!---  Επιλογή ποσότητας προιόντος --->
						<div class="card-footer">
							<div class="row">
								<div class="col-md-3 my-2">
									<!---  Επιλογή ποσότητας --->
									<input type="number" class="form-control" name="quantity" value="1" min="1" max="<?php echo $row["quantity"]; ?>" step="1">
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
</div>
</div>
</section>

<a id="back-to-top" href="" class="btn btn-light btn-lg back-to-top" role="button">
	<i class="fa fa-chevron-up"></i>
</a>

</html>

<?php include 'includes/footer_menu.php'; ?>

<?php include 'includes/socket.php'; ?> 

