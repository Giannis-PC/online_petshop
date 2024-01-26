<?php 

//Αρχική σελίδα διαχείρισης - Προφίλ (Στοιχεία Διαχειριστή).

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
<!-- Έλεγχος κατά την τροποποίηση των στοιχείων του πελάτη -->
<script src="scripts/edit_user_val.js"></script>
<!-- back to top button -->
<script src="scripts/back_to_top.js"></script>

<?php include 'includes/header_menu.php'; ?>

<?php include 'includes/main_menu.php'; ?>

<div class="container-fluid my-4">
	<h5 class="text-center">Διαχείριση Petshop</h5>
</div>

<?php include 'includes/admin_menu.php'; ?>

<!--- Φόρμα - Στοιχεία Διαχειριστή  --->
<section id="administrator">
	<div class="container my-5"> 	
		<div class="row">
			<div class="col-md-12 mb-5">
				<h4 class="mb-3">Στοιχεία Λογαριασμού</h4>
				<hr>
				<form name="user_details_form" onsubmit="return edit_user_val()" action="procedures/editAdministrator.php" method="post">
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="fname">Όνομα*</label>
							<input type="text" class="form-control" name="fname" value="<?php echo $_SESSION['fname'];?>" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lname">Επώνυμο*</label>
							<input type="text" class="form-control" name="lname" value="<?php echo $_SESSION['lname'];?>" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="email">Email*</label>
							<input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email'];?>" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="password">Κωδικός*</label>
							<input type="text" class="form-control" name="password" value="<?php echo $_SESSION['password'];?>" required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="tel">Κινητό</label>
							<input type="text" class="form-control" name="tel" value="<?php echo $_SESSION['tel'];?>" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="birth_date">Ημερομηνία Γέννησης</label>
							<input type="date" class="form-control" name="birth_date" placeholder="Έτος - Ημέρα - Μήνας" value="<?php echo $_SESSION['birth_date'];?>" required>
						</div>
					</div>				
					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="address">Διεύθυνση</label>
							<input type="text" class="form-control" name="address" placeholder="Οδός - Αριθμός - Τ.Κ. - Πόλη - Νομός" value="<?php echo $_SESSION['address']; ?>" required>
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
</section>

<a id="back-to-top" href="" class="btn btn-light btn-lg back-to-top" role="button">
	<i class="fa fa-chevron-up"></i>
</a>

<?php include 'includes/footer_menu.php'; ?>

<?php include 'includes/socket.php'; ?> 

</html>
