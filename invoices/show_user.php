<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		
		<table class = "table table-bordered alert-warning table-hover" style="background-color:#006680; color:#cccccc;">
			<thead>
				<th>INVOICE ID</th>
				<th>DATE(YYYY-MM-DD)</th>
				<th>CUSTOMER ID</th>
				<th>SHOP NAME</th>
				<th>CUSTOMER NAME</th>
				<th>CONTACT NO</th>
				<th>ADDRESS</th>
				<th>AREA</th>
				<th>SALES ID</th>
				<th>ACTIONS</th>
			</thead>
				<tbody>
					<?php
					$customerid = $_POST['cid'];
					$invoiceid = $_POST['invoiceid'];
					if($customerid != "" || $invoiceid != "" || $invoiceid != 'NOT ASSIGNED'){
					$qinv = mysqli_query($conn, "SELECT * FROM invoice_13086 WHERE invoiceid = '$invoiceid'");
					$invrow = mysqli_fetch_array($qinv);
					if($invrow != NULL){
						$quser=mysqli_query($conn,"SELECT * FROM customer_13086 WHERE customerid = '$customerid'");
						$urow=mysqli_fetch_array($quser);
							?>
								<tr>
									<td><?php echo $invrow['invoiceid'];?> </td>
									<td><?php echo $invrow['date'];?> </td>
									<td><?php echo $invrow['customerid'];?> </td>
									<td><?php echo $urow['shopname'];?> </td>
									<td><?php echo $urow['contactperson']; ?></td>
									<td><?php echo $urow['contactno']; ?></td>
									<td><?php echo $urow['address']; ?></td>
									<td><?php echo $urow['area']; ?></td>
									<td><?php echo $urow['salesid']; ?></td>
									<td > <button class="btn btn-danger delete" value="<?php echo $invrow['invoiceid']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									
									</td>
								</tr>
							<?php } }?>
				</tbody>
			</table>
			<center><h2 style="color:#cccccc;">INVOICE</h2></center>
			<hr>

					<table class = "table table-bordered alert-warning table-hover" style="background-color:#006680; color:#cccccc;">
			<thead>
				<th>ID</th>
				<th>INVOICE ID</th>
				<th>PRODUCT</th>
				<th>PRICE</th>
				<th>QUANTITY</th>
				<th>DISCOUNT(%)</th>
				<th>TOTAL</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"SELECT I.ID, I.invoiceid, P.brand, P.salesprice, I.quantity, I.discount, cast((100-I.discount)/100*(I.quantity*P.salesprice) as int) AS TOTAL FROM salesorder_13086 I, product_13086 P WHERE I.invoiceid = '$invoiceid' AND I.productcode = P.productcode");
						
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['ID']; ?></td>
									<td><?php echo $urow['invoiceid']; ?></td>
									<td><?php echo $urow['brand']; ?></td>
									<td><?php echo $urow['salesprice']; ?></td>
									<td><?php echo $urow['quantity']; ?></td>
									<td><?php echo $urow['discount']; ?></td>
									<td><?php echo $urow['TOTAL']; ?></td>
									
									<td style = "width: 210px"><button class="btn btn-success" style="background-color:#80ffbf; color:#006680;" data-toggle="modal" data-target="#edit<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger deleteitem" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
