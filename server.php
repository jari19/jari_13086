<?php 
include('connect.php');
	// initialize variable
	$shopname = "";
	$contactperson = "";
	$contactno = "";
	$address = "";
        $area = "";
        $salesid = "";
	$update = false;

	if (isset($_POST['save'])) {

		$shopname = $_POST['shopname'];
		$contactperson = $_POST['contactperson'];
                $contactno = $_POST['contactno'];
		$address = $_POST['address'];
                $area = $_POST['area'];
                $salesid = $_POST['salesid'];




		mysqli_query($db, "INSERT INTO customer_13086 VALUES ('$shopname', '$contactperson', '$contactno', '$address', '$area', '$salesid')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: login.php');
	}

	if (isset($_POST['update'])) {
		
		$shopname = $_POST['shopname'];
		$contactperson = $_POST['contactperson'];
                $contactno = $_POST['contactno'];
		$address = $_POST['address'];
                $area = $_POST['area'];
                $salesid = $_POST['salesid'];

		mysqli_query($db, "UPDATE customer_13086 SET shopname = '$shopname', contactperson = '$contactperson', contactno = '$contactno', address = '$address', area = '$area', salesid = '$salesid' WHERE shopname='$shopname'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: login.php');
	}

if (isset($_GET['del'])) {
	$shopname = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer_13086 WHERE shopname='$shopname'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: login.php');
}


	$results = mysqli_query($db, "SELECT * FROM customer_13086");


?>