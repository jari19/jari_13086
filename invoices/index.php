<?php
	include('conn.php');
	session_start();

 if(!isset($_SESSION['userid']))
 {
	header("Location: ../login.php");
 }
?>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<!--<link rel = "stylesheet" type = "text/css" href = "../style.css" /> -->
		<title>Invoice</title>
	</head>
<body>
	<ul>
  <li><a href="../homepage.php">Home</a></li>
  <li><a href="../index.php">Customers</a></li>
  <li><a href="../indexsp.php">Sales</a></li>
  <li><a href="../indexp.php">Products</a></li>
  <li><a href="../indexu.php">Users</a></li>
  <li><a class = "active" href="./index.php">Invoices</a></li>
  <li style="float:right"><a id = "logout-btn" href="../logout.php">Logout</a></li>
  <li style="float:right"><a>Logged in as <?php echo $_SESSION['userid'];?></a></li>
	</ul>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-1">
		</div>
		<div class = "col-md-10 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 style="color:#cccccc;">SELECT INVOICE</h2></center>
					<hr>
					<form  id = "invform" class = "form-horizontal">
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<?php
									$sql = "SELECT customerid FROM customer_13086";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'searchid' class = 'form-control'>";
									echo "<option value= ''>SELECT CUSTOMER</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['customerid'] ."'>" . $row['customerid'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<div id = "searchinv"></div>
						</div>
					</form>
					<button class="btn btn-success" style="background-color:#7a0099; position:relative; left:43%" data-toggle="modal" data-target="#createinvoice"><span class = "glyphicon glyphicon-pencil"></span>ADD NEW INVOICE</button>
					<hr>
					
					<div id="userTable"></div>

					<button class="btn btn-success" style="background-color:#7a0099; position:relative; left:46%" id = "add1" data-toggle="modal" data-target="#addentry" disabled="true"><span class = "glyphicon glyphicon-pencil" ></span>ADD ITEM</button>


					<div class="modal fade" id="createinvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content" style="background-color:#cce6ff;">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 style="color:#006680;">Create Invoice</h3></center>
					</div>
					<div class="modal-body">
					<form  id = "addform" class = "form-horizontal" style="color:#006680;">
						<div class = "form-group">
							<label>INVOICE ID</label>
							<input type  = "text" id = "invoiceid" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DATE</label>
							<input type  = "date" id = "date" class = "form-control">
						</div>
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<input type  = "text" id = "customerid" class = "form-control">
						</div>
					    <div class = "form-group">
							<label>SHOP NAME</label>
							<input type  = "text" id = "shopname" class = "form-control" readonly>
						</div>
					    <div class = "form-group">
							<label>CUSTOMER NAME</label>
							<input type  = "text" id = "contactperson" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>CONTACT NO.</label>
							<input type  = "text" id = "contactno" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>ADDRESS</label>
							<input type  = "text" id = "address" class = "form-control" readonly>
						</div>
						
						<div class = "form-group">
							<label>SALES ID</label>
							<input type  = "text" id = "salesid" class = "form-control" readonly>
						</div>
						

					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" style="background-color:red; color:white;" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" style="background-color:#7a0099;" id="addnew"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>			
</div>
</div>
</div>
</div>
</div>
		<div class="modal fade" id="addentry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content" style="background-color:#cce6ff;">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 style="color:#006680;">Add Entry</h3></center>
					</div>
					<div class="modal-body">
					<form  class = "form-horizontal" style="color:#006680;">
						
						<div class = "form-group">
							<label>ITEM</label>
							<?php
									$sql = "SELECT * FROM product_13086";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'productcode' class = 'form-control' name='type'>";
									echo "<option value= ''>SELECT PRODUCT</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['productcode'] ."'>" . $row['brand'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<label>QUANTITY</label>
							<input type  = "number" id = "quantity" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DISCOUNT</label>
							<input type  = "number" id = "discount" value = '0' class = "form-control">
						</div>
						<div class = "form-group">
							<label>TOTAL</label>
							<input type  = "number" id = "total" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>TYPE</label>
							<input type  = "text" id = "type" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SHADE</label>
							<input type  = "text" id = "shade" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SIZE</label>
							<input type  = "text" id = "size" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SALES PRICE</label>
							<input type  = "number" id = "salesprice" class = "form-control" readonly>
						</div>
						
					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" style="background-color:red; color:white;" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" style="background-color:#7a0099;" id="additem"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
				</div>
				</div><br>
			
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>

