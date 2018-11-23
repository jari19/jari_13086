<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$quantity=$_POST['quantity'];
		$discount=$_POST['discount'];
		mysqli_query($conn,"UPDATE salesorder_13086 SET quantity='$quantity', discount='$discount' WHERE id ='$id'");
	}
?>
