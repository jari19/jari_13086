<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>CUSTOMER ID</th>
				<th>SHOP NAME</th>
				<th>CUSTOMER NAME</th>
				<th>CONTACT NO</th>
				<th>ADDRESS</th>
				<th>AREA</th>
				<th>SALES ID</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM customer_13086');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['customerid']; ?></td>
									<td><?php echo $urow['shopname']; ?></td>
									<td><?php echo $urow['contactperson']; ?></td>
									<td><?php echo $urow['contactno']; ?></td>
									<td><?php echo $urow['address']; ?></td>
									<td><?php echo $urow['area']; ?></td>
									<td><?php echo $urow['salesid']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['customerid']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['customerid']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>
