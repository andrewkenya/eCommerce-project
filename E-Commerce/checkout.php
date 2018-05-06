<?php
session_start();
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
                    <li><a href="./customer/my_account.php">MY ACCOUNT</a></li>
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
				
				<?php cart();?>
				
				<div id="shopping_cart">
				<span style="float:right; font-size:17px;padding:5px; line-height:40px;">

                 <?php
               if(isset($_SESSION['customer_email'])){
                echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";

               } else{
                echo "<b>Welcome Guest:</b>";
               }
                
               ?>
				<b style="color:yellow">Shopping Cart -</b>Total Items:<?php total_items();?>,&nbsp;Total Price:<?php total_price();?>
				<a href="cart.php">Go to Cart</a>

                <?php
                if(!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a>";
                }else{
                    echo "<a href='logout.php'>Logout</a>";
                }

                ?>
				</span>
				</div>
				
				
				<div id ="products_box">

				<?php

				if(!isset($_SESSION['customer_email'])){

                include("customer_login.php");

                }else{

                include("payment.php");
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
