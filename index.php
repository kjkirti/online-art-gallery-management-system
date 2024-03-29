<!DOCTYPE>
<?php
session_start();
/*ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);*/
include("functions/functions.php");
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
		   <span style="float:right; font-size:16px; padding:5px; line-height:40px;">
		   <?php
		   if(isset($_SESSION['customer_email'])){
			   echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:#b35c00;'>Your</b>";
			   
		   }
		   else{
			   
			   echo "<b>Welcome Guest!</b>";
		   }
		   
		   
		   ?>
		   
		   <b style="color:#b35c00">Shopping Cart - </b>Total Items: <?php total_paintings(); ?> Total Price: <?php total_price(); ?>
		   <a href="cart.php" style="color:#b35c00">Go To Cart</a>
		   <?php
		   if(!isset($_SESSION['customer_email'])){
			   echo "<a href='checkout.php' style='color:orange'>Login</a>";
			   
			   
		   }
		   else{
		   
		   echo "<a href='logout.php' style='color:orange'>Logout</a>";
		   }
		   
		   
		   
		   
		   ?>
		   </span>
		   
		   
		   
		   
		   </div>
		 
		 
		  <div id="painting_box">
		  <?php
		  
		  
		  getPaintings();
		  ?>
		  <?php getCatPaintings();  ?>
		  <?php getGalPaintings(); ?>
		  
		  
		  
		  
		  
		  
		  </div>
		  
		  
		  
		  
		  
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
