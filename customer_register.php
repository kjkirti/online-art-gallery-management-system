<!DOCTYPE>
<?php
session_start();
/*ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);*/
include("functions/functions.php");
include("includes/db.php");
?>
<html>
 <head>
    <title>My Online Art Gallery</title>
	<link rel="stylesheet" href="styles/style.css" media="all" />
 </head>
 
 
<body>
    
	<!--main container starts from here-->
    <div class="main_wrapper">
	
       
	   
	   <!--header starts from here-->
        <div class="header_wrapper">
		<a href="index.php"></a>
		  /* here lies the image*/
		  
		 </div>
		<!--header ends here-->
		
		
		
		
		<!--navigation bars starts from here-->
		<div class="menubar">
		    <ul id="menu">
			<li><a href="index.php">Home</a></li>
		 
		    <li><a href="all_arts.php">All Arts</a></li>

		    <li><a href="customer/my_account.php">My Account</a></li>

			<li><a href="customer_register.php">Sign Up</a></li>

			<li><a href="cart.php">My Cart</a></li>

		    <li><a href="contact.php">Contact Us</a></li>
			

			</ul>
			<div id="form">
			
			   <form method="get" action="results.php" enctype="multipart/form-data">
			
			    <input type="text" name="user_query" placeholder="Search an Art" />
			    <input type="submit" name="search" value="Search"/>
			  </form>
			  </div>
		  </div>
		  
		  <!--navigation bar ends here-->
		
		
		
		
		<!--content wrapper starts here-->
		<div class="content_wrapper">
		  <div id="sidebar">
		  
		  
		  <div id="sidebar_title">Categories</div>
		  <ul id="cats">
		     
			 <!-- <li><a href="#">Abstract Art</a></li>
			  <li><a href="#">Representational Art</a></li>
			  <li><a href="#">Figure Art</a></li>
			  <li><a href="#">History Art</a></li>
			  <li><a href="#">Portrait Art</a></li>
			  <li><a href="#">Genre Art</a></li>
			  <li><a href="#">Landscape Art</a></li>
			  <li><a href="#">Still Life Art</a></li> here lies the categories-->
			  
			  <?php getCats(); ?>
           		  
		  </ul>
		  
		  <div id="sidebar_title">Galleries</div>
		  <ul id="cats">
		     
			 <?php getGalleries(); ?>
			 
	
           		  
		  </ul>
		  
		  </div>
		
		  <div id="content_area">
		  <?php cart(); ?>
	       <div id="shopping_cart">
		   <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
		   Welcome Guest! <b style="color:yellow">Shopping Cart - </b>Total Items: <?php total_paintings(); ?> Total Price: <?php total_price(); ?>
		   <a href="cart.php" style="color:yellow">Go To Cart</a></span>
		   
		   
		   
		   </div>
		 <form action="customer_register.php" method="post" enctype="multipart/form-data">
		    <table align="center" width="750">
			
			
			
			<tr align="center">
			    <td colspan="6"><h2>Create an Account</h2></td>
			</tr>
		
		    	
			
			<tr>
			    <td align="right">Customer Email:</td>
				<td><input type="text" name="customer_email" required/></td>
			</tr>	
			
			<tr>
			    <td align="right">Customer password:</td>
				<td><input type="password" name="customer_password" required/></td>
			</tr>

            <tr>
			    <td align="right">Customer Name:</td>
				<td><input type="text" name="customer_name" required/></td>
			</tr>			
			<tr>
			    <td align="right">Customer Address:</td>
				<td><input type="text" name="customer_address" required/></td>
			</tr>	
			
			<tr>
			    <td align="right">Customer Contact:</td>
				<td><input type="text" name="customer_contact" required/></td>
			</tr>	
			
			<tr align="center">
			   <td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
			</tr>
		  
		  </table>
		  </form>
		  
		  
		  
		  </div>
		</div>
		<!--content wrapper ends here-->
		
		
		
		
		<div id="footer">
		
		<h3 style="text-align:centre; padding-top:50px;">&copy; 2018-2020 Shutter, Inc. All rights reserved.</h3>
		</div>








    </div>
<!--main container ends here-->





</body>
</html>





<?php

if(isset($_POST['register'])){
	$ip = getIp();
	$c_email = $_POST['customer_email'];
	$c_password = $_POST['customer_password'];
	$c_name = $_POST['customer_name'];
	$c_address = $_POST['customer_address'];
	$c_contact = $_POST['customer_contact'];
	
	echo $insert_c = "insert into customer (customer_ip,customer_email,customer_password,customer_name,address,phone) values ('$ip','$c_email','$c_password','$c_name','$c_address','$c_contact')";
	
	$run_c = mysqli_query($con,$insert_c);
	
	/*if($run_c){
		echo "<script>alert('registration successfull')</script>";
		
		
	}*/
	
	$sel_cart = "select * from cart where ip_add='$ip'";
	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_cart==0)
	{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account Has Been Created Successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		
		
	}
	else
	{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account Has Been Created Successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
	
	
}








?>
