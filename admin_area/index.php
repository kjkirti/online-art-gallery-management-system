<?php

session_start();
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";}
else

	
	

	
	


	{


?>

<!DOCTYPE>

<html>
    <head>
	    <title>This is Admin Panel</title>
		
		<link rel="stylesheet" href="styles/style.css" media="all" />
		</head>




<body>

  <div class="main_wrapper">


        <div id="header"></div>
		
		<div id="right">
		<h2 style="text-align:center;">Manage Content:</h2>
		
		        <a href="index.php?insertpaintings">Insert Paintings</a>
				<a href="index.php?view_paintings">View All Paintings</a>
		        <a href="index.php?insert_gallery">Insert New Gallery</a>
				<a href="index.php?view_gallery">View All Galleries</a>
				<a href="index.php?insert_cat">Insert New Category</a>
				<a href="index.php?view_cat">View All Categories</a>
				<a href="index.php?insert_artist">Insert Artist</a>
				<a href="index.php?view_artist">View All Artist</a>
				<a href="index.php?view_customers">View Customers</a>
				<a href="index.php?view_orders">View Orders</a>
				<a href="logout.php">Admin Logout</a>
		
		
		</div>
		<div id="left">
		<h2 style="color:black; text-align:center;" ><?php echo @$_GET['logged_in']; ?></h2>
		
		<?php
		
		if(isset($_GET['view_paintings'])){
			include("view_paintings.php");
		}
		if(isset($_GET['edit_painting'])){
			include("edit_painting.php");
		}
		
		if(isset($_GET['insert_cat'])){
			include("insert_cat.php");
		}
		if(isset($_GET['view_cat'])){
			include("view_cat.php");
		}
		if(isset($_GET['insert_gallery'])){
			include("insert_gallery.php");
		}
		if(isset($_GET['view_gallery'])){
			include("view_gallery.php");
		}
		if(isset($_GET['edit_gallery'])){
			include("edit_gallery.php");
		}
		if(isset($_GET['view_customers'])){
			include("view_customers.php");
		}
		if(isset($_GET['edit_cat'])){
			include("edit_cat.php");
		}
		if(isset($_GET['insertpaintings'])){
			include("insertpaintings.php");
		}
		if(isset($_GET['insert_artist'])){
			include("insert_artist.php");
		}
		if(isset($_GET['view_artist'])){
			include("view_artist.php");
		}
		
		if(isset($_GET['view_orders'])){
			include("view_orders.php");
		}
		
		
		?>
		
		
		
		
		</div>
  
  
  


   </div>


</body>
</html>	

<?php  }   ?>