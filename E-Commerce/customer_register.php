<?php
session_start();
include ("functions/functions.php");
include("includes/db.php");
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
				
				<?php cart();?>
				
				<div id="shopping_cart">
				<span style="float:right; font-size:18px;padding:5px; line-height:40px;">
				Welcome Guest!<b style="color:yellow">Shopping Cart -</b>Total Items:<?php total_items();?>,&nbsp;Total Price:<?php total_price();?>
				<a href="cart.php">Go to Cart</a>
				</span>
				</div>
				
				<form action="customer_register.php" method="post" enctype="multipart/form-data"/>
                <table align ="center" width="750">

                <tr align="center">
                <td colspan="6"><h2>Create an Account</h2></td>
                </tr>

                <tr>
                    <td  align="right">Customer Name:</td>
                    <td><input type="text" name="c_name" required/></td>

                </tr>
                
                

                <tr>
                    <td align="right">Customer Email:</td>
                    <td><input type="text" name="c_email" required/></td>
                </tr>



                <tr>
                    <td align="right">Customer Password:</td>
                    <td><input type="password" name="c_pass" required /></td>
                </tr>


               <tr>
                   <td align="right">Customer Image:</td>
                   <td><input type ="file" name="c_image" required/></td>
               </tr>

                <tr>
                    <td align="right">Customer Country</td>
                    <td><select name="c_country" />

                        <option>Select a Country</option>

                        <option>Afghanistan</option>
                        <option>India</option>
                        <option>Japan</option>
                        <option>Pakistan</option>
                        <option>Israel</option>
                        <option>Nepal</option>
                         <option>United Arab Emirates</option>
                         <option>Uganda</option>
                         <option>Tanzania</option>
                         <option>Kenya</option>


                    </td>
                </tr>

                <tr>
                    <td align="right">Customer City:</td>
                    <td><input type="text" name="c_city"  required/></td>
                </tr>


                <tr>
                    <td align="right">Customer Contact:</td>
                    <td><input type="text" name="c_contact" required /></td>
                </tr>

                 <tr>
                     <td align="right">Customer Address:</td>
                     <td><input type="text" name="c_address" required/></td>
                 </tr>


                 <tr align="center">
                     <td colspan="6"><input type="submit" name="register" value="Create Account"/></td>
                 </tr>


                </table>

                </form>
				
                
            </div>
            <div class="footer">
                <h1>&copy;2016-By www.webcube.co.ke</h1>
            </div>
            
        </div>
        <!--Main Container End-->
    </body>
</html>

<?php
if(isset($_POST['register'])){

    $ip = getIp();
     
      $c_name = $_POST['c_name'];
      $c_email = $_POST['c_email'];
      $c_pass = $_POST['c_pass'];
      $c_image = $_FILES['c_image']['name'];
      $c_image_tmp = $_FILES['c_image']['tmp_name'];
      $c_country = $_POST['c_country'];
      $c_city = $_POST['c_city'];
      $c_contact = $_POST['c_contact'];
      $c_address = $_POST['c_address'];

     
     //image
      move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");


       $insert_c ="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city',
      '$c_contact','$c_address','$c_image')";


      $run_c = mysqli_query($con,$insert_c);

      $sel_cart = "select * from cart where ip_add='$ip'";

      $run_cart = mysqli_query($con,$sel_cart);

      $check_cart = mysqli_num_rows($run_cart);


       if($check_cart==0){
        $_SESSION['customer_email'] = $c_email;

        echo "<script>alert('Account has been created successfully,Thanks!')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
       }else{


         $_SESSION['customer_email'] = $c_email;
         
        echo "<script>alert('Account has been created successfully,Thanks!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
       }


}


?>