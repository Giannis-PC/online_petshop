<?php 

session_start();

//Μεταβλητές για την αποθήκευση των ημερομηνιών από/εώς για την εξαγωγή της xml λίστας.
$from_date = date("Y-m-d", strtotime($_POST["from_date"]));
$_SESSION['from_date'] =  $from_date;

$to_date = date("Y-m-d", strtotime($_POST["to_date"])); 
$_SESSION['to_date'] =  $to_date;

//Εάν η ημερομηνία 'από' είναι μικρότερη ή ίση της ημερομηνίας 'έως' 
//εκτελείται ο κώδικας για την εξαγωγή του xml, διαφορετικά τερματίζει κι εμφανίζεται μήνυμα σφάλματος.
if ( $from_date <= $to_date ) {

  //Σύνδεση στη βάση δεδομένων.
	include "../includes/connectDB.php";

	//Ερώτημα στη βάση δεδομένων για την ανάκληση όλων των παραγγελιών
	//στο χρονικό διάστημα που έθεσε ο διαχειριστής.
	$sql = mysqli_query($con, "SELECT id, user_id, total_cost,
								SUM(quantity) AS quantity, SUM(total_cost) AS total_cost, COUNT(*) AS c
								FROM order_tbl
    							WHERE order_date BETWEEN '$from_date' AND '$to_date'
								GROUP BY user_id, order_date, order_time
								HAVING c > 0
								ORDER BY total_cost DESC");
	//end_sql

	/*Δημιουργία νέας οντότητας της κλάσης DomImplementation. Δηλώνουμε ότι θα υπάρχει ένα εξωτερικό dtd
  αρχείο με το όνομα 'orders.dtd', το οποίο θα χρησιμοποιείται για τον έλεγχο εγκυρότητας του 
  εκάστοτε παραγόμενου xml. Το κάθε xml που δημιουργείται, θα έχει ως αναφορά το dtd που δηλώσαμε κι
  επιπλέον, θα έχει κωδικοποίηση UTF-8 (για να είμαστε σίγουροι για την υποστήριξη των Ελληνικών χαρακτήρων)
  κι ενεργοποιούμε την xml μορφοποίηση, ώστε να απεικονίζεται με τη γνώριμη μορφή.*/
  
	$dom_imp = new DOMImplementation;
  $dtd = $dom_imp->createDocumentType('orders','','orders.dtd');
  $xml = $dom_imp->createDocument("", "", $dtd);
  $xml->encoding = 'UTF-8';
  $xml->formatOutput = true;

  //Δημιουργούμε το στοιχείο - ρίζα 'orders' και το προσθέτουμε στο xml.
  $orders = $xml->createElement("orders");
  $xml->appendChild($orders);

	while ( $row = mysqli_fetch_assoc($sql) ) { 

	  //Μεταβλητή για την αποθήκευση του id της πραγγελίας.
	  $order_id = $row["id"];

	  //Μεταβλητή για την αποθήκευση του id του πελάτη.
	  $user_id = $row["user_id"];

	  //Ερώτημα στη βάση δεδομένων για την ανάκληση του ονόματος και του επίθετου του πελάτη με βάση το id του.
	  $query = mysqli_query($con, "SELECT fname, lname FROM user_tbl WHERE id = $user_id");
	  $row2 = mysqli_fetch_assoc($query);

	  //Όναμα πελάτη.
	  $customer_fname = $row2["fname"];

	  //Επώνυμο πελάτη.
	  $customer_lname = $row2["lname"];

	  //Συνολικό κόστος της εκάστοτε παραγγελίας.
	  $total_cost = $row["total_cost"];

	  //Δημιουργούμε το στοιχείο - παιδί με το όνομα 'order' 
	  //και το προσθέτουμε ακριβώς κάτω από το στοιχείο - ρίζα 'orders'.
	  $order = $xml->createElement("order");
    $order->setAttribute("order_id", $order_id);
    $orders->appendChild($order);
        
    /*Δημιουργούμε τα στοιχεία - παιδιά με τα ονόματα: 'customer_fname', 'customer_lname', 'total_cost' 
    και τα προσθέτουμε ακριβώς κάτω από το στοιχείο 'order'.*/
    $customerFname = $xml->createElement("customer_fname", $customer_fname);
    $order->appendChild($customerFname);

    $customerLname = $xml->createElement("customer_lname", $customer_lname);
    $order->appendChild($customerLname);

    $totalCost = $xml->createElement("total_cost", $total_cost);
    $order->appendChild($totalCost);
	}

	//Ερώτημα στη βάση δεδομένων για την ανάκληση των 5 δημοφιλέστερων προϊόντων
	//στο χρονικό διάστημα που έθεσε ο διαχειριστής.
  $sql2 = mysqli_query($con, "SELECT * FROM product_tbl 
								INNER JOIN order_tbl ON product_tbl.id = order_tbl.product_id
								WHERE order_date BETWEEN '$from_date' AND '$to_date'
								GROUP BY order_tbl.product_id 
								ORDER BY sum(order_tbl.quantity) DESC 
								LIMIT 5");
  //end_sql2

  while ( $row2 = mysqli_fetch_assoc($sql2) ) {

    $product_id = $row2["product_id"];
    $product_name = $row2["name"];

    //Δημιουργούμε το στοιχείο - παιδί με το όνομα 'popular_product' 
		//και το προσθέτουμε ακριβώς κάτω από το στοιχείο - ρίζα 'orders'.
    $popular_product = $xml->createElement("popular_product");
    $popular_product->setAttribute("product_id", $product_id);
    $orders->appendChild($popular_product);

    //Δημιουργούμε το στοιχείο - παιδί με το όνομα: 'product_name' 
    //και το προσθέτουμε ακριβώς κάτω από το στοιχείο 'popular_product'.
    $productName = $xml->createElement("product_name", $product_name);
    $popular_product->appendChild($productName);
  }

	//Ολοκλήρωση της δημιουργίας του xml αρχείου κι αποθήκευση στον κατάλογο 'files'
	//με το όνομα 'orders_ημερομηνία(από)--ημερομηνία(εώς).xml'.
  $xml->saveXML();
  $xml->save("../files/orders_" . $from_date . "--" .$to_date . ".xml");       
		
	?>
    <script> 
    	//alert('Η εξαγωγή των αποτελεσμάτων ολοκληρώθηκε επιτυχώς! Παρακαλώ επιλέξτε ΟΚ για την προβολή του καταλόγου.'); 
    	document.location = '../xmlForm.php#xml_results';
    </script>
  <?php
}

else {

	?>
    <script> 
    	alert('Σφάλμα: Εισαγωγή λάθος ημερομηνιών.');
    	document.location = '../xmlForm.php';
    </script>
    <?php
}
?>

