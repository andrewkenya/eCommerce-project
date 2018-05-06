<?php
$con =mysqli_connect("localhost","root","","myshop");
//get the categories dynamically from the database to the category section 

//check connection
if(!$con){
	die("Connection failed: " . mysqli_connect_error());
}
//ip address code

function getIp(){
	$ip =$_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip =$_SERVER['HTTP_CLIENT_IP'];
	}elseif(!empty($_SERVER['HTTP_X_FORWARD_FOR'])){
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}
//creating the cart 
function cart(){
	
	
	if(isset($_GET['add_cart'])){
		global $con;
		
		$ip = getIp();
		
		$pro_id =$_GET['add_cart'];
		$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		
		$run_check = mysqli_query($con,$check_pro);
		
		if(mysqli_num_rows($run_check)>0){
			echo "";
		}
		else{
			$insert_pro ="insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
			
			$run_pro = mysqli_query($con,$insert_pro);
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
		
	}
	
	
	//getting the cart sum
	function total_items(){
		
	 if(isset($_GET['add_cart'])){
		 global $con;
		 
		 $ip =getIp();
		 
		 $get_items = "select * from cart where ip_add='$ip'";
		 
		 $run_items = mysqli_query($con,$get_items);
		 
		 $count_items = mysqli_num_rows($run_items);
		 
	   }else{
		   global $con;
		 
			$ip = getIp();
		 
		 $get_items = "select * from cart where ip_add='$ip'";
		 
		 $run_items = mysqli_query($con,$get_items);
		 
		 $count_items = mysqli_num_rows($run_items); 
		 }
		echo $count_items;
	}
	
	//getting total prices in the cart
	
	function total_price(){
		
		$total = 0;
		
		global $con;
		
		$ip = getIp();
		
		$sel_price ="select * from cart where ip_add='$ip'";
		$run_price = mysqli_query($con,$sel_price);
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id =$p_price['p_id'];
			
			$pro_price ="select * from products where product_id='$pro_id'";
			$run_pro_price =mysqli_query($con,$pro_price);
			
			while($pp_price = mysqli_fetch_array($run_pro_price)){
				$product_price = array($pp_price['product_price']);
				
				$values = array_sum($product_price);
				
				$total +=$values;
			}
		}
		echo "$" .$total;
	}
	
	
//getting the categories
function getCats(){
	global $con;
	
	$get_cats ="select * from categories";
	$run_cats = mysqli_query($con,$get_cats);
	
	while($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id =$row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		
		echo"<li><a href ='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
	
	
}


//get the designs dynamically from the database

function getDesigns(){
	global $con;
	
	$get_designs ="select * from designs";
	$run_designs = mysqli_query($con,$get_designs);
	
	while($row_designs = mysqli_fetch_array($run_designs)){
		$design_id =$row_designs['design_id'];
		$design_title = $row_designs['design_title'];
		
		 echo"<li><a href ='index.php?cat=$design_id'>$design_title</a></li>";
	}
	
	
}

//displaying products on the website
function getPro(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['design'])){
	global $con;
	
	$get_pro = "select * from products order by RAND() LIMIT 0,6";
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
				
				<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				</div>
		      ";
		
	}
}
	}
}




//displaying category  products on the website
function getCatPro(){
	if(isset($_GET['cat'])){
		
		$cat_id =$_GET['cat'];
		
	global $con;
	
	$get_cat_pro = "select * from products where product_cat='$cat_id'";
	$run_cat_pro = mysqli_query($con,$get_cat_pro);
	
	$count_cats= mysqli_num_rows($run_cat_pro);
	if($count_cats==0){
			echo "<h2>There is no product in this section!</h2>";
	}
		
	while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		$pro_design = $row_cat_pro['product_design'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image= $row_cat_pro['product_img1'];
		
		
		echo "<div id='single_product'>
		
		        <h3>$pro_title</h3>
				
				<img src='admin_area/products_images/$pro_image' width='180'height='180'/>
				
				<p><b>$ $pro_price</b></p>
				
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
				<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				</div>
		      ";
		
		
	}
}
	
}





//displaying design  products on the website
function getDesignPro(){
	
	global $con;
	if(isset($_GET['design'])){
		
		$design_id =$_GET['design'];
		
	
	
	$get_design_pro = "select * from products where product_design='$design_id'";
	$run_design_pro = mysqli_query($con,$get_design_pro);
	
	$count_design = mysqli_num_rows($run_design_pro);
	if($count_design==0){
			echo "<h2>There is no products from this  design !</h2>";
	}
		
	while($row_design_pro = mysqli_fetch_array($run_design_pro)){
		$pro_id = $row_design_pro['product_id'];
		$pro_cat = $row_design_pro['product_cat'];
		$pro_design =$row_design_pro['product_design'];
		$pro_title = $row_design_pro['product_title'];
		$pro_price = $row_design_pro['product_price'];
		$pro_image= $row_design_pro['product_img1'];
		
		
		echo "<div id='single_product'>
		
		        <h3>$pro_title</h3>
				
				<img src='admin_area/products_images/$pro_image' width='180'height='180'/>
				
				<p><b>$ $pro_price</b></p>
				
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
				<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				</div>
		      ";
		
		
	}
}
	
}
















?>