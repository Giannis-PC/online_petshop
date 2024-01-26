<?php 

/* Υπολογισμός της συνολικής ποσότητας και του συνολικού κόστους των προϊόντων στο καλάθι
   για την εμφάνισή τους στο μενού.*/

if ( !empty($_SESSION["shopping_cart"]) ) {

	$total_qty = 0;
	$total_cost = 0;

	foreach ( $_SESSION["shopping_cart"] as $key => $value ) {
		
		$total_qty = $total_qty + $value["item_quantity"];
		$item_cost = $value["item_price"] * $value["item_quantity"];
		$total_cost = $total_cost + $item_cost; 
	}
}
?>

<html>
<!--- Header  --->
<div class="container-fluid headerMenu pt-2">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<!--- Logo --->
	<div class="nav navbar-nav mr-auto">
		<a class="navbar-brand" href="index.php"><i class="fa fa-paw pr-1"></i>MyPetshop</a>
	</div>
	<!--- Responisve Button Menu --->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>	
	<!--- Menu --->
	<div class="collapse navbar-collapse" id="headerMenu">
		<!--- Search --->
		<div class="nav navbar-nav mr-auto">	
			<form class="form-inline mb-1">
				<input class="form-control mr-sm-2" type="search" name="search" placeholder="Αναζήτηση" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0 search" type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<!--- Μενού στοίχιση πάνω δεξία --->
		<ul class="nav navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" 
					href="
						<?php 
						if ( isset($_SESSION['role']) && $_SESSION['role'] == "Πελάτης" ) { echo "customer.php"; } 
						if ( isset($_SESSION['role'] ) && $_SESSION['role'] == "Διαχειριστής" )  { echo "administrator.php"; }
						if ( !isset($_SESSION['role']) )  { echo "myaccount.php"; }
						?>"
					>	
					<?php 
					if ( isset($_SESSION['email']) ) { 

						?> <i class="fa fa-fw fa-user"></i> <?php echo $_SESSION['lname'] . " " . $_SESSION['fname']; ?> <?php
					} 
					else { ?> <i class="fa fa-fw fa-user"></i>Ο Λογαριασμός μου <?php }  
					?>
				</a>
			</li>
			<li class="nav-item">
				<?php 

					if ( !empty($_SESSION["shopping_cart"]) ) {

						?>
						<a class="nav-link" href="cart.php" title="Προϊόντα στο καλάθι | Συνολικό κόστος">
							<i class="fa fa-shopping-cart"></i>
							<span class="cart_quantity">
								<strong><?php echo $total_qty ?></strong> | <strong>€<?php echo number_format($total_cost, 2) ?></strong>
							</span>
						</a>						
						<?php
					}

					else {

						?>
						<a class="nav-link" href="cart.php" title="Το καλάθι είναι άδειο.">
							<i class="fa fa-shopping-cart pr-1"></i>Καλάθι
						</a>
						<?php
					}
				?>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="mailto:sales@petshop.gr"><i class="fa fa-envelope-square pr-1"></i>Email για παραγγελία</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tel:+302101234567"><i class="fa fa-phone pr-1"></i>Τηλεφωνική παραγγελία</a>
			</li>
		</ul>
	
	</div>	
</nav>
</div>
</html>
