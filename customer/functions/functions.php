<?php
$con = mysqli_connect("localhost","root","","project");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//getting the user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
 

//creating hte shopping cart

function cart(){
	

	if(isset($_GET['add_cart'])){
		global $con;
		$ip = getIp();
		$painting_id=$_GET['add_cart'];
		$check_painting = "select * from cart where ip_add='$ip' AND painting_id='$painting_id'";
		$run_check = mysqli_query($con, $check_painting);
		if(mysqli_num_rows($run_check)>0)
		{
			echo "";
		}
		else{
			$insert_painting = "insert into cart(painting_id,ip_add) values ('$painting_id','$ip')";
			$run_painting = mysqli_query($con,$insert_painting);
		echo "<script>window.open('index.php','_self')</script>";
		}
			
	}
	
	
}

// getting the total added items
function total_paintings(){
	if(isset($_GET['add_cart'])){
		
		global $con;
		$ip=getIp();
		$get_paintings = "select * from cart where ip_add='$ip'";
		$run_paintings = mysqli_query($con, $get_paintings);
		$count_paintings =mysqli_num_rows($run_paintings);
	}
		else{
			global $con;
			$ip=getIp();
		$get_paintings = "select * from cart where ip_add='$ip'";
		$run_paintings = mysqli_query($con, $get_paintings);
		$count_paintings =mysqli_num_rows($run_paintings);
			
			
			
			
		}
		
		
		echo $count_paintings;
		
		
	}
	
	
	//getting the total price of the items in the cart
	
	function total_price(){
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
				$values = array_sum($painting_price);
				
			$total += $values;	
			}
			
		}
		
		
		
		echo "$".$total;
		
	}
	
	
	
	
	//other one 
	function total_prices(){
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
				$values = array_sum($painting_price);
				
			$total += $values;	
			}
			
		}
		
		
		
		return $total;
		
	}
/*if(!$con)
	echo "not connect";*/

//getting the categories

function getCats(){
	global $con;
	
	$get_cats= "select * from categories";
	$run_cats= mysqli_query($con,$get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
	$cat_id= $row_cats['cat_id'];
	$cat_title = $row_cats['cat_title'];
	
	echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	
	
	}
	
	
	
}



//getting the galleries

function getGalleries(){
	global $con;
	
	$get_galleries= "select * from galleries";
	$run_galleries= mysqli_query($con,$get_galleries);
	
	while ($row_galleries=mysqli_fetch_array($run_galleries)){
	$gallery_id= $row_galleries['gallery_id'];
	$gallery_name = $row_galleries['gallery_name'];
	$gallery_location = $row_galleries['location'];
	
	
	echo "<li><a href='index.php?gallery=$gallery_id'>$gallery_name</a></li>";
	
	
	}
	
	
	
}

function getPaintings(){
	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['gallery'])){

  global $con;
  
  $get_painting = "select * from painting order by RAND() LIMIT 0,6";
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
	   <p><b>Price: $ $painting_price</b></p>
	   <a href='details.php?painting_id=$painting_id' style='float:left;'>Details</a>
	   <a href='index.php?add_cart=$painting_id'><button style='float:right'>Add to cart </button></a>
	   
	   
	   </div>
	   
	   
	   ";
	   
	   
	   
	   
	   
	   
	   
	   
	   
   }
	
	
	
}
}
}


function getCatPaintings(){
	
	if(isset($_GET['cat'])){
		
     $cat_id=$_GET['cat'];
  global $con;
  
  $get_cat_painting = "select * from painting where painting_cat='$cat_id'";
   $run_cat_painting = mysqli_query($con,$get_cat_painting);
   $count_cats=mysqli_num_rows($run_cat_painting);
   if($count_cats==0)
   {
	   echo "<h4 style='padding:20px;'>There is no painting in this category</h4>";
	   
   }
  
   
   while($row_cat_painting=mysqli_fetch_array($run_cat_painting)){
	   
	   $painting_id = $row_cat_painting['painting_id'];
	   $painting_cat = $row_cat_painting['painting_cat'];
	   $painting_artistid = $row_cat_painting['artist_id'];
	   $painting_title = $row_cat_painting['painting_title'];
	   $painting_price = $row_cat_painting['painting_price'];
	   $painting_galleryid = $row_cat_painting['gallery_id'];
	  // $painting_desc = $row_cat_painting['painting_desc'];
	   $painting_image = $row_cat_painting['painting_image'];
	   $painting_date = $row_cat_painting['painting_displaydate'];
	   
	    
   
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
	
	
	
}
}


function getGalPaintings(){
	
	if(isset($_GET['gallery'])){
		
     $gallery_id=$_GET['gallery'];
  global $con;
  
  $get_gal_painting = "select * from painting where gallery_id='$gallery_id'";
   $run_gal_painting = mysqli_query($con,$get_gal_painting);
   $count_gals=mysqli_num_rows($run_gal_painting);
   if($count_gals==0)
   {
	   echo "<h4 style='padding:20px;'>There is no painting in this gallery</h4>";
	   
   }
  
   
   while($row_gal_painting=mysqli_fetch_array($run_gal_painting)){
	   
	   $painting_id = $row_gal_painting['painting_id'];
	   $painting_cat = $row_gal_painting['painting_cat'];
	   $painting_artistid = $row_gal_painting['artist_id'];
	   $painting_title = $row_gal_painting['painting_title'];
	   $painting_price = $row_gal_painting['painting_price'];
	   $painting_galleryid = $row_gal_painting['gallery_id'];
	  // $painting_desc = $row_cat_painting['painting_desc'];
	   $painting_image = $row_gal_painting['painting_image'];
	   $painting_date = $row_gal_painting['painting_displaydate'];
	   
	    
   
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
	
	
	
}
}
?>