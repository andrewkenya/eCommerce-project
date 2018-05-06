<?php

// if(!isset($_SESSION['user_email'])){
// 	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
// }else{

?>


<table width="795" align="center" bgcolor="pink">
<tr align="center">
<td colspan="6"><h2>View all Designs here</h2></td>
</tr>
<tr align="center" bgcolor="skyblue">
<th>Design ID</th>
<th>Design Title</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
include("includes/db.php");
$get_design ="select * from designs";
$run_design = mysqli_query($con,$get_design);

$i=0;

while($row_design=mysqli_fetch_array($run_design)){
	$design_id =$row_design['design_id'];
	$design_title =$row_design['design_title'];
	$i++;

?>
<tr align="center">
<td><?php echo  $i;?></td>
<td><?php echo $design_title;?></td>
<td><a href="index.php?edit_design=<?php echo $design_id; ?>">Edit</a></td>
<td><a href="delete_design.php?delete_design=<?php echo $design_id;?>">Delete</a></td>
	
</tr>
<?php } ?>
</table>
