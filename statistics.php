<?php 

//Σελίδα προβολής στατιστικών στοιχείων του eshop από τον διαχειριστή.

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

<?php include "includes/connectDB.php"; ?> 

<!--- Στατιστικά --->
<section id="administrator">
	<!--- Συνολικός Τζίρος --->
	<div class="container-fluid mt-5 mb-3">
		<h4 class="mb-4">Συνολικός Τζίρος</h4>
		<div class="row">
			<?php
				//Συνολικά έσοδα ανά ημέρα. 
				$sql = mysqli_query($con, "SELECT SUM(total_cost) AS day_incoming
										   FROM order_tbl
										   WHERE order_date = CURRENT_DATE");
				//end_sql query.
				$row = mysqli_fetch_assoc($sql);

				//Συνολικά έσοδα ανά μήνα.
				$query_date = date("Y/m/d");
				$month_firstDay = date('Y-m-01', strtotime($query_date));
				$month_lasttDay = date('Y-m-t', strtotime($query_date));
				$sql2 = mysqli_query($con, "SELECT SUM(total_cost) AS month_incoming
											FROM order_tbl
											WHERE order_date BETWEEN '$month_firstDay' AND '$month_lasttDay'");
				//end_sql2 query.
				$row2 = mysqli_fetch_assoc($sql2);	

				//Συνολικά έσοδα ανά έτος.
				$date = new DateTime('1st January This Year');
				$year_firstDay = $date->format('Y-m-d'); //πχ, 2020-01-01.
				$sql3 = mysqli_query($con, "SELECT SUM(total_cost) AS year_incoming
										    FROM order_tbl
										    WHERE order_date BETWEEN '$year_firstDay' AND CURRENT_DATE");
				//end_sql2 query.
				$row3 = mysqli_fetch_assoc($sql3);							
			?>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
					<div class="card-body">
						<h6>Ανά Ημέρα: <b><?php echo $row["day_incoming"]; ?>€</b></h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
					<div class="card-body">
						<h6>Ανά Μήνα: <b><?php echo $row2["month_incoming"]; ?>€</b></h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
					<div class="card-body">
						<h6>Ανά Έτος: <b><?php echo $row3["year_incoming"]; ?>€</b></h6>
					</div>
				</div>
			</div>											
		</div>
	</div>
	<!--- Οι 3 καλύτεροι Πελάτες  --->
	<div class="container-fluid mt-3 mb-3">
		<h4 class="mb-4">Οι 3 καλύτεροι Πελάτες</h4>
		<div class="row">
			<?php 
				$sql = mysqli_query($con, "SELECT * FROM user_tbl 
										   INNER JOIN order_tbl ON user_tbl.id = order_tbl.user_id 
										   GROUP BY order_tbl.user_id 
										   ORDER BY SUM(order_tbl.total_cost) DESC 
										   LIMIT 3");
				//end_sql query.

				$sql2 = mysqli_query($con, "SELECT SUM(total_cost) AS cost, user_id
											FROM order_tbl
											GROUP BY user_id
											ORDER BY SUM(total_cost) DESC
											LIMIT 3");
				//end_sql2 query.


				$rating_customer = mysqli_num_rows($sql) + 1;

				while ( $row = mysqli_fetch_assoc($sql) ) {

					$rating_customer--;
					$row2 = mysqli_fetch_assoc($sql2);
					?>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card h-100">
							<div class="card-body">
								<h5 class="card-title">
									<a href="#"><?php echo $row["fname"] . "  " . $row["lname"]; ?></a>
								</h5>
								<h6>email: <?php echo $row["email"]; ?></h6>
								<!--- Σύνολο εσόδων --->
								<h6>Σύνολο εσόδων από τον πελάτη: <b><?php echo $row2["cost"]; ?>€</b></h6>
								<?php
									$checked_stars = 0;
									for ( $i = 0; $i < $rating_customer; $i++ ) {
										$checked_stars++;
										?>
										<span class="fa fa-star checked"></span>
										<?php
									}
									$unchecked_stars = 3 - $checked_stars;
									for ( $j = 0; $j < $unchecked_stars; $j++ ) {
										?>
										<span class="fa fa-star"></span>
										<?php
									}									
								?>								
							</div>
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</div>		
	<!--- Τα 5 δημοφιλέστερα προϊόντα --->
	<div class="container-fluid mt-3 mb-3">
		<h4 class="mb-4">Τα 5 δημοφιλέστερα προϊόντα</h4>
		<div class="row">
			<?php 
				$sql = mysqli_query($con, "SELECT * FROM product_tbl 
										   INNER JOIN order_tbl ON product_tbl.id = order_tbl.product_id 
										   GROUP BY order_tbl.product_id 
										   ORDER BY SUM(order_tbl.quantity) DESC 
										   LIMIT 5");
				//end_sql query.

				$sql2 = mysqli_query($con, "SELECT SUM(quantity) AS sum_qty, product_id
											FROM order_tbl
											GROUP BY product_id
											ORDER BY SUM(quantity) DESC
											LIMIT 5");
				//end_sql2 query.

				$rating_prd = mysqli_num_rows($sql) + 1;

				while ( $row = mysqli_fetch_assoc($sql) ) {

					$rating_prd--;
					$row2 = mysqli_fetch_assoc($sql2);
					?>
					<div class="col-lg-4 col-md-6 mb-4">
						<!--- Προϊόν --->
						<div class="card h-100">
							<a href="#">
								<!--- Φωτογραφία --->
								<img class="card-img-top" src="<?php echo $row["image"]; ?>">
							</a>
							<div class="card-body">
								<!--- Τίτλος --->
								<h5 class="card-title">
									<a href="#"><?php echo $row["name"]; ?></a>
								</h5>
								<h6>Τιμή: <?php echo $row["price"]; ?>€</h6>
								<h6>Έσοδα Πώλησης: <?php echo $row2["sum_qty"] * $row["price"]; ?>€</h6>							
								<!--- Ποσότητα που πουλήθηκε --->
								<h6>Ποσότητα που πουλήθηκε: <b><?php echo $row2["sum_qty"]; ?> προϊόντα</b></h6>
								<?php
									$checked_stars = 0;
									for ( $i = 0; $i < $rating_prd; $i++ ) {
										$checked_stars++;
										?>
										<span class="fa fa-star checked"></span>
										<?php
									}
									$unchecked_stars = 5 - $checked_stars;
									for ( $j = 0; $j < $unchecked_stars; $j++ ) {
										?>
										<span class="fa fa-star"></span>
										<?php
									}									
								?>
							</div>
						</div>
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

<?php include 'includes/footer_menu.php'; ?>

<?php include 'includes/socket.php'; ?> 

</html>

