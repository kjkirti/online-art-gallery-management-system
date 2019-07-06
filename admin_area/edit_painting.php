<!DOCTYPE>
<?php

include("includes/db.php");
if(isset($_GET['edit_painting'])){
	
	$get_id = $_GET['edit_painting'];
	$get_painting="select * from painting where painting_id='$get_id'";
	 $run_painting=mysqli_query($con,$get_painting);
	 
	 $i=0;
	 $row_painting=mysqli_fetch_array($run_painting);
		 $painting_id=$row_painting['painting_id'];
		 $painting_title=$row_painting['painting_title'];
		 $painting_image=$row_painting['painting_image'];
		 $painting_price=$row_painting['painting_price'];
		 
		 $painting_desc = $row_painting['painting_desc'];
		  $painting_keywords= $row_painting['painting_keywords'];
		   $painting_cat = $row_painting['painting_cat'];
		    $gallery_id = $row_painting['gallery_id'];
			$artist_id = $row_painting['artist_id'];
			
			$get_cat = "select * from categories where cat_id = '$painting_cat'";
			$run_cat = mysqli_query($con,$get_cat);
			$row_cat = mysqli_fetch_array($run_cat);
			$category_title = $row_cat['cat_title'];
			
			$get_gallery = "select * from galleries where gallery_id = '$gallery_id'";
			$run_gallery = mysqli_query($con,$get_gallery);
			$row_gallery = mysqli_fetch_array($run_gallery);
			$gallery_name = $row_gallery['gallery_name'];
			
			$get_artist = "select * from artist where artist_id = '$artist_id'";
			$run_artist = mysqli_query($con,$get_artist);
			$row_artist = mysqli_fetch_array($run_artist);
			$artist_name = $row_artist['artist_name'];
			
	
	
}




?>
<html>
<head>
<title>Update Paintings</title><script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script></head>
<body bgcolor="skyblue">

<form action="" method="post" enctype="multipart/form-data">
  <table align="center" width="795" border="2" bgcolor="#187eae">
     <tr align="center">
        <td colspan="8"><h2>Edit and Update Paintings</h2></td>


     </tr>
     <tr><td align="right"><b>Painting Category:</b></td>
	 <td>  
	 <select name="painting_cat" required>
	 <option><?php echo $category_title;?></option>
	 <?php
	 $get_cats= "select * from categories";
	$run_cats= mysqli_query($con,$get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
	$cat_id= $row_cats['cat_id'];
	$cat_title = $row_cats['cat_title'];
	
	echo "<option value='$cat_id'>$cat_title</option>";
	
	
	}
	 
	 
	 
	 
	 ?>
	 </select>
	 
	 </td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Artist:</b></td>
	 <td>
	 <select name="painting_artist" required>
	 <option><?php echo $artist_name;?></option>
	 <?php
	 $get_cats= "select * from artist";
	$run_cats= mysqli_query($con,$get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
	$cat_id= $row_cats['artist_id'];
	$cat_name = $row_cats['artist_name'];
	$cat_phone = $row_cats['artist_phone'];
	$cat_location = $row_cats['artist_location'];
	
	echo "<option value='$cat_id'>$cat_name</option>";
	
	
	}
	 
	 
	 
	 
	 ?>
	 </select>
	 
	 
	 
	 </td>
	 </tr>
	 
	 <tr><td align="right" ><b>Painting Title:</b></td>
	 <td><input type="text" name="painting_title" size="60" value="<?php echo $painting_title;?>" /></td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Price:</b></td>
	 <td><input type="text" name="painting_price" value="<?php echo $painting_price;?>" /></td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Gallery:</b></td>
	 <td>
	 <select name="painting_gallery" required>
	 <option><?php echo $gallery_name;?></option>
	 <?php
	 $get_galleries= "select * from galleries";
	$run_galleries= mysqli_query($con,$get_galleries);
	
	while ($row_galleries=mysqli_fetch_array($run_galleries)){
	$gallery_id= $row_galleries['gallery_id'];
	$gallery_name = $row_galleries['gallery_name'];
	$gallery_location = $row_galleries['location'];
	
	
	echo "<option value='$gallery_id'>$gallery_name</option>";
	
	
	}
	?>
	
	 </select>
	 
	 
	 
	 </td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Description:</b></td>
	 <td><textarea name="painting_desc" cols="20" rows="20" ><?php echo $painting_desc; ?></textarea></td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Image:</b></td>
	 <td><input type="file" name="painting_image" /><img src="paintingimages/<?php echo $painting_image;?>" width="150" height="150" /></td>
	 </tr>
	 
	 
	 <tr><td align="right"><b>Painting Keywords:</b></td>
	 <td><input type="text" name="painting_keywords" size="50" value="<?php echo $painting_keywords; ?>"/></td>
	 </tr>
	 
	<!-- <tr><td align="right"><b>Painting Start Date:</b></td>
	 <td><input type="text" name="painting_startdate" /></td>
	 </tr>here is our beloved date-->
	 
	 
	 
	 <tr align="center">
	 <td colspan="8"><input type="submit" name="update_painting" value="Update Paintings Now" /></td>
	 </tr>
	 
	 </table>
</form>
</body>
</html>


<?php
//for insert button
if(isset($_POST['update_painting'])){
	$update_id=$painting_id;
//getting the text data from the fields
$painting_cat = $_POST['painting_cat'];
$painting_artist = $_POST['painting_artist'];
$painting_title = $_POST['painting_title'];
$painting_price = $_POST['painting_price'];
$painting_gallery = $_POST['painting_gallery'];
$painting_desc = $_POST['painting_desc'];

//getting image from the field
$painting_image = $_FILES['painting_image']['name'];
$painting_image_tmp=$_FILES['painting_image']['tmp_name'];
$painting_keywords = $_POST['painting_keywords'];

//to move to the file in whici image is stored by artist
move_uploaded_file($painting_image_tmp,"paintingimages/$painting_image");


/*$painting_startdate = $_POST['painting_startdate']*/;

$update_painting = "update painting set painting_cat='$painting_cat' ,artist_id='$painting_artist', painting_title='$painting_title' ,painting_price='$painting_price' ,gallery_id='$painting_gallery' ,painting_desc='$painting_desc', painting_image='$painting_image', painting_keywords='$painting_keywords' where painting_id='$update_id'";


//to insert into database
$run_painting = mysqli_query($con, $update_painting);

   if($run_painting){

    echo "<script>alert('painting updated!')</script>";
    echo "<script>window.open('index.php?view_paintings','_self')</script>";


    }


}





?>