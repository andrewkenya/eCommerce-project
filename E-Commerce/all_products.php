<?php
include ("functions/functions.php");
?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
         <meta name="author" content="">
        <title>E-Furniture</title>
        <link rel="stylesheet"  href="styles/styles.css" type="text/css">
        
    </head>
    <body>
        <!--Main Container Start-->
        <div class="main_wrapper">
            <!--header section-->
            <div class="header_wrapper">
                <a href="index.php"><img src="images/logo.png" style="float:left;"></a>
                <img src="images/sofa2.jpg" style="float:right;" >
            </div>
            <!--end header section-->
            
            <!-- navbar section-->
            <div id ="navbar">
                
                <ul id ="menu">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="all_products.php">PRODUCTS</a></li>
                    <li><a href="my_account.php">MY ACCOUNT</a></li>
                    <li><a href="signup.php">SIGN UP</a></li>
                    <li><a href="cart.php">SHOPPING CART</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                 
                </ul>
                
                <div id ="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query"  placeholder="Search a Product"/>
                        <input type="submit" name="search" value="Search"/>
                    </form>
                </div>
                
            </div>
            
            
            
            <div class="content_wrapper">
                
                <div id="left_sidebar">
                    
                    <div id ="sidebar_title">Categories</div>
                    
                    <ul id="cat">
                        
                        <?php getCats();?>
                    </ul>
                   
                    <!--brands-->
                     <div id ="sidebar_title">Designs</div>
                    <ul id="cat">
                        
                       <?php
					   getDesigns();?>
					  
                    </ul>
                     
                </div>
                <!--end of sidebar-->
                <div id ="right_content">
				
				<div id="shopping_cart">
				<span style="float:right; font-size:18px;padding:5px; line-height:40px;">
				Welcome Guest!<b style="color:yellow">Shopping Cart -</b>Total Items:  Total Price:
				<a href="cart.php">Go to Cart</a>
				</span>
				</div>
				
				<div id ="products_box">
				
				<?php
	 $get_pro = "select * from products";
	$run_pro = mysqli_query($con,$get_pro);
	
	while($row_pro = mysqli_fetch_array($run_pro)){
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_design = $row_pro['product_design'];
		$pro_title =$row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image= $row_pro['product_img1'];
		
		echo "<div id='single_product'>
		
		        <h3>$pro_title</h3>
				
				<img src='admin_area/products_images/$pro_image' width='180'height='180'/>
				
				<p><b>$ $pro_price</b></p>
				
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
				<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				</div>
		      ";
		
	}
				?>
				
				</div>
                
                
            </div>
            <div class="footer">
                <h1>&copy;2016-By www.webcube.co.ke</h1>
            </div>
            
        </div>
        <!--Main Container End-->
    </body>
</html>
