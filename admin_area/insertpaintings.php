<!DOCTYPE>
<?php

include("includes/db.php");




?>
<html>
<head>
<title>Inserting Paintings</title><script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script></head>
<body bgcolor="skyblue">

<form action="insertpaintings.php" method="post" enctype="multipart/form-data">
  <table align="center" width="795" border="2" bgcolor="#187eae">
     <tr align="center">
        <td colspan="8"><h2>Insert New Post Here</h2></td>


     </tr>
     <tr><td align="right"><b>Painting Category:</b></td>
	 <td>  
	 <select name="painting_cat" required>
	 <option>Select a Category</option>
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
	 <option>Select artist name</option>
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
	 <td><input type="text" name="painting_title" size="60" required /></td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Price:</b></td>
	 <td><input type="text" name="painting_price" required /></td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Gallery:</b></td>
	 <td>
	 <select name="painting_gallery" required>
	 <option>Select a Gallery</option>
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
	 <td><textarea name="painting_desc" cols="20" rows="20" ></textarea></td>
	 </tr>
	 
	 <tr><td align="right"><b>Painting Image:</b></td>
	 <td><input type="file" name="painting_image" required/></td>
	 </tr>
	 
	 
	 <tr><td align="right"><b>Painting Keywords:</b></td>
	 <td><input type="text" name="painting_keywords" size="50" required/></td>
	 </tr>
	 
	<!-- <tr><td align="right"><b>Painting Start Date:</b></td>
	 <td><input type="text" name="painting_startdate" /></td>
	 </tr>here is our beloved date-->
	 
	 
	 
	 <tr align="center">
	 <td colspan="8"><input type="submit" name="insert_post" value="Insert Paintings Now" /></td>
	 </tr>
	 
	 </table>
</form>
</body>
</html>


<?php
//for insert button
if(isset($_POST['insert_post'])){
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

$insert_painting = "insert into painting (painting_cat,artist_id,painting_title,painting_price,gallery_id,painting_desc,painting_image,painting_keywords) values ('$painting_cat','$painting_artist','$painting_title','$painting_price','$painting_gallery','$painting_desc','$painting_image','$painting_keywords')";


//to insert into database
$insert_pro = mysqli_query($con, $insert_painting);

   if($insert_pro){

    echo "<script>alert('painting inserted!')</script>";
    echo "<script>window.open('index.php?insertpaintings','_self')</script>";//some problemo here

    }


}





?>