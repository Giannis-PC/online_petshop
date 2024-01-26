<?php 

//Σελίδα συνδεδεμένου πελάτη - Ο Λογαριασμός μου.

session_start();

if ( !isset($_SESSION["email"]) ) {

	header("Location: myaccount.php");
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
<!-- Έλεγχος κατά την τροποποίηση των στοιχείων του πελάτη -->
<script src="scripts/edit_user_val.js"></script>
<!-- back to top button -->
<script src="scripts/back_to_top.js"></script>

<?php include 'includes/header_menu.php'; ?>

<?php include 'includes/main_menu.php'; ?>

<section id="profile">
<div class="container-fluid">
	<div class="mt-5 log_out">
		<h5 class="text"><i class="fa fa-user-o"></i> Ο Λογαριασμός μου: <?php echo $_SESSION['lname'] . " " . $_SESSION['fname'] . " - "; ?>
			<a href="procedures/logout.php"><i class="fa fa-sign-out"></i> Αποσύνδεση</a>
		</h5>
  	</div>
	<div class="row">
		<div class="col-md-5 mb-5">
			<h4 class="mt-4 mb-3">Στοιχεία Λογαριασμού</h4>
			<hr>
			<!--- Φόρμα - Στοιχεία Πελάτη --->
			<form name="user_details_form" onsubmit="return edit_user_val()" action="procedures/editCustomer.php" method="post">
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
					<div class="col-md-6 mb-5">
						<button class="btn btn-primary btn-lg btn-block delete" formaction="procedures/deleteAccount.php" onclick="return confirm('Διαγραφή λογαριασμού;')">Διαγραφή Λογαριασμού</button>
					</div>
				</div>				
			</form>	
		</div>
		<div class="col-md-1"></div>
		<!--- Παραγγελίες Πελάτη --->
		<div class="col-md-6">
			<h4 class="mt-4 mb-3">Ιστορικό Παραγγελιών</h4>
			<table class="table table-responsive table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Ποσότητα</th>
						<th scope="col">Σύνολο</th>
						<th scope="col">Ημερομηνία</th>
						<th scope="col">Ώρα</th>
						<th scope="col">Κατάσταση</th>
						<th scope="col">Προβολή</th>
					</tr>
				</thead>
				<tbody>
			
				<?php

				include "includes/connectDB.php";

				$user_id = $_SESSION['id'];

				$sql = mysqli_query($con,"SELECT id, user_id, order_date, order_time, status, 
										  sum(quantity) AS quantity, sum(total_cost) AS total_cost, count(*) AS c
										  FROM order_tbl
										  WHERE user_id = '$user_id'
										  GROUP BY user_id, order_date, order_time
										  HAVING c > 0
										  ORDER BY order_date DESC, order_time DESC");
				//end_sql	

				while ( $row = mysqli_fetch_assoc($sql) ) {

					?>
					<tr>
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["quantity"]; ?></td>
						<td><?php echo $row["total_cost"]; ?>€</td>
						<td><?php echo $row["order_date"]; ?></td>
						<td><?php echo $row["order_time"]; ?></td>
						<td><?php echo $row["status"]; ?></td>
						<td>
							<a href="customerOrder.php?view=<?php echo $row["id"]; ?>">
								<button type="button" class="btn-link">
									<i class="fa fa-eye"></i>
								</button>
							</a>												
						</td>
					</tr>
					<?php		
				}
				?>   
				</tbody>
			</table>
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
