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
 
 
<body style="background-image:url(../images/t12.jpg);">
    
	<!--main container starts from here-->
    <div class="main_wrapper" >
	
       
	   
	   <!--header starts from here-->
        
		<!--header ends here-->
		
		
		
		
		<!--navigation bars starts from here-->
		<div class="menubar" style="background:#604020;">
		    <ul id="menu">
			<li><a href="../index.php" style="color:white; font-family:Palatino; font-size:23px;">Home</a></li>
		 
		    <li><a href="../all_arts.php" style="color:white; font-family:Palatino; font-size:23px;">All Arts</a></li>

		    <li><a href="../customer/my_account.php" style="color:white; font-family:Palatino; font-size:23px;">My Account</a></li>

		

			<li><a href="../cart.php" style="color:white; font-family:Palatino; font-size:23px;">My Cart</a></li>

		    <li><a href="../contact.php" style="color:white; font-family:Palatino; font-size:23px;">Contact Us</a></li>
			

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
		<div class="content_wrapper" >
		  <div id="sidebar" style="background:#86582d;">
		  
		  
		  <div id="sidebar_title" style="background:black; color:white;" >My Account</div>
		  <ul id="cats">
		  <?php
		  $user = $_SESSION['customer_email'];
		  $get_name = "select * from customer where customer_email='$user'";
		  $run_name = mysqli_query($con,$get_name);
		  $row_name = mysqli_fetch_array($run_name);
		  $c_name = $row_name['customer_name'];
		  
		  
		  
		  ?>
		     
			  <li><a href="my_account.php?my_orders" style="color:white; font-family:Palatino; font-size:20px;">My Orders</a></li>
			  <li><a href="my_account.php?edit_account" style="color:white; font-family:Palatino; font-size:20px;">Edit Account</a></li>
			  <li><a href="my_account.php?change_pass" style="color:white; font-family:Palatino; font-size:20px;">Change Password</a></li>
			  <li><a href="my_account.php?delete_account" style="color:white; font-family:Palatino; font-size:20px;">Delete Account</a></li>
			   <li><a href="logout.php" style="color:white; font-family:Palatino; font-size:20px;">Logout</a></li>
			  
			  
			  
           		  
		  </ul>
		  
		  
		  
		  </div>
		
		  <div id="content_area"">
		  <?php cart(); ?>
	       <div id="shopping_cart" >
		   <span style="float:right; font-size:16px; padding:5px; line-height:40px;">
		   <?php
		   if(isset($_SESSION['customer_email'])){
			   echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
			   
		   }
		  else{
			  echo "<script>window.open('../checkout.php','_self')</script>";
		  }
		
		   
		   
		   ?>
		   
		  
		   <?php
		   if(!isset($_SESSION['customer_email'])){
			   echo "<a href='../checkout.php' style='color:orange'>Login</a>";
			   
			   
		   }
		   else{
		   
		   echo "<a href='logout.php' style='color:orange'>Logout</a>";
		   }
		   
		   
		   
		   
		   ?>
		   </span>
		   
		   
		   
		   
		   </div>
		 
		 
		  <div id="painting_box">
		  
		  
		  
		  
		 
		  
		  <?php
		  if(!isset($_GET['my_orders'])){
			  if(!isset($_GET['edit_account'])){
				  if(!isset($_GET['change_passw'])){
					  if(!isset($_GET['delete_account'])){
						  
		   /*echo "
		   <h2 style='padding:15px;'>Welcome: $c_name</h2>
		   <b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a>.</b>";*/
		  
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
		</div>
		<!--content wrapper ends here-->
		
		
		
		
		<div id="footer" style="background:#604020;">
		
		<h3 style="text-align:centre; padding-top:50px;">&copy; 2018-2020 Shutter, Inc. All rights reserved.</h3>
		</div>








    </div>
<!--main container ends here-->





</body>
</html>
