<?php

$user = $_SESSION['customer_email'];
		  $get_name = "select * from customer where customer_email='$user'";
		  $run_name = mysqli_query($con,$get_name);
		  $row_name = mysqli_fetch_array($run_name);
		  $c_id = $row_name['customer_id'];

?>

<table width="700" align="center" bgcolor="pink">

     <tr align="center">
	    <td colspan="6"><h2>View All orders Here</h2></td>
     </tr>


	 <tr align="center" bgcolor="skyblue">
	    <th>SN</th>
	    
	    <th>Order Id</th>
		<th>Painting title</th>
	     
		 
		 <th>Amount</th>
		 <th>Address</th>
		  <th>Date & Time</th>
	 
	 </tr>
	 <?php
	 include("includes/db.php");
	 
	 $get_o="select * from orders where customer_id= '$c_id'";
	 $run_o=mysqli_query($con,$get_o);
	 
	 $i=0;
	 while($row_o=mysqli_fetch_array($run_o)){
		 $c_id=$row_o['customer_id'];
		 
		 $o_id=$row_o['order_id'];
		 $p_id=$row_o['painting_id'];
		 
		 
		 $get_p="select * from painting where painting_id= '$p_id'";
	 $run_p=mysqli_query($con,$get_p);
	 $row_p=mysqli_fetch_array($run_p);
		 $p_t=$row_p['painting_title'];
		 
		 
		 
		 $a=$row_o['amount'];
		 $ad=$row_o['Address'];
		 $d=$row_o['date'];
          
		 //$painting_image=$row_painting['painting_image'];
		 //$painting_price=$row_painting['painting_price'];
		 
		 $i++;
	 
	 ?>
	 
	 <tr align="center">
	     <td><?php echo $i;?></td>
		 
		 <td><?php echo $o_id;?></td>
		 <td><?php echo $p_t;?></td>
		 <td><?php echo  $a;?></td>
		 <td><?php echo $ad;?></td>
		 <td><?php echo $d;?></td>
		 
		 

	 </tr>
	 <?php } ?>
	 

</table>













