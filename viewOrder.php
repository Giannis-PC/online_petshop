<?php

//Προβολή παραγγελίας από τον διαχειριτή.

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

<?php include 'includes/header_menu.php'; ?>

<?php include 'includes/main_menu.php'; ?>

<?php include "includes/connectDB.php"; ?> 

<div class="container-fluid my-4">
	<h5 class="text-center">Διαχείριση Petshop</h5>
</div>

<?php include 'includes/admin_menu.php'; ?>

<section id="administrator">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mb-2 mt-4 back">
				<h5 class="mb-3">Παραγγελία #<?php echo $_GET['view'];?> - 
					<a href="ordersCatalog.php#administrator">Κατάλογος Παραγγελιών</a>
				</h5>
				<table class="table table-responsive table-striped">
					<thead>
						<tr>
							<th scope="col">Προϊόν</th>
							<th scope="col">Τιμή</th>
							<th scope="col">Ποσότητα</th>
							<th scope="col">Κόστος</th>					
						</tr>
					</thead>
					<tbody>
						<?php

						$order_id = $_GET['view'];

						$sql = mysqli_query($con, "SELECT * FROM order_tbl WHERE id = '$order_id'");
						$row = mysqli_fetch_assoc($sql);

						$user_id = $row['user_id'];
						$order_date = $row['order_date'];
						$order_time = $row['order_time'];

						$sql2 = mysqli_query($con,"SELECT * FROM order_tbl
 													WHERE user_id = '$user_id' 
													AND order_date = '$order_date' 
													AND order_time = '$order_time'");
						//end_sql2
						$total = 0;
						while ( $row2 = mysqli_fetch_assoc($sql2) ) {


							$product_id = $row2["product_id"];
							$sql3 = mysqli_query($con, "SELECT name, price FROM product_tbl WHERE id = $product_id");
							$row3 = mysqli_fetch_assoc($sql3);
							
							$sql4 = mysqli_query($con, "SELECT * FROM user_tbl WHERE id = $user_id");
							$row4 = mysqli_fetch_assoc($sql4);

							?>
								<tr>
									<td><?php echo $row3["name"]; ?></td>
									<td><?php echo $row3["price"]; ?></td>
									<td><?php echo $row2["quantity"]; ?></td>
									<td><?php echo $row2["total_cost"]; ?>€</td>
								</tr>
							<?php
							$total = $total +  $row2["total_cost"];		
						}
						?>   
					</tbody>
				</table>
			</div>
			<div class = "col-md-12">
				<p>Σύνολο : <b><?php  echo $total; ?>€</b></p>
			</div>				
			<div class = "col-md-12 mb-5">
				<p>Διεύθυνση Αποστολής: <b><?php  echo $row4["lname"] . "  " . $row4["fname"] . " - " . $row4["address"]; ?></b></p>
				<p>Στοιχεία Επικοινωνίας: <b><?php  echo $row4["phone_num"] . " | " . $row4["email"]; ?></b></p>
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

