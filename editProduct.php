<?php 

//Επεξεργασία Προϊόντος από τον διαχειριστή.

session_start();

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

<?php include 'includes/header_menu.php';?>

<?php include 'includes/main_menu.php';?>

<?php 

	include "includes/connectDB.php";

	if ( isset($_GET['edit']) ) {

		$id = $_GET['edit'];

		$sql = mysqli_query($con, "SELECT * FROM product_tbl WHERE id = $id");
		$row = mysqli_fetch_assoc($sql);

		$_SESSION['prd_name'] = $row['name'];
	}
?>

<div class="container-fluid my-4">
	<h5 class="text-center">Διαχείριση Petshop</h5>
</div>

<?php include 'includes/admin_menu.php'; ?>

<div class="container">
  	<!--- Φόρμα Eπεξεργασία Προϊόντος --->
  	<div class="row product_form">
  	  	<div class="col-md-12 my-5">
  			<h4 class="mb-3">Eπεξεργασία Προϊόντος</h4>
  			<hr> 
  			<form action="procedures/updateProduct.php" method="post">
  				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="prd_name">Όνομα*</label>
						<input type="text" class="form-control" name="prd_name" value="<?php echo $row['name']; ?>" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="prd_category">Κατηγορία*</label>
						<input type="text" class="form-control" name="prd_category" value="<?php echo $row['category']; ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="prd_description">Περιγραφή</label>
						<textarea class="form-control" name="prd_description" rows="3"><?php echo $row['description']; ?></textarea>
					</div>
				</div>
  				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="prd_quantity">Απόθεμα*</label>
						<input type="text" class="form-control" name="prd_quantity" value="<?php echo $row['quantity']; ?>" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="prd_price">Τιμή*</label>
						<input type="text" class="form-control" name="prd_price" value="<?php echo $row['price']; ?>" required>
					</div>
				</div>
  				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="prd_image">Εικόνα*</label>
						<input type="text" class="form-control" name="prd_image" value="<?php echo $row['image']; ?>" required>
					</div>
				</div>
  				<div class="row mt-4">
					<div class="col-md-6 mb-3">
						<button class="btn btn-primary btn-lg btn-block" type="submit">Αποθήκευση</button>
					</div>
					<div class="col-md-6 mb-3">
						<button class="btn btn-primary btn-lg btn-block" type="reset">Αρχικοποίηση</button>
					</div>							
				</div>							
  			</form>
  		</div>
  	</div> 
</div>

<a id="back-to-top" href="" class="btn btn-light btn-lg back-to-top" role="button">
	<i class="fa fa-chevron-up"></i>
</a>

<?php include 'includes/footer_menu.php'; ?>	

<?php include 'includes/socket.php'; ?> 

</html>

