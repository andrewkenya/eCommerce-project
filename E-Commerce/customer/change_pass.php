<h2 style="text-align:center;">Change Your Password</h2>
<form action ="" method="post">

<table align="center" width="600">
<tr>
<td align="right"><b>Enter Current Password:</b></td>
<td><input type="password" name="current_pass" required></td>
</tr>

<tr>
	<td align="right"><b>Enter New Password:</b></td>
	<td><input type="password" name="new_pass" required></td>
</tr>

<tr>
	<td align="right"><b>Confirm New Password:</b></td>
	<td><input type="password" name="confirm_pass" required></td>
</tr>

<tr align="center">
<td colspan="9">
	<input type="submit" name="change_pass" value="Change Password" />
</td>
</tr>

</table>

<?php

include("includes/db.php");

if(isset($_POST['change_pass'])){

    $user = $_SESSION['customer_email'];

	$current_pass =$_POST['current_pass'];
	$new_pass = $_POST['new_pass'];
	$confirm_pass = $_POST['confirm_pass'];

	$sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

	$run_pass =mysqli_query($con,$sel_pass);
	$check_pass = mysqli_num_rows($run_pass);

	if($check_pass==0){
		echo "<script>alert('Your current password is wrong!')</script>";
		exit();
	}
	if($new_pass!=$confirm_pass){
		echo "<script>alert('new password does not match!')</script>";
		exit();
	}else{
		$update_pass= "update customers set customer_pass='$new_pass' where customer_email='$user'";


		$run_update = mysqli_query($con,$update_pass);

		echo "<script>alert('Your password was updated successfully!')</script>";
		echo"<script>window.open('./my_account.php','_self')</script>";
	}

	}


?>