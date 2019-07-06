
<table width="795" align="center" bgcolor="pink">

     <tr align="center">
	    <td colspan="6"><h2>View All orders Here</h2></td>
     </tr>


	 <tr align="center" bgcolor="skyblue">
	    <th>SN</th>
	    <th>Customer Id</th>
	    <th>Order Id</th>
		<th>Painting Id</th>
	     
		 
		 <th>Amount</th>
		 <th>Address</th>
		  <th>Date & Time</th>
	 
	 </tr>
	 <?php
	 include("includes/db.php");
	 
	 $get_o="CALL `allorders`();";
	 $run_o=mysqli_query($con,$get_o);
	 
	 $i=0;
	 while($row_o=mysqli_fetch_array($run_o)){
		 $c_id=$row_o['customer_id'];
		 
		 $o_id=$row_o['order_id'];
		 $p_id=$row_o['painting_id'];
		 $a=$row_o['amount'];
		 $ad=$row_o['Address'];
		 $d=$row_o['date'];
          
		 //$painting_image=$row_painting['painting_image'];
		 //$painting_price=$row_painting['painting_price'];
		 
		 $i++;
	 
	 ?>
	 
	 <tr align="center">
	     <td><?php echo $i;?></td>
		 <td><?php echo $c_id;?></td>
		 <td><?php echo $o_id;?></td>
		 <td><?php echo $p_id;?></td>
		 <td><?php echo  $a;?></td>
		 <td><?php echo $ad;?></td>
		 <td><?php echo $d;?></td>
		 
		 

	 </tr>
	 <?php } ?>
	 

</table>