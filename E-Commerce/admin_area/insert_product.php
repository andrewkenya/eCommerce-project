<!DOCTYPE html>
<?php
include ("includes/db.php");


// if(!isset($_SESSION['user_email'])){
//   echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
// }else{

?>




<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <body>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <table width="797"  align="center" border="1" bgcolor="#187eae">
                <tr align="center">
                    <td colspan="2"><h1>Insert New Product:</h1></td>
                </tr>
                <tr>
                    <td align="right"><b>Product Title</b></td>
                        <td><input type="text" name="product_title" size ="50" required/></td>
                </tr>
                
                <tr>
                   
                    <td align="right"><b>Product Category</b></td>
                     <td>
                             <select name="product_cat" required>
                            <option>Select a Category</option>
                            
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
                            <option>Select a design</option>
                            
                            
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
                    <td><input type="file" name="product_img1" required/></td>
                </tr>
                
                
                
                 <tr>
                      <td align="right"><b>Product Price</b></td>
                    <td><input type="text" name="product_price" required/></td>
                </tr>
                
                
                 <tr>
                      <td align="right" ><b>Product Description</b></td>
                      <td><textarea name="product_desc" cols="35" row="10"></textarea></td>
                </tr>
                
                 <tr>
                      <td align="right"><b>Product Keywords</b></td>
                    <td><input type="text" name="product_keywords" size="50"  required/></td>
                </tr>
                
                 <tr align="center">
                    <td colspan="2"><input type="submit" value="Insert Product" name="insert_product" /></td>
                </tr>
                </table>
                
        </form>
        </body>
        </html>
		
		<?php
		if(isset($_POST['insert_product'])){
			
			//get text data from the fields
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
			
			 $insert_product = "insert into products 
			(product_cat,product_design,product_title,product_price,product_desc,product_img1,product_keywords)values
			 ('$product_cat','$product_design','$product_title','$product_price','$product_desc','$product_img1','$product_keywords')";
			
			
			$insert_pro = mysqli_query($con,$insert_product);
			
			 if($insert_pro){
				echo "<script>alert('product has been inserted!')</script>";
                echo "<script>window.open('index.php?insert_product', '_self')</script>";				
			 }
		}
		?>
  
       



            


            