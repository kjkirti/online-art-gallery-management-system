         <?php 
		 include("includes/db.php");
		  $user = $_SESSION['customer_email'];
		  $get_customer = "select * from customer where customer_email='$user'";
		  $run_customer = mysqli_query($con,$get_customer);
		  $row_customer = mysqli_fetch_array($run_customer);
		  
		  $c_id=$row_customer['customer_id'];
		  $email=$row_customer['customer_email'];
		  $pass=$row_customer['customer_password'];
		  $name=$row_customer['customer_name'];
		  $address=$row_customer['address'];
		  $contact=$row_customer['phone'];
		  
		  ?>
		  
		 <form action="" method="post" enctype="multipart/form-data">
		    <table align="center" width="750">
			
			
			
			<tr align="center">
			    <td colspan="6"><h2>Update your Account</h2></td>
			</tr>
		
		    	
			
			<tr>
			    <td align="right">Customer Email:</td>
				<td><input type="text" name="customer_email" value="<?php echo $email; ?>" required/></td>
			</tr>	
			
			<tr>
			    <td align="right">Customer password:</td>
				<td><input type="password" name="customer_password" value="<?php echo $pass; ?>" required/></td>
			</tr>

            <tr>
			    <td align="right">Customer Name:</td>
				<td><input type="text" name="customer_name" value="<?php echo $name; ?>" required/></td>
			</tr>			
			<tr>
			    <td align="right">Customer Address:</td>
				<td><input type="text" name="customer_address" value="<?php echo $address; ?>" required/></td>
			</tr>	
			
			<tr>
			    <td align="right">Customer Contact:</td>
				<td><input type="text" name="customer_contact" value="<?php echo $contact; ?>" required/></td>
			</tr>	
			
			<tr align="center">
			   <td colspan="6"><input type="submit" name="update" value="Update Account" /></td>
			</tr>
		  
		  </table>
		  </form>
		  
		  
		  
		 
		
		




<?php

if(isset($_POST['update'])){
	$ip = getIp();
	
	$customer_id = $c_id;
	$c_email = $_POST['customer_email'];
	$c_password = $_POST['customer_password'];
	$c_name = $_POST['customer_name'];
	$c_address = $_POST['customer_address'];
	$c_contact = $_POST['customer_contact'];
	
	$update_c = "update customer set customer_email='$c_email', customer_password='$c_password', customer_name='$c_name', address='$c_address',phone='$c_contact' where customer_id='$customer_id'";
	
	$run_update = mysqli_query($con,$update_c);
	
	if($run_update){
		
		echo "<script>alert('Your account successfully Updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	
	
	
}


}





?>
