
<table width="795" align="center" bgcolor="pink">

     <tr align="center">
	    <td colspan="6"><h2>View All artists Here</h2></td>
     </tr>


	 <tr align="center" bgcolor="skyblue">
	    <th>Artist Id</th>
	    <th>Artist Name</th>
		<th>Artist Phone</th>
		<th>Artist Location</th>
		<th>Artist Email</th>
	     
		 
		 <th>Edit</th>
		 <th>Delete</th>
	 
	 </tr>
	 <?php
	 include("includes/db.php");
	 
	 $get_artist="CALL `allartist`();";
	 $run_artist=mysqli_query($con,$get_artist);
	 
	 $i=0;
	 while($row_artist=mysqli_fetch_array($run_artist)){
		 $artist_id=$row_artist['artist_id'];
		 $artist_name=$row_artist['artist_name'];
          $artist_phone=$row_artist['artist_phone'];
		   $artist_location=$row_artist['artist_location'];
		    $artist_email=$row_artist['artist_email'];
		 //$painting_image=$row_painting['painting_image'];
		 //$painting_price=$row_painting['painting_price'];
		 
		 $i++;
	 
	 ?>
	 
	 <tr align="center">
	     <td><?php echo $i;?></td>
		 <td><?php echo $artist_name;?></td>
		 <td><?php echo $artist_phone;?></td>
		 <td><?php echo $artist_location;?></td>
		 <td><?php echo $artist_email;?></td>
		 
		 <td><a href="index.php?edit_artist=<?php echo $artist_id;?>">Edit</a></td>
		 <td><a href="delete_artist.php?delete_artist=<?php echo $artist_id;?>">Delete</a></td>
	 </tr>
	 <?php } ?>
	 

</table>