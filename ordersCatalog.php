<?php 

//Σελίδα προβολής του καταλόγου παραγγελιών από τον διαχειριστή.

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
			<div class="col-md-12 mb-2 mt-5">
  				<?php 
  				if ( isset($_SESSION['$page_index']) ){
  					?>
  					<h4 class="mb-3">Κατάλογος Παραγγελιών - σελ.<?php echo $_SESSION['$page_index']; ?>
				 	</h4>
				 	<?php
  				}
  				else {
  					?>
  					<h4 class="mb-3">Κατάλογος Παραγγελιών - σελ.1	</h4>
				 	<?php
  				}
  				?>
				<table class="table table-responsive table-striped">
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">Επώνυμο Πελάτη</th>
							<th scope="col">Όνομα Πελάτη</th>
							<th scope="col">Ποσότητα</th>
							<th scope="col">Κόστος</th>
							<th scope="col">Ημερομηνία</th>
							<th scope="col">Ώρα</th>
							<th scope="col">Κατάσταση</th>
							<th scope="col">Προβολή</th>
							<th scope="col">Αποθήκευση</th>
							<th scope="col">Διαγραφή</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$user_id = $_SESSION['id'];

						if ( isset($_SESSION['$page_offset']) ) {

							$page_offset = $_SESSION['$page_offset'];

							$sql = mysqli_query($con,"SELECT id, user_id, order_date, order_time, status, 
												  	  sum(quantity) AS quantity, sum(total_cost) AS total_cost, count(*) AS c
												  	  FROM order_tbl
												  	  GROUP BY user_id, order_date, order_time
												  	  HAVING c > 0
												  	  ORDER BY order_date DESC, order_time DESC
												  	  LIMIT 10 OFFSET $page_offset");
							//end sql
						}

						else {

							$sql = mysqli_query($con,"SELECT id, user_id, order_date, order_time, status, 
													  sum(quantity) AS quantity, sum(total_cost) AS total_cost, count(*) AS c
													  FROM order_tbl
													  GROUP BY user_id, order_date, order_time
													  HAVING c > 0
													  ORDER BY order_date DESC, order_time DESC
													  LIMIT 10");
							//end sql
						}
						
						while ( $row = mysqli_fetch_assoc($sql) ) {

							$user_id = $row["user_id"];
							$query2 = mysqli_query($con,"SELECT * FROM user_tbl WHERE id = '$user_id'");
							$user = mysqli_fetch_assoc($query2);
							?>
							<form action="procedures/saveOrder.php?save=<?php echo $row["id"]; ?>" method="POST">
								<tr>
									<td id="<?php echo $row["id"]; ?>"><?php echo $row["id"]; ?></td>
									<td><?php echo $user["lname"]; ?></td>
									<td><?php echo $user["fname"]; ?></td>
									<td><?php echo $row["quantity"]; ?></td>
									<td><?php echo $row["total_cost"]; ?>€</td>
									<td><?php echo $row["order_date"]; ?></td>
									<td><?php echo $row["order_time"]; ?></td>
									<td>
										<select name="status"> 
											<option selected disabled hidden><?php echo $row["status"]; ?></option>
											<option value="Κατατέθηκε">Κατατέθηκε</option>
											<option value="Σε επεξεργασία">Σε επεξεργασία</option>
											<option value="Απεστάλη">Απεστάλη</option>
											<option value="Ολοκληρωμένη">Ολοκληρωμένη</option>
										</select>
									</td>
									<td>
										<a href="viewOrder.php?view=<?php echo $row["id"]; ?>">
											<button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
												<i class="fa fa-eye"></i>
											</button>
										</a>												
									</td>	
									<td>
										<button type="submit" class="btn btn-danger btn-rounded btn-sm my-0">
											<i class="fa fa-save"></i>
										</button>										
									</td>
									<td>
										<a href="procedures/deleteOrder.php?delete=<?php echo $row["id"]; ?>">
											<button type="button" class="btn btn-danger btn-rounded btn-sm my-0 delete" onclick="return confirm('Διαγραφή Παραγγελίας;')">
												<i class="fa fa-trash"></i>
											</button>
										</a>	
									</td>													
								</tr>
							</form>
							<?php		
						}
						?>   
					</tbody>
				</table>
			</div>
			<!--- Σελιδοποίηση --->
			<div class="col-md-12 mb-5">
				<nav aria-label="Page navigation">
  					<ul class="pagination">

  						<?php 

  						if ( isset($_SESSION['$page_index']) && $_SESSION['$page_index'] != 1 ) {

  							?>
  							<li class="page-item">
	  							<a href="procedures/change_page.php?page=<?php echo $_SESSION['$page_index'] - 2; ?>" class="page-link">Προηγούμενη</a>
  							</li> 
  							<?php

  						}

  						else {

  							?>
  							<li class="page-item disabled">
	  							<a href="#" class="page-link">Προηγούμενη</a>
  							</li> 
  							<?php
  						}

						$query = mysqli_query($con,"SELECT * FROM order_tbl GROUP BY user_id, order_date, order_time");
						$total_rows = mysqli_num_rows($query);
  						$total_pages = ceil($total_rows / 10);

  						for ( $pages = 0; $pages < $total_pages; $pages++ ) {
  							
  							?>
  							<li class="page-item">
  								<a href="procedures/change_page.php?page=<?php echo $pages; ?>" class="page-link"><?php echo $pages + 1 ?></a>
  							</li>
  							<?php
  						}

  						if ( isset($_SESSION['$page_index']) && $_SESSION['$page_index'] != $total_pages ) {

  							?>
  							<li class="page-item">
	  							<a href="procedures/change_page.php?page=<?php echo $_SESSION['$page_index']; ?>" class="page-link">Επόμενη</a>
  							</li> 
  							<?php

  						}

  						elseif ( !isset($_SESSION['$page_index']) ) {

  							?>
  							<li class="page-item">
	  							<a href="procedures/change_page.php?page=1" class="page-link">Επόμενη</a>
  							</li> 
  							<?php

  						}

  						else {

  							?>
  							<li class="page-item disabled">
	  							<a href="#" class="page-link">Επόμενη</a>
  							</li> 
  							<?php
  						}  						

						?>
  					</ul>
				</nav>
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
