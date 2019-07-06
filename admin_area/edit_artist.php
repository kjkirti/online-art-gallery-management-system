<?php
 include("includes/db.php");
 if(isset($_GET['edit_artist'])){
	 
	 $artist_id = $_GET['edit_artist'];
	 $get_artist = "select * from artist where artist_id='$artist_id'";
	 $run_artist = mysqli_query($con,$get_artist);
	 $row_artist = mysqli_fetch_array($run_artist);
	 $artist_id = $row_artist['artist_id'];
	 $artist_name =$row_artist['artist_name'];
	 $artist_phone =$row_artist['artist_phone'];
	 $artist_location =$row_artist['artist_location'];
	 $artist_email =$row_artist['artist_email'];
	 
	 
	
	 
	 
 }



?>

<form action="" method="post" style="padding:80px;">

<b>Update New Artist:</b>
<input type="text" name="new_artist" placeholder="artist name" value="<?php echo $artist_name;?>"/>
<input type="text" name="new_artistphone" placeholder="artist phone" value="<?php echo $artist_phone;?>"/>
<input type="text" name="new_artistlocation" placeholder="artist location" value="<?php echo $artist_location;?>"/>
<input type="text" name="new_artistemail" placeholder="artist email" value="<?php echo $artist_email;?>"/>

<input type="submit" name="update_artist" value="Update artist" />



</form>

<?php

     if(isset($_POST['update_artist'])){
		 $update_id=$artist_id;
     $new_artist=$_POST['new_artist'];
	 $new_artistphone=$_POST['new_artistphone'];
	 $new_artistlocation=$_POST['new_artistlocation'];
	 $new_artistemail=$_POST['new_artistemail'];
	 
	 
	 $update_artist = "update artist set artist_name='$new_artist',artist_phone='$new_artistphone',artist_location='$new_artistlocation',artist_email='$new_artistemail' where artist_id='$update_id' ";
	 
	 $run_update = mysqli_query($con, $update_artist);
	 
	 if($run_update){
		 
		 
		 echo"<script>alert('artist has been updated!')</script>";
	     echo"<script>window.open('index.php?view_artist','_self')</script>";
	 }
	 }
?>