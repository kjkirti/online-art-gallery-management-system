<form action="" method="post" style="padding:80px;">

<b>Insert New Gallery:</b>
<input type="text" name="new_gallery" placeholder="gallery name" required/>
<input type="text" name="new_galleryloc" placeholder="gallery location" required/>
<input type="submit" name="add_gallery" value="Add gallery" />



</form>

<?php
include("includes/db.php");
     if(isset($_POST['add_gallery'])){
		 
     $new_gallery=$_POST['new_gallery'];
	 $new_galleryloc=$_POST['new_galleryloc'];
	 
	 $insert_gallery = "insert into galleries (gallery_name,location) values ('$new_gallery','$new_galleryloc')";
	 
	 $run_gallery = mysqli_query($con, $insert_gallery);
	 
	 if($run_gallery){
		 
		 
		 echo"<script>alert('New gallery has been inserted!')</script>";
	     echo"<script>window.open('index.php?view_gallery','_self')</script>";
	 }
	 }
?>