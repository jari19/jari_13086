<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_13086 where invoiceid='$id'");
		mysqli_query($conn,"delete from invoice_13086 where invoiceid='$id'");
	}
	else if(isset($_POST['delitem'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from salesorder_13086 where invoiceid='$id'");
	}
?>
