<!DOCTYPE html>
<html>
<head>
	<title>Product </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('serverp.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$productcode = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM product_13086 WHERE productcode='$productcode'");

	//	if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
		$productcode = $n['productcode'];
		$brand = $n['brand'];
                $type = $n['type'];
		$shade = $n['shade'];
                $size = $n['size'];
                $salesprice = $n['salesprice'];

		//}

	}
?>

	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM product_13086"); ?>

<table>
	<thead>
		<tr>

			<h3> PRODUCT TABLE</h3>


			<th>productcode</th>
			<th>brand</th>
                        <th>type</th>
                        <th>shade</th>
                        <th>size</th>
			<th>salesprice</th>
			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['productcode']; ?></td>
			<td><?php echo $row['brand']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['shade']; ?></td>
                        <td><?php echo $row['size']; ?></td>
                            <td><?php echo $row['salesprice']; ?></td>
			<td>
                            <a href="indexp.php?edit=<?php echo $row['productcode']; ?>" class="edit_btn" >Edit</a>
			
                            <a href="serverp.php?del=<?php echo $row['productcode']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


    <form method="post" action="serverp.php" >

	<input type="hidden" name="productcode" value="<?php echo $productcode; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>productcode</label>
		<input type="text" name="productcode" value="<?php echo $productcode; ?>">
	</div>	

	<div class="input-group">
		<label>brand</label>
		<input type="text" name="brand" value="<?php echo $brand; ?>">
	</div>

	<div class="input-group">
		<label> type</label>
		<input type="text" name="type" value="<?php echo $type; ?>">
	</div>
         <div class="input-group">
		<label>shade</label>
		<input type="text" name="shade" value="<?php echo $shade; ?>">
	</div>
        <div class="input-group">
		<label>size</label>
		<input type="text" name="size" value="<?php echo $size; ?>">
	</div>
            <div class="input-group">
		<label>salesprice</label>
		<input type="text" name="salesprice" value="<?php echo $salesprice; ?>">
	</div>


	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>