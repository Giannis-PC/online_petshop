<?php 

//Σελίδα "ο Λογαριαμσός μου" πρίν την σύνδεση ή την εγγραφή χρήστη.

	session_start();

	if ( isset($_SESSION["role"]) && $_SESSION["role"] == 'Πελάτης' ) {

		header("Location: customer.php");
	}

	if ( isset($_SESSION["role"]) && $_SESSION["role"] == 'Διαχειριστής' ) {

		header("Location: administrator.php");
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
<!-- Έλεγχος στοιχείων για την εγγραφή χρήστη -->
<script src="scripts/reg_validation.js"></script>
<!-- back to top button -->
<script src="scripts/back_to_top.js"></script>

<?php include 'includes/header_menu.php'; ?>

<?php include 'includes/main_menu.php'; ?>

<!--- Login / Register --->
<section id="login_register">
<div class="container-fluid">
	<div class="row">
		<!--- ΣΥΝΔΕΣΗ --->
		<div class="col-md-6">
			<h4 class="mt-5 mb-3">Συνδεθείτε στον λογαριασμό σας</h4>
			<hr>
			<form action="procedures/signin.php" method="post">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="log_email">Email</label>
						<input type="text" class="form-control" name="log_email" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="log_pass">Κωδικός</label>
						<input type="password" class="form-control" name="log_pass" required>
					</div>	
				</div>
				<div class="row mt-4">
					<div class="col-md-6 mb-3">
						<button class="btn btn-primary btn-lg btn-block" type="submit">Σύνδεση</button>
					</div>
				</div>
			</form>	
		</div>
		<!--- ΕΓΓΡΑΦΗ --->
		<div class="col-md-6 mb-5">
			<h4 class="mt-5 mb-3">Δημιουργία λογαριασμού</h4>
			<hr>
			<form name="regForm" onsubmit="return reg_validation()" action="procedures/registration.php" method="post">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="fname">Όνομα*</label>
						<input type="text" class="form-control" name="fname">
					</div>
					<div class="col-md-6 mb-3">
						<label for="lname">Επώνυμο*</label>
						<input type="text" class="form-control" name="lname">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="email">Email*</label>
						<input type="text" class="form-control" name="email">
					</div>	
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="password">Κωδικός*</label>
						<input type="password" class="form-control" name="password">
					</div>	
					<div class="col-md-6 mb-3">
						<label for="repeat_pass">Επιβεβαίωση Κωδικού*</label>
						<input type="password" class="form-control" name="repeat_pass">
					</div>				
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="tel">Κινητό</label>
						<input type="text" class="form-control" name="tel">
					</div>
					<div class="col-md-6 mb-3">
						<label for="birth_date">Ημερομηνία Γέννησης</label>
						<input type="date" class="form-control" name="birth_date" placeholder="Έτος - Ημέρα - Μήνας">
					</div>
				</div>				
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="address">Διεύθυνση</label>
						<input type="text" class="form-control" name="address" placeholder="Οδός - Αριθμός - Τ.Κ. - Πόλη - Νομός">
					</div>
				</div>					
				<div class="row mt-4">
					<div class="col-md-6 mb-3">
						<button class="btn btn-primary btn-lg btn-block" type="submit">Εγγραφή</button>
					</div>
					<div class="col-md-6 mb-5">
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

</html>

<?php include 'includes/footer_menu.php'; ?>

<?php include 'includes/socket.php'; ?> 


