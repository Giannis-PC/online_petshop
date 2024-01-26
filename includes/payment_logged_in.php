<html>
<!--- Φόρμα "Αποστολή & Πληρωμή" όταν ο χρήστης είναι συνδεδεμένος. --->
<div class="col-md-6 mb-5 cart_form">
	<h4 class="mt-5 mb-3">Αποστολή & Πληρωμή</h4>
	<hr>
	<form form action="procedures/addOrder.php" method="post">
	<!--- Στοιχεία Πελάτη --->
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="firstName">Όνομα</label>
				<input type="text" class="form-control" name="firstName" value="<?php echo $_SESSION['fname'];?>"required>
			</div>
			<div class="col-md-6 mb-3"> 
				<label for="lastName">Επώνυμο</label>
				<input type="text" class="form-control" name="lastName" value="<?php echo $_SESSION['lname'];?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="tel">Κινητό</label>
				<input type="text" class="form-control" name="tel" value="<?php echo $_SESSION['tel'];?>" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email'];?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mb-3">
				<label for="address">Διεύθυνση</label>
				<input type="text" class="form-control" name="address" value="<?php echo $_SESSION['address'];?>" required>
			</div>
		</div>
		<!--- Επιλογές αποστολής/παραλαβής --->
		<h5 class="mt-4">Αποστολή</h5>
		<div class="d-block mb-3">
			<div class="custom-control custom-radio">
				<input id="local" name="delivery" type="radio" class="custom-control-input" required>
				<label class="custom-control-label" for="local">Παραλαβή από το κατάστημα</label>
			</div>
			<div class="custom-control custom-radio">
				<input id="courier" name="delivery" type="radio" class="custom-control-input">
				<label class="custom-control-label" for="courier">Παράδοση με δική μας μεταφορική ή courier</label>
			</div>
			<div class="custom-control custom-radio">
				<input id="client_choice" name="delivery" type="radio" class="custom-control-input" >
				<label class="custom-control-label" for="client_choice">Παράδοση με μεταφορική ή courier της επιλογής σας</label>
			</div>
		</div>      
		<!--- Επιλογές Πληρωμής --->
		<h5 class="mt-4 mb-2">Πληρωμή</h5>
		<div class="d-block mb-3">
			<div class="custom-control custom-radio">
				<input id="card_payment" name="paymentMethod" type="radio" class="custom-control-input" required>
				<label class="custom-control-label" for="card_payment">Πιστωτική, Χρεωστική ή Προπληρωμένη Κάρτα Online
			</div>
			<div class="custom-control custom-radio">
				<input id="bank_payment" name="paymentMethod" type="radio" class="custom-control-input">
				<label class="custom-control-label" for="bank_payment">Τραπεζική Κατάθεση</label>
			</div>
			<h5 class="mt-5">Σχόλια</h5>
			<textarea class="mb-3 form-control" placeholder="π.χ. Διαθεσιμότητα για ημερομηνία και ώρα παράδοσης" rows="3"></textarea>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="terms" required>
				<label class="custom-control-label" for="terms">Συμφωνώ με τους όρους χρήσης και την πολιτική απορρήτου</label>
			</div>
			<div class="row mt-4">
				<!--- Button υποβολής της φόρμας --->
				<div class="col-md-6 mb-3">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Υποβολή</button>
				</div>
				<!--- Button αρχικοποίησης της φόρμας --->
				<div class="col-md-6 mb-3">
					<button class="btn btn-primary btn-lg btn-block" type="reset">Αρχικοποίηση</button>
				</div>
			</div>
		</div>	
	</form>	
</div>
</html>

