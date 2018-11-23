<?php
	include('conn.php');
	$sql = "SELECT * FROM product_13086";
	$result = mysqli_query($conn, $sql);
	echo "<label>PRODUCT</label>";
	echo "<select type = 'text' id = 'searchinvoiceid' class = 'form-control' name='PRODUCT'>";
	echo "<option value= ''>SELECT PRODUCT</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['productcode'] ."'>" . $row['brand'] ."</option>";
	}
	echo "</select>";
?>



