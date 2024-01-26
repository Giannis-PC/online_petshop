<?php 

//Σελίδα προβολής του καταλόγου πελατών από τον διαχειριστή.

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

<section id="administrator">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 my-5">
  				<div class="row">
  					<div class="col-md-12">	 			
					<h4>Πελατολόγιο</h4>
						<table class="table table-responsive table-striped">
							<thead>
								<tr>
									<th scope="col">id</th>
									<th scope="col">Επώνυμο</th>
									<th scope="col">Όνομα</th>
									<th scope="col">Εmail</th>
									<th scope="col">Τηλέφωνο</th>
									<th scope="col">Ημερομηνία Γέννησης</th>
									<th scope="col">Διεύθυνση</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$sql = mysqli_query($con, "SELECT * FROM user_tbl WHERE role != 'Διαχειριστής' ORDER BY lname ASC");
			
								while ( $row = mysqli_fetch_assoc($sql) ) {
									?>
									<tr>
										<td><?php echo $row["id"]; ?></td>
										<td><?php echo $row["lname"]; ?></td>
										<td><?php echo $row["fname"]; ?></td>
										<td><?php echo $row["email"]; ?></td>
										<td><?php echo $row["phone_num"]; ?></td>
										<td><?php echo $row["birth"]; ?></td>
										<td><?php echo $row["address"]; ?></td>
									</tr>
									<?php		
								}
								?>      
							</tbody>
						</table>
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

