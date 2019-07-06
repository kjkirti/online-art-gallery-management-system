
<table width="795" align="center" bgcolor="pink">

     <tr align="center">
	    <td colspan="6"><h2>View All Galleries Here</h2></td>
     </tr>


	 <tr align="center" bgcolor="skyblue">
	    <th>Gallery Id</th>
	    <th>Gallery Title</th>
		<th>Gallery Location</th>
	     
		 
		 <th>Edit</th>
		 <th>Delete</th>
	 
	 </tr>
	 <?php
	 include("includes/db.php");
	 
	 $get_gallery="select * from galleries";
	 $run_gallery=mysqli_query($con,$get_gallery);
	 
	 $i=0;
	 while($row_gallery=mysqli_fetch_array($run_gallery)){
		 $gallery_id=$row_gallery['gallery_id'];
		 $gallery_name=$row_gallery['gallery_name'];
          $location=$row_gallery['location'];
		 //$painting_image=$row_painting['painting_image'];
		 //$painting_price=$row_painting['painting_price'];
		 
		 $i++;
	 
	 ?>
	 
	 <tr align="center">
	     <td><?php echo $i;?></td>
		 <td><?php echo $gallery_name;?></td>
		 <td><?php echo $location;?></td>
		 
		 <td><a href="index.php?edit_gallery=<?php echo $gallery_id;?>">Edit</a></td>
		 <td><a href="delete_gallery.php?delete_gallery=<?php echo $gallery_id;?>">Delete</a></td>
	 </tr>
	 <?php } ?>
	 

</table>