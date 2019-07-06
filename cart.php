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
		   <?php
		   if(isset($_SESSION['customer_email'])){
			   echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
			   
		   }
		   else{
			   
			   echo "<b>Welcome Guest!</b>";
		   }
		   ?>
		   <b style="color:yellow">Shopping Cart - </b>Total Items: <?php total_paintings(); ?> Total Price: <?php total_price(); ?>
		   <a href="index.php" style="color:yellow">Back to Shop</a>
		   
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
		  
		  <form action="" method="post" enctype="multipart/form-data">
		  <table align="center" width="700" bgcolor="skyblue">
		  <tr align="center"><td colspan="5"></td>
		  
		  
		  </tr>
		  <tr align="center">
		  <th>Remove</th>
		  <th>Painting (S)</th>
		 <!-- <th>Quantity</th>-->
		  <th>Total Price</th>
		  
		  
		  </tr>
		  <?php
		 
		$total = 0;
		global $con;
		$ip=getIp();
		$sel_price = "select * from cart where ip_add='$ip'";
		$run_price = mysqli_query($con,$sel_price);
		while($p_price=mysqli_fetch_array($run_price)){
			
			$painting_id = $p_price['painting_id'];
			$painting_price = "select * from painting where painting_id='$painting_id'";
			$run_painting_price = mysqli_query($con,$painting_price);
			while($pp_price = mysqli_fetch_array($run_painting_price)){
				
				$painting_price = array($pp_price['painting_price']);
				$painting_title = $pp_price['painting_title'];
				$painting_image = $pp_price['painting_image'];
				$single_price = $pp_price['painting_price'];
				
				/*$values = array_sum($painting_price);
				
			$total += $values;	*/
			
			
		$values = array_sum($painting_price);
				
			$total += $values;
		
		
		
		
		
	
		  
		  
		  
		  
		  
		  
		  ?>
		  
		  <tr align="center">
		  <td><input type="checkbox" name="remove[]" value="<?php echo $painting_id;?>" /></td>
		  <td><?php echo $painting_title; ?><br>
		  <img src="admin_area/paintingimages/<?php echo $painting_image; ?>" width="60" height="60" /></td>
		  <!--<td><input type="text" size="4" name="qty" /></td>-->
		  <td><?php echo "$".$single_price; ?></td>
		  
		  
		  
		 
		  
		  
		  
		  </tr>
		<?php }} ?>
		 <tr align="right">
		  <td colspan="4"><b>Subtotal:</b></td>
          <td><?php echo "$".$total; ?></td>
		  </tr>
		  
		  <tr align="center">
		  <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
		  <td><input type="submit" name="continue" value="Continue Shopping"></td>
		  <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
		  
          </tr>		  
		  </table>
		  </form>
		  
		  <?php
		  $ip = getIp();
		  
		  if(isset($_POST['update_cart'])){
           foreach($_POST['remove'] as $remove_id){
			   $delete_paintings = "delete from cart where painting_id='$remove_id' AND ip_add='$ip'";

            $run_delete = mysqli_query($con,$delete_paintings);
			if($run_delete){
				echo "<script>window.open('cart.php','_self')</script>";
				
			}
		   }

	       }	
		  
		  if(isset($_POST['continue'])){
			  echo "<script>window.open('index.php','_self')</script>";
		  }
	       ?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
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