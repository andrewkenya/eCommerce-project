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
                <a href="../index.php"><img src="images/logo.png" style="float:left;"></a>
                <img src="images/sofa2.jpg" style="float:right;" >
            </div>
            <!--end header section-->
            
            <!-- navbar section-->
            <div id ="navbar">
                
                <ul id ="menu">
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="../all_products.php">PRODUCTS</a></li>
                    <li><a href="#">MY ACCOUNT</a></li>
                    <li><a href="signup.php">SIGN UP</a></li>
                    <li><a href="../cart.php">SHOPPING CART</a></li>
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
                        
                        <?php
                        $user = $_SESSION['customer_email'];
                        
                        $get_img = "select * from customers where customer_email='$user'";
                        
                        $run_img = mysqli_query($con,$get_img);
                        
                        $row_img = mysqli_fetch_array($run_img);
                        
                        $c_image = $row_img['customer_image'];
                        $c_name =$row_img['customer_name'];
                        
                        echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150'/></p>";
                        
                        ?>
                        <li><a href="my_account.php?my_orders">My Orders</a></li>
                        <li><a href="my_account.php?edit_account">Edit Account</a></li>
                        <li><a href="my_account.php?change_pass">Change Password</a></li>
                        <li><a href="my_account.php?delete_account">Delete Account</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                   
                </div>
                <!--end of sidebar-->
                <div id ="right_content">
                
                <?php cart();?>
                
                <div id="shopping_cart">

                <span style="float:right; font-size:17px;padding:5px; line-height:40px;">

               <?php
               if(isset($_SESSION['customer_email'])){
                echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
               }
                
               ?>

                
                <?php
                if(!isset($_SESSION['customer_email'])){
                    echo "<a href='../checkout.php' style='color:yellow'>Login</a>";
                }else{

                    echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
                }


                ?>
                </span>
                </div>
                
                
                <div id ="products_box">
              
                

                <?php
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['edit_account'])){
                        if(!isset($_GET['change_pass'])){
                            if(!isset($_GET['delete_account'])){

                            echo"
                              <h2 style='padding:20px;'>Welcome: $c_name</h2>
                            <b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>Link</a></b>";
                            }
                        }
                    }
                }
                ?>
                <?php
                if(isset($_GET['edit_account'])){
                    include("edit_account.php");
                }



                if(isset($_GET['change_pass'])){
                    include("change_pass.php");
                }


                 if(isset($_GET['delete_account'])){
                    include("delete_account.php");
                }

                 if(isset($_GET['my_orders'])){
                    include("my_orders.php");
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
