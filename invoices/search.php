<?php
	include('conn.php');
	if(isset($_POST['searchprod'])){
		$productcode=$_POST['productcode'];
		$query = mysqli_query($conn, "SELECT * FROM product_13086 WHERE productcode = '$productcode'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	else if(isset($_POST['search'])){
		$customerid=$_POST['customerid'];
		$query = mysqli_query($conn, "SELECT * FROM customer_13086 WHERE customerid = '$customerid'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
?>

