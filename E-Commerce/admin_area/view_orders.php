<table width="795" align="center" bgcolor="pink">
<tr align="center">
<td colspan="6"><h2>View All Order Details</h2></td>
</tr>
<tr align="center" bgcolor="skyblue">
<th>S.N</th>
<th>Customer Email</th>
<th>Product(s)</th>
<th>Quantity</th>
<th>Invoice No</th>
<th>Order Date</th>
<th>Action</th>
</tr>

<?php
include("includes/db.php");

$get_order ="select * from orders where c_id = '$c_id' ";
$run_order = mysqli_query($con,$get_order);

$i=0;

while($row_order=mysqli_fetch_array($run_order)){
	$order_id =$row_order['order_id'];
	$qty = $row_order['qty'];
	$pro_id =$row_order['p_id'];
	$c_id =$row_order['c_id'];
	$invoice_no =$row_order['invoice_no'];
	$order_date =$row_order['order_date'];
	
	$i++;


	 $get_pro = "select * from products where product_id = '$pro_id'";
	 $run_pro = mysqli_query($con,$get_pro);

	 $row_pro = mysqli_fetch_array($run_pro);
	 $pro_image =$row_pro['product_img1'];
	 $pro_title =$row_pro['product_title'];

	 $get_c = "select * from customers where customer_id ='$c_id'";
	 $run_c = mysqli_query($con,$get_c);
	 $row_c = mysqli_fetch_array($run_c);

//customer email
	 $c_email = $row_c['customer_email'];





?>
<tr align="center">
<td><?php echo  $i;?></td>
<td><?php echo $c_email;?></td>

<td><?php echo $pro_title;?></td><br>
<td><img src="../admin_area/products_images/<?php echo $pro_image;?>" width="50" height="50"/></td>
<td><?php echo $qty;?></td>
<td><?php echo $invoice_no; ?></td>
<td><?php echo $order_date;?></td>
<td><a href="index.php?confirm_order=<?php echo $order_id;?>Complete Order</a></td>
	
</tr>
<?php } ?>
</table>

