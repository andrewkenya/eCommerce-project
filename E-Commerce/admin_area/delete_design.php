<?php
include ("includes/db.php");

// if(!isset($_SESSION['user_email'])){
// 	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
// }else{

if(isset($_GET['delete_design'])){

$delete_id =$_GET['delete_design'];

$delete_design ="delete from designs where design_id ='$delete_id'";

$run_delete = mysqli_query($con,$delete_design);

if($run_delete){
	echo "<script>alert('A Design  has been deleted!')</script>";
	echo "<script>window.open('index.php?view_designs', '_self')</script>";
}


}
?>
