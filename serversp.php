<?php 
include('connect.php');
	// initialize variable
	$name = "";
	$contactno = "";
	$list = "";
        $salespersonid = "";
        $update = false;

	if (isset($_POST['save'])) {

		$name = $_POST['name'];
		$contactno = $_POST['contactno'];
		$list = $_POST['list'];
                $salespersonid = $_POST['salespersonid'];




		mysqli_query($db, "INSERT INTO salesperson_13086 VALUES ('$name', '$contactno', '$list', '$salespersonid')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		
		$name = $_POST['name'];
		$contactno = $_POST['contactno'];
		$list = $_POST['list'];
                $salespersonid = $_POST['salespersonid'];

		mysqli_query($db, "UPDATE salesperson_13086 SET name = '$name', contactno = '$contactno', list = '$list', salespersonid = '$salespersonid' WHERE salespersonid='$salespersonid'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$salespersonid = $_GET['del'];
	mysqli_query($db, "DELETE FROM salesperson_13086 WHERE salespersonid='$salespersonid'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: index.php');
}


	$results = mysqli_query($db, "SELECT * FROM salesperson_13086");


?>