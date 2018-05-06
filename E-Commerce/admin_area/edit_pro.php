<!DOCTYPE html>
<?php
include ("includes/db.php");

// if(!isset($_SESSION['user_email'])){
//   echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
// }else{

if(isset($_GET['edit_pro'])){
  $get_id = $_GET['edit_pro'];

  $get_pro ="select * from products where product_id ='$get_id'";
  $run_pro = mysqli_query($con,$get_pro);

$i=0;

 $row_pro = mysqli_fetch_array($run_pro);

  $pro_id =$row_pro['product_id'];
  $pro_title =$row_pro['product_title'];
  $pro_image =$row_pro['product_img1'];
  $pro_price =$row_pro['product_price'];
  $pro_desc =$row_pro['product_desc'];
  $product_keywords =$row_pro['product_keywords'];
  $pro_cat =$row_pro['product_cat'];
  $pro_design =$row_pro['product_design'];


  $get_cat = "select * from categories where cat_id = '$pro_cat'";
  $run_cat =mysqli_query($con,$get_cat);

  $row_cat = mysqli_fetch_array($run_cat);

  $category_title =$row_cat['cat_title'];


  $get_design = "select * from designs where design_id = '$pro_design'";
  $run_design =mysqli_query($con,$get_design);

  $row_design = mysqli_fetch_array($run_design);

  $design_title =$row_design['design_title'];
}

?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <table width="797"  align="center" border="1" bgcolor="#187eae">
                <tr align="center">
                    <td colspan="2"><h1>Edit & Update Product:</h1></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Title</b></td>
                        <td><input type="text" name="product_title" size ="50" value="<?php echo $pro_title;?>"/></td>
                </tr>
                
                <tr>
                   
                    <td align="right"><b>Product Category</b></td>
                     <td>
                             <select name="product_cat" required>
                            <option><?php echo $category_title;?></option>
                            
                             <?php
                      $get_cats ="select * from categories";
	        $run_cats = mysqli_query($con,$get_cats);
	
	         while($row_cats = mysqli_fetch_array($run_cats)){
		     $cat_id =$row_cats['cat_id'];
		     $cat_title = $row_cats['cat_title'];
		
		echo"<option value ='$cat_id'>$cat_title</option>";
	}
	
                        ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td align="right"><b>Product Designs</b></td>
                   <td> <select name="product_design" required>
                            <option><?php echo $design_title;?></option>
                            
                            
                            <?php
                      $get_designs = "select * from designs";
                      $run_designs =  mysqli_query($con, $get_designs);
                      
                      while($row_designs =  mysqli_fetch_array($run_designs)){
                          
                          $design_id =$row_designs['design_id'];
                          $design_title = $row_designs['design_title'];
                          
                        echo"<option value ='$design_id'>$design_title</option>";
                      }
                        ?> 
                </tr>
                
                <tr>
                    <td align="right" ><b>Product Image 1</b></td>
                    <td><input type="file" name="product_img1" /><img src="products_images/<?php echo $pro_image; ?>" width ="60px" height="60px"/></td>
                </tr>
                
                
                
                 <tr>
                      <td align="right"><b>Product Price</b></td>
                    <td><input type="text" name="product_price" value="<?php echo $pro_price;?>"/></td>
                </tr>
                
                
                 <tr>
                      <td align="right" ><b>Product Description</b></td>
                      <td><textarea name="product_desc" cols="35" row="10"><?php echo $pro_desc;?></textarea></td>
                </tr>
                
                 <tr>
                      <td align="right"><b>Product Keywords</b></td>
                    <td><input type="text" name="product_keywords" size="50"  value="<?php echo $product_keywords;?>"/></td>
                </tr>
                
                 <tr align="center">
                    <td colspan="2"><input type="submit" value="Update Product" name="update_product" /></td>
                </tr>
                </table>
                
        </form>
        </body>
        </html>
		
		<?php
		if(isset($_POST['update_product'])){
			
			//get text data from the fields
      $update_id = $pro_id;

			$product_title =$_POST['product_title'];
			$product_cat = $_POST['product_cat'];
			$product_design = $_POST['product_design'];
			$product_price = $_POST['product_price'];
			$product_desc = $_POST['product_desc'];
			$product_keywords = $_POST['product_keywords'];
			
			//get the image from the field
			$product_img1 =$_FILES['product_img1']['name'];
			//$product_img2 =$_FILES['product_img2']['name'];
			//$product_img3 =$_FILES['product_img3']['name'];
			
			$product_img1_tmp =$_FILES['product_img1']['tmp_name'];
			//$product_img2_tmp =$_FILES['product_img2']['tmp_name'];
			//$product_img3_tmp =$_FILES['product_img3']['tmp_name'];
			
			//uploading images to its folder
			move_uploaded_file($product_img1_tmp, "products_images/$product_img1");
			//move_uploaded_file($product_img2_tmp, "products_images/$product_img2");
			//move_uploaded_file($product_img3_tmp, "products_images/$product_img3");
			
			 $update_product = "update products set product_cat ='$product_cat' , product_design ='$product_design',product_title='$product_title',product_price ='$product_price' ,product_desc='$product_desc',product_img1='$product_img1',product_keywords ='$product_keywords' where product_id ='$update_id'";
			
			$run_product = mysqli_query($con,$update_product);
			
			 if($run_product){
				echo "<script>alert('product has been updated!')</script>";
        echo "<script>window.open('index.php?view_products', '_self')</script>";				
			 }
		}
		?>
    



            


            