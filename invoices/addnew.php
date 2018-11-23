<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$invoiceid=$_POST['invoiceid'];
		$date=$_POST['date'];
		$customerid=$_POST['customerid'];
						
		if(!mysqli_query($conn,"insert into invoice_13086 values ('$invoiceid', '$date','$customerid')"))
			echo 'Failed to add. Make sure INVOICE ID is unique';
	}
	else if(isset($_POST['additem'])){
		$invoiceid=$_POST['invoiceid'];
		$productcode=$_POST['productcode'];
		$quantity=$_POST['quantity'];
		$discount=$_POST['discount'];
		if(!mysqli_query($conn,"insert into salesorder_13086(invoiceid,productcode,quantity,discount) values ('$invoiceid', '$productcode','$quantity','$discount')"))
			echo "Failed to add.";
	}
?>
