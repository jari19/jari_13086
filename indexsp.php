<!DOCTYPE html>
<html>
<head>
	<title>SalesPerson </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('serversp.php');
include('homepage.php');


	if (isset($_GET['edit'])) {
		$salespersonid = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM salesperson_13086 WHERE salespersonid='$salespersonid'");

	//	if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
		$name = $n['name'];
               $contactno = $n['contactno'];
		$list = $n['list'];
                $salespersonid = $n['salespersonid'];
                
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

<?php $results = mysqli_query($db, "SELECT * FROM salesperson_13086"); ?>

<table>
	<thead>
		<tr>

			<h3> SALESPERSON TABLE</h3>


			<th>name</th>
		        <th>contactno</th>
                        <th>list</th>
                        <th>salespersonid</th>
			
			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['contactno']; ?></td>
			<td><?php echo $row['list']; ?></td>
		     <td><?php echo $row['salespersonid']; ?></td>
			<td>
                            <a href="indexsp.php?edit=<?php echo $row['salespersonid']; ?>" class="edit_btn" >Edit</a>
			
				<a href="serversp.php?del=<?php echo $row['salespersonid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serversp.php" >

	<input type="hidden" name="salespersonid" value="<?php echo $salespersonid; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>	

	
	<div class="input-group">
		<label> contactno</label>
		<input type="text" name="contactno" value="<?php echo $contactno; ?>">
	</div>
         <div class="input-group">
		<label>list</label>
		<input type="text" name="list" value="<?php echo $list; ?>">
	</div>
        <div class="input-group">
		<label>salespersonid</label>
		<input type="text" name="salespersonid" value="<?php echo $salespersonid; ?>">
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