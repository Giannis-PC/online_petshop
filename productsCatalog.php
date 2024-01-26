<?php 

//Σελίδα προβολής του καταλόγου προϊόντων από τον διαχειριστή.

session_start();
unset($_SESSION['$page_index']);
unset($_SESSION['$page_offset']);

if ( !isset($_SESSION["email"]) ) {

	header("Location: myaccount.php");
}

if ( isset($_SESSION["role"]) && $_SESSION["role"] == 'Πελάτης' ) {

	header("Location: customer.php");
}

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

<div class="container-fluid my-4">
	<h5 class="text-center">Διαχείριση Petshop</h5>
</div>

<?php include 'includes/admin_menu.php'; ?>

<?php include "includes/connectDB.php"; ?> 

<!--- Σελίδα Διαχείρισης --->
<section id="administrator">
	<div class="container-fluid my-5"> 	
  		<!-- Κατάλογος Προϊόντων --->	
  		<div class="row">
  			<div class="col-md-12 mb-3">
  				<h4 class="mb-3">Κατάλογος Προϊόντων</h4>
  				<table class="table table-responsive table-striped prd_catalog">
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Όνομα</th>
							<th scope="col">Κατηγορία</th>
							<th scope="col">Περιγραφή</th>
							<th scope="col">Απόθεμα</th>
							<th scope="col">Τιμή</th>
							<th scope="col">Εικόνα</th>
							<th scope="col">Επεξεργασία</th>
							<th scope="col">Διαγραφή</th>
						</tr>
					</thead>
					<tbody>
					<?php

					$sql = mysqli_query($con, "SELECT * FROM product_tbl ORDER BY category, name");
			
					while ( $row = mysqli_fetch_assoc($sql) ) {
						?>
						<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["category"]; ?></td>
							<td><?php echo $row["description"]; ?></td>
							<td><?php echo $row["quantity"]; ?></td>
							<td><?php echo $row["price"]; ?>€</td>
							<td><?php echo $row["image"]; ?></td>
							<td><a href="editProduct.php?edit=<?php echo $row["id"]; ?>">
									<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
										<i class="fa fa-edit"></i>
									</button>
								</a>
							</td>
							<td><a href="procedures/deleteProduct.php?delete=<?php echo $row["id"]; ?>">
									<button type="button" class="btn btn-danger btn-rounded btn-sm my-0 delete" onclick="return confirm('Διαγραφή Προϊόντος;')">
										<i class="fa fa-trash"></i>
									</button>
								</a>	
							</td>
						</tr>
						<?php		
					}
					?>      
					</tbody>
				</table>
				<div class="row mt-4">
					<div class="col-md-9"></div>
					<div class="col-md-3 add_product">
						<a href="addProductForm.php">
							<button class="btn btn-primary btn-lg btn-block" type="">Προσθήκη Προϊόντος</button>
						</a>
					</div>
				</div>		
  			</div>	
  		</div>
	</div>
</section>

<a id="back-to-top" href="" class="btn btn-light btn-lg back-to-top" role="button">
	<i class="fa fa-chevron-up"></i>
</a>

<?php include 'includes/footer_menu.php'; ?>

<?php include 'includes/socket.php'; ?> 

</html>

