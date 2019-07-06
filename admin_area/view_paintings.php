
<table width="795" align="center" bgcolor="#e0e0d1">

     <tr align="center">
	    <td colspan="6"><h2>View All Products Here</h2></td>
     </tr>


	 <tr align="center" bgcolor="#b8b894">
	    <th>S.N</th>
	    <th>Title</th>
	     <th>Image</th>
		 <th>Price</th>
		 <th>Edit</th>
		 <th>Delete</th>
	 
	 </tr>
	 <?php
	 include("includes/db.php");
	 
	 $get_painting="select * from painting";
	 $run_painting=mysqli_query($con,$get_painting);
	 
	 $i=0;
	 while($row_painting=mysqli_fetch_array($run_painting)){
		 $painting_id=$row_painting['painting_id'];
		 $painting_title=$row_painting['painting_title'];
		 $painting_image=$row_painting['painting_image'];
		 $painting_price=$row_painting['painting_price'];
		 
		 $i++;
	 
	 ?>
	 
	 <tr align="center">
	     <td><?php echo $i;?></td>
		 <td><?php echo $painting_title;?></td>
		 <td><img src="paintingimages/<?php echo $painting_image;?>" width="60" height="60" /></td>
		 <td><?php echo $painting_price;?></td>
		 <td><a href="index.php?edit_painting=<?php echo $painting_id;?>">Edit</a></td>
		 <td><a href="delete_paintings.php?delete_paintings=<?php echo $painting_id;?>">Delete</a></td>
	 </tr>
	 <?php } ?>
	 

</table>