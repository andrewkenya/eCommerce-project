<?php

include ("includes/db.php");

// if(!isset($_SESSION['user_email'])){
// 	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
// }else{



if(isset($_GET['edit_design'])){
  $design_id =$_GET['edit_design'];
  $get_design = "select  * from designs where design_id = '$design_id'";

  $run_design = mysqli_query($con,$get_design);
  $row_design = mysqli_fetch_array($run_design);

  $design_id  = $row_design['design_id'];
  $design_title =$row_design['design_title'];


}
?>



<form action="" method="post" style="padding:80px;">

<b>Update Design:</b>

<input type="text" name ="new_design" value="<?php echo $design_title;?>" />
<input type="submit" name="update_design" value="Update Design"/>

</form>

<?php


if(isset($_POST['update_design'])){

$update_id = $design_id;


$new_design =$_POST['new_design'];

$update_design = "update   designs  set design_title = '$new_design' where  design_id='$update_id'";

$run_update = mysqli_query($con,$update_design);

if($run_update){
  echo "<script>alert('Design has been updated!')</script>";
  echo "<script>window.open('index.php?view_designs', '_self')</script>";

}


}




?>
