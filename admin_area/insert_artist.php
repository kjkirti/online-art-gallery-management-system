<form action="" method="post" style="padding:80px;">

<b>Insert New Artist:</b>
<table >

<tr><td><input type="text" name="new_artist" placeholder="artist name" required/></td></tr>
<tr><td><input type="text" name="new_phno" placeholder="artist phone no." required/></td></tr>
<tr><td><input type="text" name="new_loc" placeholder="artist location" required/></td></tr>
<tr><td><input type="email" name="new_email" placeholder="artist email" required/></td></tr>
<tr align="center"><td><input type="submit" name="add_artist" value="Add artist" /></td></tr>

</table>
</form>

<?php
include("includes/db.php");
     if(isset($_POST['add_artist'])){
		 
     $new_artist=$_POST['new_artist'];
	 $new_phno=$_POST['new_phno'];
	 $new_loc=$_POST['new_loc'];
	 $new_email=$_POST['new_email'];
	 
	 $insert_artist = "insert into artist (artist_name,artist_phone,artist_location,artist_email) values ('$new_artist','$new_phno','$new_loc','$new_email')";
	 
	 $run_artist = mysqli_query($con, $insert_artist);
	 
	 if($run_artist){
		 
		 
		 echo"<script>alert('New artist has been inserted!')</script>";
	     echo"<script>window.open('index.php?view_artist','_self')</script>";
	 }
	 }
?>