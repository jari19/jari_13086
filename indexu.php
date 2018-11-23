<!DOCTYPE html>
<html>
<head>
	<title>Users </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include('serveru.php');
include('homepage.php');



	if (isset($_GET['edit'])) {
		$userid = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user_13086 WHERE userid='$userid'");

	//	if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
		$userid = $n['userid'];
		$password = $n['password'];
                $active = $n['active'];
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

<?php $results = mysqli_query($db, "SELECT * FROM user_13086"); ?>

<table>
	<thead>
		<tr>

			<h3> USERS INFORMATION TABLE</h3>


			<th>userid</th>
			<th>password</th>
                        <th>active</th>
			<th>salespersonid</th>
			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['userid']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['active']; ?></td>
                            <td><?php echo $row['salespersonid']; ?></td>
			<td>
                            <a href="indexu.php?edit=<?php echo $row['userid']; ?>" class="edit_btn" >Edit</a>
			
                            <a href="serveru.php?del=<?php echo $row['userid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


    <form method="post" action="serveru.php" >

	<input type="hidden" name="userid" value="<?php echo $userid; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>userid</label>
		<input type="text" name="userid" value="<?php echo $userid; ?>">
	</div>	

	<div class="input-group">
		<label>password</label>
		<input type="text" name="password" value="<?php echo $password; ?>">
	</div>

	<div class="input-group">
		<label> active</label>
		<input type="text" name="active" value="<?php echo $active; ?>">
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