<script type = "text/javascript">
$(document).ready(function(){
		var price = 0;
		$('#searchid').change(function(){
			if ($('#searchid').val() == "")
				$('#searchinvoiceid').prop('disabled', true);
			else
			{
				$('#searchinvoiceid').prop('disabled', false);
				showinvid();
			}
		});
		$('#searchinv').change(function(){
			if ($('#searchinvoiceid').val() == "")
				$('#add1').prop('disabled', true);
			else
			{
				$('#add1').prop('disabled', false);
			}
			show();
		});

$('#quantity').change(function(){
				var total = parseInt((100-$('#discount').val())/100 * $('#salesprice').val() * $('#quantity').val()); 
   				$('#total').val(total);
});

$('#discount').change(function(){
				var total = parseInt((100-$('#discount').val())/100 * $('#salesprice').val() * $('#quantity').val()); 
   				$('#total').val(total);
});

$('#productcode').change(function(){
			$productcode = $('#productcode').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				productcode: $productcode,
   				searchprod: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#shade').val(obj.shade);
   				$('#type').val(obj.type);
   				$('#size').val(obj.size);
   				$('#salesprice').val(obj.salesprice);
   				salesprice = parseInt(obj.salesprice);
   			}
   		});
});

$('#customerid').change(function(){
			$customerid = $('#customerid').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				customerid: $customerid,
   				search: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
				$('#customerid').val(obj.customerid);
   				$('#shopname').val(obj.shopname);
				$('#contactperson').val(obj.contactperson);
   				$('#contactno').val(obj.contactno);
				$('#address').val(obj.address);
				$('#area').val(obj.area);
   				$('#salesid').val(obj.salesid);
				
   			}
   		});
});

$(document).on('click', '#additem', function(){
			if ($('#productcode').val()=="" || $('#quantity').val()=="" || $('#quantity').val()<=0 || $('#discount').val()<0|| $('#discount').val() == ''){
				alert('Please input data first');
			}
			else{
			$('#addentry').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$productcode=$('#productcode').val();
			$quantity=$("#quantity").val();
			$discount=$("#discount").val();	
			$invoiceid=$("#searchinvoiceid").val();
			$('#additem').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						productcode: $productcode,
						invoiceid: $invoiceid,
						quantity: $quantity,
						discount: $discount,
						additem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#additem').html('Add');
						show();
						
					}
				});
			}
		});


		//ADD NEW
		$(document).on('click', '#addnew', function(){
			if ($('#customerid').val()=="" || $('#invoiceid').val()=="" || isNaN(Date.parse($('#date').val()))){
				alert('Please input data first');
			}
			else{
			$('#createinvoice').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$customerid=$('#customerid').val();
			$invoiceid=$("#invoiceid").val();
			$date=$("#date").val();	
			$('#addnew').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						customerid: $customerid,
						invoiceid: $invoiceid,
						date: $date,
						add: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#addnew').html('Add');
						showinvoiceid();
						
					}
				});
			}
		});
		

		//DELETE
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				showinvoiceid();
        				show();
					}
				});
		});

		$(document).on('click', '.deleteitem', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						delitem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				show();
					}
				});
		});

		//UPDATE
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$uquantity=$('#uquantity'+$uid).val();
			$udiscount=$('#udiscount'+$uid).val();
			$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						quantity: $uquantity,
						discount: $udiscount,
						edit: 1,
					},
					success: function(){
						show();
					}
				});
		});
	
	});
	
	function showinvid(){
		$searchid = $('#searchid').val();
		$.ajax({
			url: 'searchinvoice.php',
			type: 'POST',
			data:{
				searchid: $searchid,
			},
			success: function(response){
				$('#searchinv').html(response);
			}
		});
	}
	function show(){
		$customerid=$('#searchid').val();
		$invoiceid=$('#searchinvoiceid').val();
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			data:{
				invoiceid: $invoiceid,
				cid: $customerid,
				show: 1,
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
<style type="text/css">
	body{
		background-color:#006680;
		color:#cccccc;
	}
	#invform{

		padding: 20px 20px;
		border: 2px dotted #cccccc;
	}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:#bf80ff;
	
}

li {
    float: left;
}

li a {
    display: block;
    color: white !important;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none !important;
}

li a:hover:not(.active) {
    background-color: #7a0099;
}
#logout-btn:hover{
	background-color: maroon;
}

.active {
    background-color: #7a0099;
}
.active:hover {
    background-color: #7a0099;
    border-color: #419641;
}
hr{
	border-color:#cccccc;
}

</style>
</html>
