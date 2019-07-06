<!DOCTYPE>
<?php
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
		  
	       <div id="shopping_cart">
		   <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
		   Welcome Guest! <b style="color:yellow">Shopping Cart - </b>Total Items: Total Price:
		   <a href="cart.php" style="color:yellow">Go To Cart</a></span>
		   
		   
		   
		   </div>
		   
		 
		  <div id="painting_box">
		 <?php $get_painting = "select * from painting";
   $run_painting = mysqli_query($con,$get_painting);
   
   while($row_painting=mysqli_fetch_array($run_painting)){
	   
	   $painting_id = $row_painting['painting_id'];
	   $painting_cat = $row_painting['painting_cat'];
	   $painting_artistid = $row_painting['artist_id'];
	   $painting_title = $row_painting['painting_title'];
	   $painting_price = $row_painting['painting_price'];
	   $painting_galleryid = $row_painting['gallery_id'];
	  // $painting_desc = $row_painting['painting_desc'];
	   $painting_image = $row_painting['painting_image'];
	   $painting_date = $row_painting['painting_displaydate'];
	   
	   
	   echo "
	   <div id='single_painting'>
	   <h3>$painting_title</h3>
	   <img src='admin_area/paintingimages/$painting_image' width='180' height='180' />
	   <p><b>$ $painting_price</b></p>
	   <a href='details.php?painting_id=$painting_id' style='float:left;'>Details</a>
	   <a href='index.php?painting_id=$painting_id'><button style='float:right'>Add to cart </button></a>
	   
	   
	   </div>
	   
	   
	   ";
	   
	   
	   
	   
	   
	   
	   
	   
	   
   }
	?>
	
		  
		  
		  
		  
		  
		  
		  </div>
		  
		  
		  
		  
		  
		  </div>
		</div>
		<!--content wrapper ends here-->
		
		
		
		
		<div id="footer">
		
		<h3 style="text-align:centre; padding-top:50px;">&copy;  2018-2020 Shutter, Inc. All rights reserved.</h3>
		</div>








    </div>
<!--main container ends here-->





</body>
</html>
