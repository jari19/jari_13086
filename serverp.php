<?php 
include('connect.php');
	// initialize variable
	$productcode = "";
	$brand = "";
	$type = "";
	$shade = "";
        $size = "";
        $salesprice = "";
	$update = false;

	if (isset($_POST['save'])) {

		$productcode = $_POST['productcode'];
		$brand = $_POST['brand'];
                $type = $_POST['type'];
		$shade = $_POST['shade'];
                $size = $_POST['size'];
                $salesprice = $_POST['salesprice'];




		mysqli_query($db, "INSERT INTO product_13086 VALUES ('$productcode', '$brand', '$type', '$shade', '$size', '$salesprice')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: indexp.php');
	}

	if (isset($_POST['update'])) {
		
		$productcode = $_POST['productcode'];
		$brand = $_POST['brand'];
                $type = $_POST['type'];
		$shade = $_POST['shade'];
                $size = $_POST['size'];
                $salesprice = $_POST['salesprice'];

		mysqli_query($db, "UPDATE product_13086 SET productcode = '$productcode', brand = '$brand', type = '$type', shade = '$shade', size = '$size', salesprice = '$salesprice' WHERE productcode='$productcode'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: indexp.php');
	}

if (isset($_GET['del'])) {
	$productcode = $_GET['del'];
	mysqli_query($db, "DELETE FROM product_13086 WHERE productcode='$productcode'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: indexp.php');
}


	$results = mysqli_query($db, "SELECT * FROM product_13086");


?>