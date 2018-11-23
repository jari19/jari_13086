<?php 
include('connect.php');

	// initialize variable
	$userid = "";
	$password = "";
	$active = "";
        $salespersonid = "";
	$update = false;

	if (isset($_POST['save'])) {

		$userid = $_POST['userid'];
		$password = $_POST['password'];
                $active = $_POST['active'];
		$salespersonid = $_POST['salespersonid'];




		mysqli_query($db, "INSERT INTO user_13086 VALUES ('$userid', '$password', '$active', '$salespersonid')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: indexu.php');
	}

	if (isset($_POST['update'])) {
		
		$userid = $_POST['userid'];
		$password = $_POST['password'];
                $active = $_POST['active'];
		$salespersonid = $_POST['salespersonid'];



		mysqli_query($db, "UPDATE user_13086 SET userid = '$userid', password = '$password', active = '$active', salespersonid = '$salespersonid' WHERE userid='$userid'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: indexu.php');
	}

if (isset($_GET['del'])) {
	$userid = $_GET['del'];
	mysqli_query($db, "DELETE FROM user_13086 WHERE userid='$userid'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: indexu.php');
}


	$results = mysqli_query($db, "SELECT * FROM user_13086");


?>