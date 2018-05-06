<?php

// if(!isset($_SESSION['user_email'])){
// 	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
// }else{

?>

<form action="" method="post" style="padding:80px;">

<b>Insert New Design:</b>

<input type="text" name ="new_design" required />
<input type="submit" name="add_design" value="Add Design"/>

</form>

<?php

include ("includes/db.php");


if(isset($_POST['add_design'])){

$new_design =$_POST['new_design'];

$insert_design = "insert into designs (design_title) values ('$new_design')";

$run_design = mysqli_query($con,$insert_design);

if($run_design){
  echo "<script>alert('New Designs has been inserted!')</script>";
  echo "<script>window.open('index.php?view_designs', '_self')</script>";

}
}

?>
