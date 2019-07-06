<?php
 include("includes/db.php");
 if(isset($_GET['edit_gallery'])){
	 
	 $gallery_id = $_GET['edit_gallery'];
	 $get_gallery = "select * from galleries where gallery_id='$gallery_id'";
	 $run_gallery = mysqli_query($con,$get_gallery);
	 $row_gallery = mysqli_fetch_array($run_gallery);
	 $gallery_id = $row_gallery['gallery_id'];
	 $gallery_name =$row_gallery['gallery_name'];
	 $location = $row_gallery['location'];
	 
	
	 
	 
 }



?>

<form action="" method="post" style="padding:80px;">

<b>Update New Gallery:</b>
<input type="text" name="new_gallery" placeholder="gallery name" value="<?php echo $gallery_name;?>"/>
<input type="text" name="new_galleryloc" placeholder="gallery location" value="<?php echo $location;?>"/>
<input type="submit" name="update_gallery" value="Update gallery" />



</form>

<?php

     if(isset($_POST['update_gallery'])){
		 $update_id=$gallery_id;
     $new_gallery=$_POST['new_gallery'];
	 $new_galleryloc=$_POST['new_galleryloc'];
	 
	 $update_gallery = "update galleries set gallery_name='$new_gallery',location='$new_galleryloc' where gallery_id='$update_id' ";
	 
	 $run_update = mysqli_query($con, $update_gallery);
	 
	 if($run_update){
		 
		 
		 echo"<script>alert('Gallery has been updated!')</script>";
	     echo"<script>window.open('index.php?view_gallery','_self')</script>";
	 }
	 }
?>