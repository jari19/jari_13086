<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('server.php');
include('homepage.php');




	if (isset($_GET['edit'])) {
		$shopname = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer_13086 WHERE shopname='$shopname'");

	//	if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
		$shopname = $n['shopname'];
		$contactperson = $n['contactperson'];
                $contactno = $n['contactno'];
		$address = $n['address'];
                $area = $n['area'];
                $salesid = $n['salesid'];

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

<?php $results = mysqli_query($db, "SELECT * FROM customer_13086"); ?>

<table>
	<thead>
		<tr>

			<h3 style="color:#cccccc;"> CUSTOMERS TABLE</h3>


			<th>shopname</th>
			<th>contactperson</th>
                        <th>contactno</th>
                        <th>address</th>
                        <th>area</th>
			<th>salesid</th>
			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['shopname']; ?></td>
			<td><?php echo $row['contactperson']; ?></td>
			<td><?php echo $row['contactno']; ?></td>
			<td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['area']; ?></td>
                            <td><?php echo $row['salesid']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['shopname']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server.php?del=<?php echo $row['shopname']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="shopname" value="<?php echo $shopname; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>shopname</label>
		<input type="text" name="shopname" value="<?php echo $shopname; ?>">
	</div>	

	<div class="input-group">
		<label>contactperson</label>
		<input type="text" name="contactperson" value="<?php echo $contactperson; ?>">
	</div>

	<div class="input-group">
		<label> contactno</label>
		<input type="text" name="contactno" value="<?php echo $contactno; ?>">
	</div>
         <div class="input-group">
		<label>address</label>
		<input type="text" name="address" value="<?php echo $address; ?>">
	</div>
        <div class="input-group">
		<label>area</label>
		<input type="text" name="area" value="<?php echo $area; ?>">
	</div>
            <div class="input-group">
		<label>salesid</label>
		<input type="text" name="salesid" value="<?php echo $salesid; ?>">
	</div>


	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background-color:#7a0099;" >Update</button>
		<?php else: ?>
			<button class="btn" style= "background-color:#7a0099;" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>
