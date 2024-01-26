<?php 

//Σελίδα για την εξαγωγή-προβολή xml των παραγγελιών και των 5 δημοφιλέστερων προϊόντων
//για τις ημερομηνίες που ορίζει ο διαχειριστής.

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

<?php include "includes/connectDB.php"; ?>

<div class="container-fluid my-4">
	<h5 class="text-center">Διαχείριση Petshop</h5>
</div>

<?php include 'includes/admin_menu.php'; ?>

<div class="container">
  <div class="row xml">
   	<div class="col-md-12 my-5">
  		<div class="alert alert-dark" role="alert"> Παρακαλώ ορίστε τις <strong>ημερομηνίες</strong> για την εξαξωγή - προβολή του καταλόγου.
      </div>
  		<form action="procedures/xmlExport.php" method="post">
  			<div class="row">
				  <div class="col-md-6 mb-3">
						<label for="from_date">Από*</label>
						<input type="date" class="form-control" name="from_date" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="to_date">Εώς*</label>
						<input type="date" class="form-control" name="to_date" required>
					</div>
				</div>
  			<div class="row mt-4">
				 	<div class="col-md-6 mb-3">
					  <button class="btn btn-primary btn-lg btn-block" type="submit"> Εξαγωγή - Προβολή XML
						  </button>
				  </div>
				  <div class="col-md-6 mb-3">
						<button class="btn btn-primary btn-lg btn-block" type="reset">Αρχικοποίηση</button>
				  </div>							
			  </div>							
 		  </form>
  	</div>
  </div>
  	<?php
  	//Εφόσον έχουν οριστεί οι ημερομηνίες μετατροπή  και προβολή του αρχείου 
  	//σε HTML με τη βοήθεια του XSL προτύπου.
  	if ( isset($_SESSION['from_date']) && isset($_SESSION['to_date']) && $_SESSION['from_date'] <= $_SESSION['to_date'] ) {

    	//Τοποθεσία αποθήκευσης .xml & .xsl
    	$xml_filename = "./files/orders_" . $_SESSION['from_date'] . "--" . $_SESSION['to_date'] . ".xml";
    	$xsl_filename  = "./files/orders.xsl";
            
    	//Φόρτωση του xml
    	$xml = new DOMDocument();
    	$xml->load($xml_filename);
        	
    	//Φόρτωση του xsl
    	$xsl = new DOMDocument();
    	$xsl->load($xsl_filename);

    	if ( !$xml->validate() ) {
        	    
			 echo "<p>Το XML αρχείο δεν είναι έγκυρο σύμφωνα με το DTD. Παρακαλώ επικοινωνήστε με την τεχνική υποστήριξη.</p>";    	    
    	} 

    	else {
        	
          $new_fromDate = date("d-m-Y", strtotime($_SESSION['from_date']));
          $new_toDate = date("d-m-Y", strtotime($_SESSION['to_date']));

       		//Επεξεργασία κι εξαγωγή αποτελεσμάτων
       		$proc = new XSLTProcessor();
        	$proc->importStyleSheet($xsl);
        	echo '<h4 id="xml_results" style="text-align: center;">Αποτελέσματα από ' . $new_fromDate . ' εώς ' . $new_toDate . '</h4>';
        	echo $proc->transformToXML($xml);
    	}
    }
  	?>
</div>

<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
  <i class="fa fa-chevron-up"></i>
</a>

<?php include 'includes/footer_menu.php'; ?>	

<?php include 'includes/socket.php'; ?>  

</html>


